<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Pokemon extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable
     */
    protected $fillable = [
        'name', 
        'species', 
        'height', 
        'weight', 
        'abilities', 
        'image_path'
    ];

    /**
     * Accessor to convert abilities JSON to a formatted array
     * 
     * Abilities is stored as a longtext in MariaDB rather than JSON type
     */
    protected function abilities(): Attribute { 
        return Attribute::make(
            get: function ($value) {

                $decoded_abilities = json_decode($value, true);

                $formattedAbilities = array();
                foreach ($decoded_abilities as $ability) {
                    $formattedAbilities[] = [
                        'name' => $ability['ability']['name'],
                        'is_hidden' => $ability['is_hidden'] ? 'Hidden' : 'Not hidden',
                        'slot' => $ability['slot'],
                    ];
                }

                return $formattedAbilities;
            },
        );
    }
}
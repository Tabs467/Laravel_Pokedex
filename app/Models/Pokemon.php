<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
     * TODO: Add accessor to convert abilities JSON to a collection or basic array
     */
}
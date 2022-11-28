<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'acquisition',
        'title',
        'author',
        'year_acquisition',
        'language_type',
        'category'
    ];
}

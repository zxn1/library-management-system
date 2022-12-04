<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;
    protected $table = 'books';
    protected $fillable = [
        'id',
        'acquisition',
        'title',
        'rack_number',
        'cover_image',
        'publisher',
        'year_acquisition',
        'year_publish',
        'lang_id',
        'categ_id',
        'author_id'
    ];

    public function authors()
    {
        return $this->hasOne(authors::class, 'id', 'author_id');
    }

    public function languages()
    {
        return $this->hasOne(languages::class, 'id', 'lang_id');
    }

    public function category()
    {
        return $this->hasOne(category::class, 'id', 'categ_id');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authors extends Model
{
    use HasFactory;
    protected $table = 'authors';
    protected $fillable = [
        'name'
    ];

    public function books()
    {
        return $this->belongsTo(books::class, 'author_id');
    }
}

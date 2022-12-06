<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class bookloan extends Model
{
    use HasFactory;
    protected $table = 'bookloans';
    protected $fillable = [
        'book_id',
        'unique_stud_id',
        'loan_date',
        'return_date'
    ];

    public function students()
    {
        return $this->hasOne(students::class, 'unique_id', 'unique_stud_id');
    }

    public function books()
    {
        return $this->hasOne(books::class, 'id', 'book_id');
    }
}

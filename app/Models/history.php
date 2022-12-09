<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class history extends Model
{
    use HasFactory;
    protected $table = 'histories';
    protected $fillable = [
        'student_name',
        'book_name',
        'date_borrow',
        'date_return',
        'penaltyCharge'
    ];
}

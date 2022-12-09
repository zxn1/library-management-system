<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class students extends Model
{
    use HasFactory;
    protected $table = 'students';
    protected $fillable = [
        'unique_id',
        'fullname',
        'dob',
        'year',
        'profile_image',
        'street',
        'poscode',
        'city',
        'state',
        'created_at'
    ];
    protected $primaryKey = 'unique_id';
    public $incrementing = false;
    // In Laravel 6.0+ make sure to also set $keyType
    protected $keyType = 'string';
}

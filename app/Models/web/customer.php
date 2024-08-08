<?php

namespace App\Models\web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class customer extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'customer';

    protected $fillable = [
        'token',
        'firstname',
        'lastname',
        'email',
        'phone_number',
        'password',
        'address',
        'gender',
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_name',
        'l_name',
        'tel',
        'email',
        'identity_number',
        'booking_id'
    ];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'card_number',
        'pin',
        'activation_date',
        'expiration_date',
        'balance'
    ];
}

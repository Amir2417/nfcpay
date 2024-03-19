<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardPayment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts    = [
        'id'            => 'integer',
        'user_id'       => 'integer',
        'card_type'     => 'string',
        'card_option'   => 'string',
        'slug'          => 'string',
        'name'          => 'string',
        'card_number'   => 'string',
        'card_cvc'      => 'string',
        'expiry_date'   => 'string',
        'details'       => 'object',
        'status'        => 'integer',
        'created_at'    => 'datetime',
        'updated_at'    => 'datetime',  
    ];
}

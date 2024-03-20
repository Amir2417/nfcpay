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

    //auth relation
    public function scopeAuth($query){
        return $query->where('user_id',auth()->user()->id);
    }

    //search
    public function scopeSearch($query,$data) {

        return $query->where("name",'LIKE','%'.$data.'%')
                     ->orWhere("card_number",'LIKE','%'.$data.'%')
                     ->orderBy('id','desc');
    }
}

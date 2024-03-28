<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFCPayConfig extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts    = [
        'id'            => 'integer',
        'slug'          => 'string',
        'name'          => 'string',
        'version'       => 'string'
    ];
}

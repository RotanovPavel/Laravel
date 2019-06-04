<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiscountItem extends Model
{
    //
    protected $fillable = [
        'name', 'price', 'image',
    ];
}

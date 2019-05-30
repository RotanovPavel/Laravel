<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    // разрешает заполнять данные поля, остальные заполняться из формы не будут
    protected $fillable = [
        'name', 'price', 'image', 'relevance', 'brand_id'
    ];

    public function brand()
    {
        return $this->belongsTo('App\Brand');
    }
}

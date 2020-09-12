<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookMark extends Model
{
    protected $fillable=[
        'restaurant_id'
    ];
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

}

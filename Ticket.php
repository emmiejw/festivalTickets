<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = ['event', 'date', 'time', 'description', 'price'];

    public function orders(){
        return $this->hasMany(orders::class);
    }
}

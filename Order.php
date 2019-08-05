<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['ticket_id', 'event', 'quantity'];

    public function ticket(){
        return $this->belongsTo(Ticket::class, 'ticket_id');
    }
}

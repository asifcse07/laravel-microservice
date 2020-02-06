<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    //
    protected $fillable = ['customer_id', 'booking_id', 'transaction_no', 'price'];
}

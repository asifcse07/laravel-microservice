<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Booking extends Model
{
    //
    use SoftDeletes;
    protected $fillable = ['customer_id', 'room_id', 'check_in', 'check_out', 'customer_address'];
}

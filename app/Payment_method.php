<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment_method extends Model
{
    protected $table = 'payment_methods';
    protected $primaryKey = 'id';
}

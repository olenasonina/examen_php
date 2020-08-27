<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    protected $table = 'advertisements';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id','crop_id','image','crops_class_id','incoterms_id','location_regions_district_id','pickup_id',
        'description','seller_type_id','web-syte','telephon','payment_method_id','payment_form_id', 'price',
    ];
}

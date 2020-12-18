<?php

namespace App; 

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OurProduct extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $table='our_products';
}
        
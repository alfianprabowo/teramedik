<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hospital extends Model{
    /**
     * @var string
     */
    protected $table = 'hospital';

    /**
     * @var array
     */
    protected $fillable =[
        'name', 'address', 'province', 'city', 'district', 'sub_district', 'lat', 'lng', 'phone', 'email','description',
    ];
}


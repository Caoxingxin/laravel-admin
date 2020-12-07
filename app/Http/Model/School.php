<?php


namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $table = 'school';

    protected $fillable = [
        'name',
        'name_en',
        'picture',
        'pictures',
        'phone',
        'email',
        'province_id',
        'city_id',
        'address',
        'address_en',
        'map_point',
        'description',
        'status'
    ];
}

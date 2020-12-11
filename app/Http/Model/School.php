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
        'phone',
        'email',
        'address',
        'description',
        'status'
    ];
}

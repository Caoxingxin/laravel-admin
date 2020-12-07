<?php


namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $table = "course";

    protected $fillable = [
        'id',
        'name',
        'type',
        'picture',
        'duration',
        'weights',
        'remark',
        'status'
    ];
}

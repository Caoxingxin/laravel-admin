<?php


namespace App\Http\Model;


use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    protected $table = 'class';

    protected $fillable = [
        'school_id',
        'semester_id',
        'name',
        'operate_id',
        'status'
    ];

    protected $casts = ['name' => 'string'];

    public $joins = ['school','semester'];

    public function school () {
        return $this->belongsTo(School::class);
    }

}

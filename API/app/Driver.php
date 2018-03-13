<?php

namespace API;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Driver extends Model
{
    use SoftDeletes;
    protected $table    = 'drivers';
    protected $fillable = ['name', 'sponsor', 'score'];
    protected $dates    = ['deleted_at'];
    //
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kangaroo extends Model
{
    //
    protected $fillable = [
        'name',
        'nickname',
        'weight',
        'height',
        'gender',
        'color',
        'friendliness',
        'birthday'
    ];
}
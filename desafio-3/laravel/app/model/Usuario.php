<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{

    protected $fillable = ['nome','email','senha'];

}

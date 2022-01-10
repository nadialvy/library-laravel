<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class extends Model
{
    protected $table = 'class';

    protected $fillable = ['class_name', 'group'];
}

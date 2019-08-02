<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    protected $table = "equiposses";
    protected $primaryKey = "id";
    public $timestamps = false;
}

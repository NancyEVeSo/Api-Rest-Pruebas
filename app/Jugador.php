<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model
{
    protected $table = "jugadoresses";
    protected $primaryKey = "id";
    public $timestamps = false;
}

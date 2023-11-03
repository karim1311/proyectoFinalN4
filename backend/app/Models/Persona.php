<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    // public static function boot()
    // {
    //     parent::boot();

    //     static::creating(function(self $model ){
    //         $model->usuariocreacion = auth()->id();
    //     });

    //     static::updating(function(self $model ){
    //         $model->usuariomodificacion = auth()->id();
    //     });
    // }
}

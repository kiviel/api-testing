<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    //necestiamos que laravel acepte el campo 'titulo' enviado por el usuario o en este caso la prueba
    protected $fillable = ['title'];
}

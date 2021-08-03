<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Repositery extends Model
{
    use HasFactory;
    protected $fillable=['name','email','city','phone'];
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class ajax extends Model
{
    use HasFactory;
    protected $fillable=['name','email','password','city_id','address','hobby','gender','image'];

    public function getImageAttribute($image)
    {
        if($image)
        {
            return asset('upload/'.$image);
        }
        else
        {
            return asset('upload/default.jfif');
        }
    }

    function country()
    {
        return $this->belongsTo(country::class,'country_id');
    }
    function state()
    {
        return $this->belongsTo(state::class,'state_id');
    }
    function city()
    {
        return $this->belongsTo(city::class,'city_id');
    }
}

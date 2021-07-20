<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //use HasFactory;
    public function contracts()
    {
        return $this->hasMany('App\Models\Contract');
    }
}

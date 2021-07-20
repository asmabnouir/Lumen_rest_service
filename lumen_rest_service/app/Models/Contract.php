<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    public function Client()
    {
        return $this->belongsTo('App\Models\Client', 'contract_id');
    }
}

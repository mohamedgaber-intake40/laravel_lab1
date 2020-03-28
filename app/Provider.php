<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $fillable = [
      'provider_id' , 'provider_name' ,'token'  ,'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menus extends Model
{
    protected $fillable = [
        'namaMenu', 'kalori'
    ];

    public function preferences()
    {
        return $this->hasMany('App\Models\Preferences');
    }
}

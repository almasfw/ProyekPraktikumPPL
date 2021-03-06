<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'userID', 'date', 'menuPagiID', 'menuSiangID', 'menuSoreID'
    ];

    public function customers()
    {
        return $this->belongsTo('App\Models\Customers');
    }
}

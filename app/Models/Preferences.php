<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Preferences extends Model
{
    protected $fillable = [
        'userID','menuID', 'score'
    ];

    public function customers()
    {
        return $this->belongsTo('App\Models\Customers');
    }

	public function menus()
	{
		return $this->belongsTO('App\Models\Menus');
	}

}

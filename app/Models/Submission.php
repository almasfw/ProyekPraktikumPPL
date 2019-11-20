<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Submission extends Model
{
    protected $fillable = [
        'userID', 'date', 'age', 'gender', 'weight', 'height', 'dailyActivities', 'calories'
    ];

    public function submission()
    {
        return $this->belongsTo('App\Models\Customers');
    }
}

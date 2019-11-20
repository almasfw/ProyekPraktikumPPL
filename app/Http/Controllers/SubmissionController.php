<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Submission;
use App\Models\Customers;

class SubmissionController extends Controller
{
    public function store(Request $request)
    {
        // die('aku cinta kamu');
        $this->validate($request, [
            'age'				=> 'required',
            'gender'			=> 'required',
            'weight'			=> 'required',
			'height'			=> 'required',
			'dailyActivities'	=> 'required'
        ]);

		$data = $request->all();
		if ($data->gender == 'male') {
			$bmr = bmrMale();
		} else {
			$bmr = bmrFemale();
		}

		if ($data->dailyActivities == 'little to no exercise') {
			$calories = $bmr * 1.2;
		} else if ($data->dailyActivities == 'light exercise (1-3 days per weeks)') {
			$calories = $bmr * 1.375;
		} else if ($data->dailyActivities == 'moderate exercise (3-5 days per weeks)') {
			$calories = $bmr * 1.55;
		} else if ($data->dailyActivities == 'heavy exercise (6-7 days per weeks)') {
			$calories = $bmr * 1.725;
		} else {
			$calories = $bmr * 1.9;
		}

        $submission = $request->customers()->submission()->create([
			'userID'			=> customers()->userID->json('userID'),
			'date'				=> date('Y-m-d')->json('date'),
            'age'				=> $request->json('age'),
            'gender'			=> $request->json('gender'),
            'weight'			=> $request->json('weight'),
            'height'			=> $request->json('height'),
			'dailyActivities'	=> $request->json('dailyActivities'),
			'calories'			=> $calories->json('calories')
        ]);

        return $submission;

    }
}

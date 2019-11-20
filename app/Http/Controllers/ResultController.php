<?php

namespace App\Http\Controllers;
use App\Models\Result;
use App\Models\Menus;
use App\Models\Customers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function generate(Request $request)
    {
		$calories = json_decode(Submission::get('calories'), true);
		
		if ($calories[0]['calories'] > 1000) {
			$menus = [
				'idMenuPagi'	=> '3',
				'idMenuSiang'	=> '2',
				'idMenuSore'	=> '5'
			];
		} else {
			$menus = [
				'idMenuPagi'	=> '1',
				'idMenuSiang'	=> '3',
				'idMenuSore'	=> '7'
			];
		}

		$result = $request->customers()->result()->create([
			'userID'		=> json_decode(Submission::get('userID'), true),
			'date'			=> json_decode(Submission::get('date'), true),
			'menuPagiID'	=> $menus->idMenuPagi,
			'menuSiangID'	=> $menus->idMenuSiang,
			'menuSoreID'	=> $menus->idMenuSore
		]);

		return $result;

	}

	public integer bmrMale(integer $weight, integer $height, integer $age) {
		return 66.4730 + (13.7516 * $weight) + (5.0033 * $height) - (6.7550 * $age);
	}

	public integer bmrFemale(integer $weight, integer $height, integer $age) {
		return 655.0955 + (9.5634 * $weight) + (1.8496 * $height) - (4.6756 * $age);
	}

    public function show(Request $request){

        $program = json_decode(Result::get('program'), true);

        // $program = Result::get('program');
        $count = $program[0]["program"];

        // echo $count;
        // die($program);

        for($i=1; $i<=$count; $i++){
            echo Chest::where('id',$i)->get();
        };

        // die(Chest::get()->where('id',1));
        // return view('result', compact('array'));
    }
}

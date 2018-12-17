<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToTravel;

class ToTravelController extends Controller
{
    //получити всі подорожі
    public function index() {
    	$totravels = ToTravel::select(['id','name'])->get();
		$title = "Подорожі";

    	return view('totravels')->with(['totravels' => $totravels, 'title' => $title]);
	}

	//сохранити подорож
	public function save(Request $reuest) {
		$this->validate($reuest, [
            "name" => 'required|max:1000'
        ]);

		$totravel = new ToTravel;

		//$task->name = $reuest->name;
		$totravel->fill($reuest->all());

		$totravel->save();

	    return redirect(route('toTravel'));
	}

	//обновити подорож
	public function update(Request $request, $id) {
		$this->validate($request, [
            "name" => 'required|max:1000'
        ]);
		
	    $totravel = ToTravel::findOrFail($id);
	    $totravel->update($request->all());

	    return redirect(route('toTravel'));
	}

	//удалити подорож
	public  function delete(ToTravel $totravel) {
		$totravel->delete();
	    return redirect(route('toTravel'));
	}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tobay;

class TobayController extends Controller
{
    //получити всі покупки
    public function index() {
    	$tobays = Tobay::select(['id','name'])->get();
		$title = "Купити";

    	return view('tobays')->with(['tobays' => $tobays, 'title' => $title]);
	}

	//сохранити покупку
	public function save(Request $reuest) {
		$this->validate($reuest, [
            "name" => 'required|max:1000'
        ]);

		$tobay = new Tobay;

		//$task->name = $reuest->name;
		$tobay->fill($reuest->all());

		$tobay->save();

	    return redirect(route('toBays'));
	}

	//обновити покупку
	public function update(Request $request, $id) {
		$this->validate($request, [
            "name" => 'required|max:1000'
        ]);
		
	    $tobay = Tobay::findOrFail($id);
	    $tobay->update($request->all());

	    return redirect(route('toBays'));
	}

	//удалити покупку
	public  function delete(Tobay $tobay) {
		$tobay->delete();
	    return redirect(route('toBays'));
	}
}

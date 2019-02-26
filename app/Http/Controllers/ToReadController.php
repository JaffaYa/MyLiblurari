<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ToRead;

class ToReadController extends Controller
{
    //получити всі читання
	public function index() {
		$toReads = ToRead::select(['id','name'])->where('delete', 0)->get();
		$title = "Почитати";

		return view('toRead')->with(['toReads' => $toReads, 'title' => $title]);
	}

	//сохранити читання
	public function save(Request $reuest) {
		$this->validate($reuest, [
			"name" => 'required|max:2000'
		]);

		$toRead = new ToRead;

		//$task->name = $reuest->name;
		$toRead->fill($reuest->all());

		$toRead->save();;

		return redirect(route('toReads'));
	}

	//обновити читання
	public function update(Request $request, $id) {
		$this->validate($request, [
			"name" => 'required|max:2000'
		]);
		
		$toRead = ToRead::findOrFail($id);
		$toRead->update($request->all());

		return redirect(route('toReads'));
	}

	//удалити читання
	public  function delete(ToRead $toRead) {
		// $toRead->delete();
		$toRead->delete = 1;
		$toRead->update();
		
		return redirect(route('toReads'));
	}
}

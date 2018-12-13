<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
	//получити всі задачі
    public function index() {
    	$tasks = Task::select(['id','name'])->get();
		$title = "Tasks maneger";

    	return view('tasks')->with(['tasks' => $tasks, 'title' => $title]);
	}

	//сохранити задачу
	public function save(Request $reuest) {
		$this->validate($reuest, [
            "name" => 'required|max:2000'
        ]);

		$task = new Task;

		//$task->name = $reuest->name;
		$task->fill($reuest->all());

		$task->save();;

	    return redirect(route('tasks'));
	}

	//обновити задачу
	public function update(Request $request, $id) {
		$this->validate($request, [
            "name" => 'required|max:2000'
        ]);
		
	    $task = Task::findOrFail($id);
	    $task->update($request->all());

	    return redirect(route('tasks'));
	}

	//удалити задачу
	public  function delete(Task $task) {
		$task->delete();
	    return redirect(route('tasks'));
	}


	//API

    //получити всі задачі
    public function apiIndex() {
    	return response()->json(Task::all(), 200);
	}

	//сохранити задачу
	public function apiSave(Request $reuest) {
		$this->validate($reuest, [
            "name" => 'required|max:2000'
        ]);

		$task = Task::create($reuest->all());

	    return response()->json($task, 201);
	}

	//обновити задачу
	public function apiUpdate(Request $request, $id) {
		$this->validate($request, [
            "name" => 'required|max:2000'
        ]);
		
	    $task = Task::findOrFail($id);
	    $task->update($request->all());

	    return response()->json($task, 200);
	}

	//удалити задачу
	public  function apiDelete(Task $task) {
		$task->delete();

	    return response()->json(null, 204);
	}
}

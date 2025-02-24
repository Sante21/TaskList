<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    function createTask() {
        return view('newtask');
    }

    function store(Request $r) {
        $task = new Task();

        $task-> title = $r->input('title');
        $task-> description = $r->input('description');
        $task-> completed = false;
        $task-> date = $r->input('due_date');
        $task-> asignto = $r->input('asignto');
        $task-> priority = $r->input('priority');

        $task->save();
        return redirect('/');
    }

    function edit(Request $r, $id) {
        $task = Task::find($id);

        $task-> title = $r->input('title');
        $task-> description = $r->input('description');
        $task-> completed = false;
        $task-> date = $r->input('due_date');
        $task-> asignto = $r->input('asignto');
        $task-> priority = $r->input('priority');

        $task->save();
        return redirect('/');
    }

    function showTasks() {
        $tasks = Task::all();
        return view('index', ['tasks' => $tasks]);
    }

    function completeTask($id) {
        $task = Task::findOrFail($id);

        $task->completed = ($task->completed) ? false : true;
        $task->save();
        return redirect('/');
    }

    function editTask($id) {
        $task = Task::find($id);
        return view('newtask', compact('task'));
    }

    function removeTask($id) {
        $task = Task::find($id);
        $task->delete();
        return redirect('/');
    }
}

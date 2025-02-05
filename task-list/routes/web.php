<?php

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Support\Facades\Route;


Route::get("/", function () {
    return redirect("/list");
})->name("home");

Route::get('/list', function () {
    return view('list', ["tasks" => Task::latest()->paginate(5)]);
})->name("list.view");

Route::view("/create", "form")->name('create.view');
Route::get("/update/{task}", function (Task $task) {
    return view('form', ['task' => $task]);
})->name('update.view');

Route::post('/create', function (TaskRequest $request) {
    $task = Task::create($request->validated());
    return redirect()->route('details.view', ['task' => $task->id])->with('success', 'Task created successfully');
})->name('create.api');

Route::get("/details/{task}", function (Task $task) {
    return view("details", ["task" => $task]);
})->name("details.view");


Route::put('/update/{task}', function (Task $task, TaskRequest $request) {
    $task->update($request->validated());
    return redirect()->route('details.view', ['task' => $task->id])->with('success', 'Task updated successfully');
})->name('update.api');

Route::put('/toggle-complete/{task}', function (Task $task) {
    $task->toggleComplete();
    return redirect()->back()->with('success', 'Task status updated.');
})->name('toggle.api');

Route::delete('/delete/{task}', function (Task $task) {
    $task->delete();
    return redirect()->route('list.view')->with('success', 'Task deleted successfully');
})->name('delete.api');

Route::fallback(function () {
    return "Opps! Page not found";
})->name("404");

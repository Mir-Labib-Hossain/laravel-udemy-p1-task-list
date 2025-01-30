<?php

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

// class Task
// {
//     public function __construct(
//         public int $id,
//         public string $title,
//         public string $description,
//         public ?string $long_description,
//         public bool $completed,
//         public string $created_at,
//         public string $updated_at
//     ) {}
// }

// $tasks = [
//     new Task(
//         1,
//         'Buy groceries',
//         'Task 1 description',
//         'Task 1 long description',
//         false,
//         '2023-03-01 12:00:00',
//         '2023-03-01 12:00:00'
//     ),
//     new Task(
//         2,
//         'Sell old stuff',
//         'Task 2 description',
//         null,
//         false,
//         '2023-03-02 12:00:00',
//         '2023-03-02 12:00:00'
//     ),
//     new Task(
//         3,
//         'Learn programming',
//         'Task 3 description',
//         'Task 3 long description',
//         true,
//         '2023-03-03 12:00:00',
//         '2023-03-03 12:00:00'
//     ),
//     new Task(
//         4,
//         'Take dogs for a walk',
//         'Task 4 description',
//         null,
//         false,
//         '2023-03-04 12:00:00',
//         '2023-03-04 12:00:00'
//     ),
// ];

Route::get("/", function () {
    return redirect("/tasks");
})->name("home");

Route::get('/tasks', function () {
    return view('tasks', [
        "tasks" => Task::all()
    ]);
})->name("tasks");

Route::view("/task/create", "create");

Route::get("/task/update/{task}", function (Task $task) {
    return view('update', ['task' => $task]);
});

Route::get("/task/{task}", function (Task $task) {
    return view("task", ["task" => $task]);
})->name("task");


Route::post('/task', function (Request $request) {
    $payload = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task;
    $task->title = $payload['title'];
    $task->description = $payload['description'];
    $task->long_description = $payload['long_description'];

    $task->save();
    return redirect()->route('task', ['task' => $task->id])->with('success', 'Task created successfully');
})->name('create');


Route::put('/task/{task}', function (Task $task, Request $request) {
    $payload = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task->title = $payload['title'];
    $task->description = $payload['description'];
    $task->long_description = $payload['long_description'];

    $task->save();
    return redirect()->route('task', ['task' => $task->id])->with('success', 'Task updated successfully');
})->name('update');

Route::fallback(function () {
    return "Opps! Page not found";
})->name("404");

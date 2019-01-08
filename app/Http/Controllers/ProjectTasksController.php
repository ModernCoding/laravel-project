<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Task;

class ProjectTasksController extends Controller
{
  public function store(Project $project)
  {
    // Task::create([
    //   'project_id' => $project -> id,
    //   'description' => request('description')
    // ]);

    $project -> addTask(
      request() -> validate([
        'description' => 'required | min:3'
      ])
    );

    return back();
  }

  // public function update(Task $task)
  // {
  //   $method = request() -> has('completed') ? 'complete' : 'incomplete';
  //   $task -> $method();
  //
  //   return back();
  // }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use App\Mail\ProjectCreated;

class ProjectsController extends Controller
{
  public function __construct()
  {
    // $this -> middleware('auth') -> except(['index','show']);
    $this -> middleware('auth');
  }

  public function index()
  {
    // $projects = Project::where('owner_id', auth() -> id()) -> get();
    $projects = auth() -> user() -> projects;
    return view('projects.index', compact('projects'));
  }

  public function show(Project $project)
  {
    // abort_unless($project -> owner_id === auth() -> id(), 403);
    // $this -> authorize('access', $project);
    return view('projects.show', compact('project'));
  }

  public function create()
  {
    $projects = Project::all();
    return view('projects.create');
  }

  public function edit(Project $project)
  {
    // $this -> authorize('access', $project);
    return view('projects.edit', compact('project'));
  }

  public function store()
  {
    $attributes = $this->validateProject();
    $attributes['owner_id'] = auth()->id();
    
    $project = Project::create($attributes);

    \Mail::to('cormorant.programming@gmail.com') -> send(
      new ProjectCreated($project)
    );

    return redirect('/projects');
  }

  public function update(Project $project)
  {
    // $this ->authorize('access', $project);
    $project -> update($this -> validateProject());
    return redirect('/projects');
  }

  public function destroy(Project $project)
  {
    // $this ->authorize('access', $project);
    $project -> delete();
    return redirect('/projects');
  }

  protected function validateProject()
  {
    return request()->validate([
      'title' => 'required | min:3 | max:255',
      'description' => ['required', 'min:3']
    ]);

    $attributes['owner_id'] = auth()->id();

    return $attributes;
  }
}

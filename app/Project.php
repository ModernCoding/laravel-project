<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  protected $guarded = [];

  public function tasks()
  {
    return $this -> hasMany(Task::class);
  }

  public function addTask($request) {
    // return Task::create([
    //   'project_id' => $this -> id,
    //   'description' => $request['description']
    // ]);

    $this -> tasks() -> create([
      'description' => $request['description']
    ]);
  }

  public function user()
  {
    $this -> belongsTo(User::class);
  }
}

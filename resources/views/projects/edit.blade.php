@extends('layout')

@section('content')
  <h1 class="title">Edit project</h1>

  <form method="post" action="/projects/{{ $project -> id }}">
    @method('patch')
    @csrf

    <div class="field">
      <label for="title">Title</label>

      <div class="control">
        <input
          type="text"
          class="input"
          name="title"
          placeholder="Title"
          value="{{ $project -> title }}"
        >
      </div>
    </div>

    <div class="field">
      <label for="description">Description</label>

      <div class="control">
        <textarea class="textarea" name="description">{{ $project -> description }}</textarea>
      </div>
    </div>

    <div class="field">
      <div class="control">
        <button type="submit" class="button is-link">Update project</button>
      </div>
    </div>
  </form>

  <form method="post" action="/projects/{{ $project -> id }}">
    @method('delete')
    @csrf

    <div class="field">
      <div class="control">
        <button type="submit" class="button">Delete project</button>
      </div>
    </div>
  </form>
@endsection

@extends('layout')

@section('content')
  <h1 class="title">{{ $project -> title }}</h1>

  {{-- <div class="content"> --}}
  <div>
    {{ $project -> description }}

    @if ($project -> tasks -> count())
      <div class="box">
        @foreach ($project -> tasks as $task)
          <form method="post" action="/completed-tasks/{{ $task -> id }}">
            {{-- @method('patch') --}}
            @if ($task -> completed)
              @method('delete')
            @endif

            @csrf

            <label class="checkbox {{ $task -> completed ? 'is-complete' : '' }}">
              <input
                type="checkbox"
                name="completed"
                onChange="this.form.submit()"
                {{ $task -> completed ? 'checked' : '' }}
              >
              {{ $task -> description }}
            </label>
          </form>
        @endforeach
      </div>
    @endif

    <form
      class="box"
      method="post"
      action="/projects/{{ $project -> id }}/tasks"
    >
      @csrf

      <div class="field">
        <label class="label" for="description">New task</label>

        <div class="control">
          <input
            class="input"
            type="text"
            name="description"
            placeholder="New task"
          >
        </div>
      </div>

      <div class="field">
        <button type="submit" class="button is-link">Add task</button>
      </div>

      @include ('errors')
    </form>
  </div>

  <p>
    <a href="/projects/{{ $project -> id }}/edit">Edit</a>
  </p>
@endsection

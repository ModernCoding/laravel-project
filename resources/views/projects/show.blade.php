@extends('layout')

@section('content')
  <h1 class="title">{{ $project -> title }}</h1>

  <div class="content">
    {{ $project -> description }}

    @if ($project -> tasks -> count())
      <div>
        @foreach ($project -> tasks as $task)
          <form method="post" action="/tasks/{{ $task -> id }}">
            @method('patch')
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
  </div>

  <p>
    <a href="/projects/{{ $project -> id }}/edit">Edit</a>
  </p>
@endsection

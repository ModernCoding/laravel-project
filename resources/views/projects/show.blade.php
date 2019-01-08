@extends('layout')

@section('content')
  <h1 class="title">{{ $project -> title }}</h1>

  <div class="content">
    {{ $project -> description }}

    @if ($project -> tasks -> count())
      <div>
        <ul>
          @foreach ($project -> tasks as $task)
            <li>{{ $task -> description }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </div>

  <p>
    <a href="/projects/{{ $project -> id }}/edit">Edit</a>
  </p>
@endsection

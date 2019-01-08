@extends('layout')

@section('content')
  <h1 class="title">Create a new project</h1>

  <form method="post" action="/projects">
    {{ csrf_field() }}

    <div class="field">
      <input
        type="text"
        class="input {{ $errors -> has('title') ? 'is-danger' : '' }}"
        name="title"
        placeholder="Project title"
        value="{{ old('title') }}"
        {{-- required --}}
      >
    </div>

    <div class="field">
      <textarea
        class="textarea {{ $errors -> has('description') ? 'is-danger' : '' }}"
        name="description"
        placeholder="Project description"
        {{-- required --}}
      >{{ old('description') }}</textarea>
    </div>

    <div class="field">
      <button type="submit" class="button is-link">Create project</button>
    </div>

    @if ($errors -> any())
      <div class="notification is-danger">
        <ul>
          @foreach ($errors -> all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif
  </form>
@endsection

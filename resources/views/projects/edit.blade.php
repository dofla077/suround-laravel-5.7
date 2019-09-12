@extends('layout')

@section('content')
    <h1 class="title">Edit project</h1>

    <form action="/projects/{{ $project->id }}" method="POST">
        @method('PATCH')
        @csrf

        <div class="field">
            <label class="label" for="title">Title</label>
        </div>

        <div class="control">
            <input type="text" class="input" name="title" placeholder="title" value="{{ $project->title }}">
        </div>

        <div class="field">
            <label class="label" for="description">Description</label>
        </div>

        <div class="control">
            <textarea name="description" class="textarea">
                {{ $project->description }}
            </textarea>
        </div>

        <div class="field">
            <div class="control">
                <button type="submit" class="button is-link">Update Project</button>
            </div>
        </div>

    </form>

    @include('errors')

    <form action="/projects/{{ $project->id }}" method="POST">
        {{ method_field('DELETE') }}
        @method('DELETE')
        @csrf
        <div class="field">
            <div class="control">
                <button type="submit" class="button">delete Project</button>
            </div>
        </div>
    </form>

@endsection

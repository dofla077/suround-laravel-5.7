@extends('layout')

@section('content')
<h1 class="title">Create new project</h1>

<form action="/projects" method="post">
    @csrf
    <div class="field">
        <label class="label" for="title"> Project Title</label>
        <div class="control">
            <input type="text" class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" value="{{ old('title') }}" required >
        </div>
    </div>

    <div class="field">
        <label for="description" class="label">Project Description</label>
        <div class="control">
            <textarea  name="description" id="" class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" required >{{ old('description') }}</textarea>
        </div>
    </div>

    <div>
        <input type="submit" value="submit">
    </div>

</form>

@include('errors')

@endsection

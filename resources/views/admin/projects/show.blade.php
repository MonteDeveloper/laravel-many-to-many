@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <div class="d-flex align-items-center gap-3">
            <img class="col-1" src="{{ $project->image }}" alt="{{ $project->title }}" />
            <h1>{{ $project->name }}</h1>
            <h2>Type: {{ $project->type?->name }}</h2>
        </div>
        <p>{{ $project->description }}</p>
        <div class="d-flex gap-2">
            <a href="{{ route("admin.projects.edit", $project) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('admin.projects.destroy', $project)}}" method="post">
                @csrf
    
                @method("DELETE")
    
                <input class="form-control btn btn-danger" type="submit" value="Delete">
            </form>
        </div>
    </div>
</div>

@endsection
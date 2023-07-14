@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between gap-2">
        <div class="d-flex align-items-center gap-3">
            <img class="col-1 rounded" src="{{ $project->image ? asset("storage/".$project->image) : asset("storage/placeholders/placeholder.png") }}" alt="{{ $project->title }}" />
            <div>
                <h1>{{ $project->name }}</h1>
                <h2>Type: {{ $project->type?->name }}</h2>
            </div>
        </div>
        <p class="py-3 m-0">Description: {{ $project->description }}</p>
        <ul>
            @foreach ($project->technologies as $technology)
            <li>{{$technology->name}}[{{$technology->version}}]</li>
            @endforeach
        </ul>
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
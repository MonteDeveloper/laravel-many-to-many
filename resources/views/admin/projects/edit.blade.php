@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h1>Edit your Project #{{$project->id}}</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route("admin.projects.update", $project) }}" method="POST" class="needs-validation" enctype="multipart/form-data">
            @csrf

            @method("PUT")

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old("name") ??  $project->name}}" class="form-control mb-4">

            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-4">{{ old("description") ??  $project->description }}</textarea>

            <div class="d-flex mb-4 gap-4">
                <div class="d-flex flex-column col-1">
                    <label for="image">Old Image:</label>
                    <img class="rounded img-fluid" src="{{$project->image ? asset("storage/".$project->image) : asset("storage/placeholders/placeholder.png")}}" alt="{{$project->name}}">
                </div>
    
                <div>
                    <label for="image">New Image:</label>
                    <input type="file" name="image" id="image" class="form-control mb-4">
                </div>
            </div>

            <select class="form-control mb-4" name="type_id" id="type_id">
                <option value="" selected disabled>Select the TYPE</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}" @selected($project->type_id == $type->id)>{{$type->name}}</option>
                @endforeach
            </select>

            @foreach ($technologies as $i => $technology)
                <div class="form-check">
                    <input type="checkbox" value="{{$technology->id}}" name="technologies[]" id="technologies{{$i}}" class="form-check-input" @checked((!is_null(old('technologies')) && in_array($technology->id, old('technologies', []))) || (is_null(old('technologies')) && in_array($technology->id, $project->technologies->pluck('id')->toArray())))>
                    <label for="technologies{{$i}}" class="form-check-label">{{$technology->name}}</label>
                </div>
            @endforeach

            <input type="submit" class="btn btn-primary form-control mb-4" value="Edit Project">
        
        </form>
    </div>
</div>

@endsection
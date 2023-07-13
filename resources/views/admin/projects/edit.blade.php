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

        <form action="{{ route("admin.projects.update", $project) }}" method="POST" class="needs-validation">
            @csrf

            @method("PUT")

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old("name") ??  $project->name}}" class="form-control mb-4">

            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-4">{{ old("description") ??  $project->description }}</textarea>

            <label for="image">URL Image:</label>
            <input type="text" name="image" id="image" value="{{ old("image") ??  $project->image}}" class="form-control mb-4">

            <select class="form-control mb-4" name="type_id" id="type_id">
                <option value="" selected disabled>Select the TYPE</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}" @selected($project->type_id == $type->id)>{{$type->name}}</option>
                @endforeach
            </select>

            <input type="submit" class="btn btn-primary form-control mb-4" value="Edit Project">
        
        </form>
    </div>
</div>

@endsection
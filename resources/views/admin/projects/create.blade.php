@extends('layouts.admin')

@section('content')

<div class="container-fluid mt-4">
    <div class="row justify-content-between">
        <h1>Create your new Project</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $err)
                    <li>{{ $err }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route("admin.projects.store") }}" method="POST" class="needs-validation" enctype="multipart/form-data">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old("name") }}" class="form-control mb-4">

            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-4">{{ old("description") }}</textarea>

            <label for="image">Image:</label>
            <input type="file" name="image" id="image" class="form-control mb-4">

            <select class="form-control mb-4" name="type_id" id="type_id">
                <option value="" selected disabled>Select the TYPE</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}" @selected(old("type_id") == $type->id)>{{$type->name}}</option>
                @endforeach
            </select>

            @foreach ($technologies as $i => $technology)
                <div class="form-check">
                    <input type="checkbox" value="{{$technology->id}}" name="technologies[]" id="technologies{{$i}}" class="form-check-input" @checked(is_array(old('technologies')) && in_array($technology->id, old('technologies')))>
                    <label for="technologies{{$i}}" class="form-check-label">{{$technology->name}}</label>
                </div>
            @endforeach

            <input type="submit" class="btn btn-primary form-control mb-4" value="Create Project">
        
        </form>
    </div>
</div>

@endsection
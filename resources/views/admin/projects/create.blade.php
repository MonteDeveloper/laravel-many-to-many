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

        <form action="{{ route("admin.projects.store") }}" method="POST" class="needs-validation">
            @csrf

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" value="{{ old("name") }}" class="form-control mb-4">

            <label for="description">Description:</label>
            <textarea name="description" id="description" cols="30" rows="10" class="form-control mb-4">{{ old("description") }}</textarea>

            <label for="image">URL Image:</label>
            <input type="text" name="image" id="image" value="{{ old("image") }}" class="form-control mb-4">

            <select class="form-control mb-4" name="type_id" id="type_id">
                <option value="" selected disabled>Select the TYPE</option>
                @foreach ($types as $type)
                    <option value="{{$type->id}}" @selected(old("type_id") == $type->id)>{{$type->name}}</option>
                @endforeach
            </select>

            <input type="submit" class="btn btn-primary form-control mb-4" value="Create Project">
        
        </form>
    </div>
</div>

@endsection
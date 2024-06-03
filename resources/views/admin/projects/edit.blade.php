@extends('layouts.admin')

@section('content')
    <h2>Modifica il progetto: {{ $project->name }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <form action="{{ route('admin.projects.update', ['project' => $project->slug]) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Nome progetto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $project->name) }}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Nome cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('client_name', $project->client_name) }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" rows="15" name="content">{{ old('summary', $project->summary) }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Modifica</button>
    </form>
@endsection
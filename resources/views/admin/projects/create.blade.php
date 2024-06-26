@extends('layouts.admin')

@section('content')
    <h2>Crea progetto</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="title" class="form-label">Nome progetto</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="cover_image" class="form-label">Immagine</label>
            <input class="form-control" type="file" id="cover_image" name="cover_image">
        </div>


        <div class="mb-3">
            <label for="title" class="form-label">Nome Cliente</label>
            <input type="text" class="form-control" id="client_name" name="client_name" value="{{ old('name') }}">
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">Summary</label>
            <textarea class="form-control" id="summary" rows="15" name="summary">{{ old('summary') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crea</button>
    </form>
@endsection
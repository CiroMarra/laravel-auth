@extends('layouts.admin')

@section('content')
    <div>
        <h2>Nome Progetto: {{ $project->name }}</h2>
    </div>

    <div>
        <strong>Created at</strong>: {{ $project->created_at }}
    </div>

    <div>
        <strong>Updated at</strong>: {{ $project->updated_at }}
    </div>
    <div>
        <strong>Summary</strong>: 
        <div class="py-5">{{ $project->summary }}</div>
    </div>

    @if ($project->content)
        <p class="mt-5">{{ $project->content }}</p>
    @endif
@endsection
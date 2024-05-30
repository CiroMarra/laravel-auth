@extends('layouts.admin')

@section('content')
    <h2>{{ $project->title }}</h2>

    <div>
        <strong>Slug</strong>: {{ $project->slug }}
    </div>

    <div>
        <strong>Created at</strong>: {{ $project->created_at }}
    </div>

    <div>
        <strong>Updated at</strong>: {{ $project->updated_at }}
    </div>
    <div>
        <strong>Symmary</strong>: 
        <div class="py-5">{{ $project->summary }}</div>
    </div>

    @if ($project->content)
        <p class="mt-5">{{ $project->content }}</p>
    @endif
@endsection
@extends('layouts.app')

@section('content')
<div class="row mb-4">
    <div class="col">
        <h1>Projects</h1>
    </div>
    <div class="col text-end">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProjectModal">
            Create Project
        </button>
    </div>
</div>

<div class="row">
    @foreach($projects as $project)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">{{ $project->name }}</h5>
                    <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View Tasks</a>
                        <button type="button" class="btn btn-danger btn-sm" 
                                onclick="deleteProject({{ $project->id }})">Delete</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

@include('projects.partials.create-modal')
@endsection 
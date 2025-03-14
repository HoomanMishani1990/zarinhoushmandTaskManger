@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mb-4">
        <div class="col">
            <h1>My Projects</h1>
        </div>
        <div class="col text-end">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProjectModal">
                Create New Project
            </button>
        </div>
    </div>

    <div class="row">
        @forelse($projects as $project)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $project->name }}</h5>
                        <p class="card-text">{{ Str::limit($project->description, 100) }}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-primary">View Tasks</a>
                            <span class="text-muted">{{ $project->tasks_count }} tasks</span>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    You haven't created any projects yet. Start by creating your first project!
                </div>
            </div>
        @endforelse
    </div>
</div>

@include('projects.partials.create-modal')
@endsection

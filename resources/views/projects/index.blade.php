@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold">{{ __('Projects') }}</h4>
        <a href="{{ route('projects.create') }}" class="btn btn-primary">
            <i class="bx bx-plus"></i> {{ __('Create New Project') }}
        </a>
    </div>

    <div class="card">
        <div class="card-body">
            @if($projects->isEmpty())
                <p class="text-center py-4">{{ __('No projects found') }}</p>
            @else
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>{{ __('Project Name') }}</th>
                                <th>{{ __('Description') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Deadline') }}</th>
                                <th>{{ __('Tasks') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($projects as $project)
                            <tr>
                                <td>{{ $project->name }}</td>
                                <td>{{ Str::limit($project->description, 50) }}</td>
                                <td>{{ __($project->status) }}</td>
                                <td>{{ $project->deadline->format('Y-m-d') }}</td>
                                <td>{{ $project->tasks_count }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
                                            {{ __('Actions') }}
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ route('projects.show', $project) }}">
                                                <i class="bx bx-show me-1"></i> {{ __('View') }}
                                            </a>
                                            <!-- <a class="dropdown-item" href="{{ route('projects.edit', $project) }}"> -->
                                                <i class="bx bx-edit me-1"></i> {{ __('Edit') }}
                                            <!-- </a> -->
                                            <div class="dropdown-divider"></div>
                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="dropdown-item text-danger" 
                                                        onclick="return confirm('{{ __('Are you sure you want to delete this project?') }}')">
                                                    <i class="bx bx-trash me-1"></i> {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">
                    {{ $projects->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 
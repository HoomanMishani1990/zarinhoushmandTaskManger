@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">{{ __('Projects') }} /</span> {{ __('Edit Project') }}
    </h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">{{ __('Project Information') }}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Project Name') }}</label>
                                <input type="text" 
                                       name="name" 
                                       class="form-control @error('name') is-invalid @enderror" 
                                       value="{{ old('name', $project->name) }}"
                                       required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Client Name') }}</label>
                                <input type="text" 
                                       name="client_name" 
                                       class="form-control @error('client_name') is-invalid @enderror"
                                       value="{{ old('client_name', $project->client_name) }}">
                                @error('client_name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Total Budget') }}</label>
                                <input type="number" 
                                       name="total_budget" 
                                       class="form-control @error('total_budget') is-invalid @enderror"
                                       value="{{ old('total_budget', $project->total_budget) }}">
                                @error('total_budget')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Start Date') }}</label>
                                <input type="date" 
                                       name="start_date" 
                                       class="form-control @error('start_date') is-invalid @enderror"
                                       value="{{ old('start_date', $project->start_date->format('Y-m-d')) }}"
                                       required>
                                @error('start_date')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Deadline') }}</label>
                                <input type="date" 
                                       name="deadline" 
                                       class="form-control @error('deadline') is-invalid @enderror"
                                       value="{{ old('deadline', $project->deadline->format('Y-m-d')) }}"
                                       required>
                                @error('deadline')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label class="form-label">{{ __('Status') }}</label>
                                <select name="status" class="form-select @error('status') is-invalid @enderror" required>
                                    <option value="todo" {{ $project->status === 'todo' ? 'selected' : '' }}>
                                        {{ __('Todo') }}
                                    </option>
                                    <option value="in_progress" {{ $project->status === 'in_progress' ? 'selected' : '' }}>
                                        {{ __('In Progress') }}
                                    </option>
                                    <option value="done" {{ $project->status === 'done' ? 'selected' : '' }}>
                                        {{ __('Done') }}
                                    </option>
                                </select>
                                @error('status')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-12 mb-3">
                                <label class="form-label">{{ __('Description') }}</label>
                                <textarea name="description" 
                                          class="form-control @error('description') is-invalid @enderror" 
                                          rows="4" 
                                          required>{{ old('description', $project->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <button type="submit" class="btn btn-primary me-2">{{ __('Save Changes') }}</button>
                            <a href="{{ route('projects.show', $project) }}" class="btn btn-outline-secondary">
                                {{ __('Cancel') }}
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
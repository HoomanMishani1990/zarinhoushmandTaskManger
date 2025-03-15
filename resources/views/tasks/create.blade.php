@extends('layouts.app')

@section('title', __('tasks.create_task'))

@section('content')
<div class="content-area-wrapper">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-right mb-0">{{ __('tasks.create_new_task') }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="content-body">
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{ route('tasks.store') }}" method="POST" enctype="multipart/form-data" class="form">
                            @csrf
                            
                            <div class="form-group">
                                <label for="title">{{ __('tasks.title') }} <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror" 
                                       id="title" name="title" value="{{ old('title') }}" required>
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="project_id">{{ __('tasks.project') }} <span class="text-danger">*</span></label>
                                <select class="select2 form-control @error('project_id') is-invalid @enderror" 
                                        id="project_id" name="project_id" required>
                                    <option value="">{{ __('tasks.select_project') }}</option>
                                    @foreach($projects as $project)
                                        <option value="{{ $project->id }}" {{ old('project_id') == $project->id ? 'selected' : '' }}>
                                            {{ $project->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('project_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">{{ __('tasks.description') }} <span class="text-danger">*</span></label>
                                <textarea class="form-control @error('description') is-invalid @enderror" 
                                          id="description" name="description" rows="4" required>{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="assigned_to">{{ __('tasks.assign_to') }} <span class="text-danger">*</span></label>
                                        <select class="select2 form-control @error('assigned_to') is-invalid @enderror" 
                                                id="assigned_to" name="assigned_to" required>
                                            <option value="">{{ __('tasks.select_user') }}</option>
                                            @foreach($users as $user)
                                                <option value="{{ $user->id }}" {{ old('assigned_to') == $user->id ? 'selected' : '' }}>
                                                    {{ $user->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('assigned_to')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="priority">{{ __('tasks.priority') }} <span class="text-danger">*</span></label>
                                        <select class="form-control @error('priority') is-invalid @enderror" 
                                                id="priority" name="priority" required>
                                            @foreach($priorities as $key => $priority)
                                                <option value="{{ $key }}" {{ old('priority') == $key ? 'selected' : '' }}>
                                                    {{ $priority }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('priority')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="due_date">{{ __('tasks.due_date') }} <span class="text-danger">*</span></label>
                                        <input type="date" class="form-control @error('due_date') is-invalid @enderror" 
                                               id="due_date" name="due_date" value="{{ old('due_date') }}" required>
                                        @error('due_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="estimated_hours">{{ __('tasks.estimated_hours') }} <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('estimated_hours') is-invalid @enderror" 
                                               id="estimated_hours" name="estimated_hours" value="{{ old('estimated_hours') }}" 
                                               step="0.5" min="0" required>
                                        @error('estimated_hours')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="attachments">{{ __('tasks.attachments') }}</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('attachments.*') is-invalid @enderror" 
                                           id="attachments" name="attachments[]" multiple>
                                    <label class="custom-file-label" for="attachments">{{ __('tasks.choose_files') }}</label>
                                </div>
                                @error('attachments.*')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-primary">{{ __('tasks.create_task') }}</button>
                                <a href="{{ route('tasks.index') }}" class="btn btn-light">{{ __('common.cancel') }}</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('page-scripts')
<script>
    $(document).ready(function() {
        $('.select2').select2();
        
        // Update file input label with selected files
        $('.custom-file-input').on('change', function() {
            let fileNames = Array.from(this.files).map(file => file.name).join(', ');
            $(this).next('.custom-file-label').html(fileNames || "{{ __('tasks.choose_files') }}");
        });
    });
</script>
@endpush 
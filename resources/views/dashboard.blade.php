@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">{{ __('Dashboard') }}</h4>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <h5 class="card-header">{{ __('My Projects') }}</h5>
                <div class="card-body">
                    @if($projects->isEmpty())
                        <p class="text-center">{{ __('No projects found') }}</p>
                    @else
                        <div class="row g-4">
                            @foreach($projects as $project)
                            <div class="col-xl-4 col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-header primary-font">
                                        <div class="d-flex align-items-start">
                                            <div class="d-flex align-items-start">
                                                <div class="avatar me-3">
                                                    <img src="{{ $project->image_path ?? asset('assets/img/icons/brands/social-label.png') }}" 
                                                         alt="{{ $project->name }}" 
                                                         class="rounded-circle">
                                                </div>
                                                <div class="me-2">
                                                    <h5 class="mb-1">
                                                        <a href="{{ route('projects.show', $project) }}" class="h5 stretched-link">
                                                            {{ $project->name }}
                                                        </a>
                                                    </h5>
                                                    <div class="client-info d-flex align-items-center text-nowrap">
                                                        <h6 class="mb-0 me-1">{{ __('Client:') }}</h6>
                                                        <span>{{ $project->client_name }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="ms-auto">
                                                <div class="dropdown zindex-2">
                                                    <button type="button" class="btn dropdown-toggle hide-arrow p-0" data-bs-toggle="dropdown">
                                                        <i class="bx bx-dots-vertical-rounded"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('projects.edit', $project) }}">
                                                                {{ __('Edit Project') }}
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="{{ route('projects.show', $project) }}">
                                                                {{ __('View Details') }}
                                                            </a>
                                                        </li>
                                                        <li><hr class="dropdown-divider"></li>
                                                        <li>
                                                            <form action="{{ route('projects.destroy', $project) }}" method="POST" class="d-inline">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="dropdown-item text-danger" 
                                                                        onclick="return confirm('{{ __('Are you sure you want to delete this project?') }}')">
                                                                    {{ __('Delete Project') }}
                                                                </button>
                                                            </form>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex align-items-center flex-wrap">
                                            <div class="bg-lighter p-2 rounded me-auto mb-3">
                                                <h6 class="mb-1">
                                                    {{ number_format($project->total_budget) }} {{ __('تومان') }}
                                                    <span class="text-body fw-normal">/ {{ number_format($project->spent_budget) }} {{ __('تومان') }}</span>
                                                </h6>
                                                <span>{{ __('Total Budget') }}</span>
                                            </div>
                                            <div class="text-end mb-3">
                                                <h6 class="mb-1">
                                                    {{ __('Start Date:') }} 
                                                    <span class="text-body fw-normal">{{ $project->start_date->format('Y/m/d') }}</span>
                                                </h6>
                                                <h6 class="mb-1">
                                                    {{ __('Deadline:') }} 
                                                    <span class="text-body fw-normal">{{ $project->deadline->format('Y/m/d') }}</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <p class="mb-0">{{ Str::limit($project->description, 100) }}</p>
                                    </div>
                                    <div class="card-body border-top">
                                        <div class="d-flex align-items-center mb-3">
                                            <h6 class="mb-1">
                                                {{ __('Total Hours:') }} 
                                                <span class="text-body fw-normal">{{ $project->spent_hours }}/{{ $project->total_hours }}</span>
                                            </h6>
                                            <span class="badge bg-label-{{ $project->remaining_days > 0 ? 'success' : 'danger' }} ms-auto">
                                                {{ $project->remaining_days }} {{ __('days remaining') }}
                                            </span>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <small>{{ __('Tasks:') }} {{ $project->completed_tasks }}/{{ $project->total_tasks }}</small>
                                            <small>{{ $project->progress_percentage }}% {{ __('completed') }}</small>
                                        </div>
                                        <div class="progress mb-3" style="height: 8px">
                                            <div class="progress-bar" 
                                                 role="progressbar" 
                                                 style="width: {{ $project->progress_percentage }}%" 
                                                 aria-valuenow="{{ $project->progress_percentage }}" 
                                                 aria-valuemin="0" 
                                                 aria-valuemax="100">
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <div class="d-flex align-items-center">
                                                <ul class="list-unstyled d-flex align-items-center avatar-group mb-0 zindex-2">
                                                    @foreach($project->members()->take(3) as $member)
                                                    <li data-bs-toggle="tooltip" 
                                                        data-popup="tooltip-custom" 
                                                        data-bs-placement="top" 
                                                        class="avatar avatar-sm pull-up" 
                                                        aria-label="{{ $member->name }}" 
                                                        data-bs-original-title="{{ $member->name }}">
                                                        <img class="rounded-circle" 
                                                             src="{{ $member->profile_photo_url }}" 
                                                             alt="{{ $member->name }}">
                                                    </li>
                                                    @endforeach
                                                    <li><small>{{ $project->members_count }} {{ __('members') }}</small></li>
                                                </ul>
                                            </div>
                                            <div class="ms-auto">
                                                <a href="{{ route('projects.comments.index', $project) }}" class="text-body">
                                                    <i class="bx bx-chat"></i> {{ $project->comments_count }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('projects.partials.create-modal')
@endsection

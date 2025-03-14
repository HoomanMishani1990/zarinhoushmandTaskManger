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
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>{{ __('Project Name') }}</th>
                                        <th>{{ __('Status') }}</th>
                                        <th>{{ __('Deadline') }}</th>
                                        <th>{{ __('Actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($projects as $project)
                                        <tr>
                                            <td>{{ $project->name }}</td>
                                            <td>{{ __($project->status) }}</td>
                                            <td>{{ $project->deadline }}</td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-primary">{{ __('Edit') }}</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@include('projects.partials.create-modal')
@endsection

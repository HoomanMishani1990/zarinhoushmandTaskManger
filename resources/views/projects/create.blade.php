@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold">{{ __('ایجاد پروژه جدید') }}</h4>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">

        <!-- Display Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="mb-3">
            <label for="name" class="form-label">{{ __('نام پروژه') }}</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">{{ __('نام مشتری') }}</label>
            <input type="text" class="form-control @error('client_name') is-invalid @enderror" id="client_name" name="client_name" value="{{ old('client_name') }}">
            @error('client_name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="total_budget" class="form-label">{{ __('بودجه کل') }}</label>
            <input type="number" class="form-control @error('total_budget') is-invalid @enderror" id="total_budget" name="total_budget" step="0.01" value="{{ old('total_budget') }}">
            @error('total_budget')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">{{ __('تاریخ شروع') }}</label>
            <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" required>
            @error('start_date')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">{{ __('مهلت') }}</label>
            <input type="date" class="form-control @error('deadline') is-invalid @enderror" id="deadline" name="deadline" value="{{ old('deadline') }}" required>
            @error('deadline')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('توضیحات') }}</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{ old('description') }}</textarea>
            @error('description')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">{{ __('تصویر') }}</label>
            <input type="file" class="form-control @error('image_path') is-invalid @enderror" id="image_path" name="image_path">
            @error('image_path')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('ذخیره') }}</button>
    </form>
</div>
@endsection 
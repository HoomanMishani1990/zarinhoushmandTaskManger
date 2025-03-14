@extends('layouts.app')

@section('content')
<div class="container">
    <h4 class="fw-bold">{{ __('ایجاد پروژه جدید') }}</h4>
    <form action="{{ route('projects.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value="{{ auth()->id() }}">
        <div class="mb-3">
            <label for="name" class="form-label">{{ __('نام پروژه') }}</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="client_name" class="form-label">{{ __('نام مشتری') }}</label>
            <input type="text" class="form-control" id="client_name" name="client_name">
        </div>
        <div class="mb-3">
            <label for="total_budget" class="form-label">{{ __('بودجه کل') }}</label>
            <input type="number" class="form-control" id="total_budget" name="total_budget" step="0.01">
        </div>
        <div class="mb-3">
            <label for="start_date" class="form-label">{{ __('تاریخ شروع') }}</label>
            <input type="date" class="form-control" id="start_date" name="start_date" required>
        </div>
        <div class="mb-3">
            <label for="deadline" class="form-label">{{ __('مهلت') }}</label>
            <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">{{ __('توضیحات') }}</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="image_path" class="form-label">{{ __('تصویر') }}</label>
            <input type="file" class="form-control" id="image_path" name="image_path">
        </div>
        <button type="submit" class="btn btn-primary">{{ __('ذخیره') }}</button>
    </form>
</div>
@endsection 
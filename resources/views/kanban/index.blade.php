@extends('layouts.app')

@section('title', 'تخته وظایف - ' . config('app.name'))

@push('styles')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jkanban/jkanban.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/typography.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/katex.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/quill/editor-fa.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/app-kanban.css') }}">
@endpush

@section('content')
<div class="app-kanban">
    <!-- Add new board -->
    <div class="row">
        <div class="col-12">
            <form class="kanban-add-new-board">
                <label class="kanban-add-board-btn" for="kanban-add-board-input">
                    <i class="bx bx-plus me-1"></i>
                    <span class="align-middle secondary-font">افزودن جدید</span>
                </label>
                <input type="text" class="form-control w-px-250 kanban-add-board-input mb-2 d-none" 
                       placeholder="افزودن عنوان تخته" id="kanban-add-board-input" required>
                <div class="mb-3 kanban-add-board-input d-none">
                    <button class="btn btn-primary btn-sm me-2">افزودن</button>
                    <button type="button" class="btn btn-label-secondary btn-sm kanban-add-board-cancel-btn">
                        انصراف
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Kanban Wrapper -->
    <div class="kanban-wrapper"></div>

    @include('kanban.partials.edit-task-sidebar')
</div>
@endsection

@push('scripts')
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jdate/jdate.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr-jdate.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/l10n/fa-jdate.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/i18n/fa.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jkanban/jkanban.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/katex.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/quill/quill.js') }}"></script>
    <script src="{{ asset('assets/js/app-kanban.js') }}"></script>
@endpush 
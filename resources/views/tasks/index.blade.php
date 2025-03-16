@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
        <h1 class="text-2xl font-bold mb-4">{{ __('Tasks_List') }}</h1>

    <a href="{{ route('tasks.create') }}" class="text-xl bg-blue-500  px-4 py-2 rounded">ایجاد وظیفه جدید</a>

    <div class="mt-6">
        @foreach ($tasks as $task)
            <div class="bg-white p-4 rounded shadow mb-4">
                <h2 class="text-xl font-semibold">{{ $task->name }}</h2>
                <p class="text-gray-600">{{ $task->description }}</p>
                <p class="text-sm text-gray-500">{{ __('Status') }}: {{ $task->status }}</p>
                <div class="mt-2">
                    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500">{{ __('Edit') }}</a>
                    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-500 mr-2" onclick="return confirm('آیا از حذف این وظیفه اطمینان دارید؟')">
                            {{ __('Delete') }}
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection 
@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        اعلان‌ها
        @if($unreadCount = auth()->user()->unreadNotifications->count())
            <span class="badge bg-danger">{{ $unreadCount }}</span>
        @endif
    </h4>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">لیست اعلان‌ها</h5>
            @if($unreadCount)
                <form action="{{ route('notifications.mark-all-read') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-primary btn-sm">
                        علامت‌گذاری همه به عنوان خوانده شده
                    </button>
                </form>
            @endif
        </div>

        <div class="card-body">
            @if($notifications->isEmpty())
                <p class="text-center my-4">هیچ اعلانی وجود ندارد.</p>
            @else
                <div class="list-group">
                    @foreach($notifications as $notification)
                        <div class="list-group-item list-group-item-action d-flex justify-content-between align-items-center {{ $notification->read_at ? '' : 'bg-light' }}">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $notification->data['title'] ?? 'اعلان' }}</div>
                                <p class="mb-1">{{ $notification->data['message'] ?? '' }}</p>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                            <div class="d-flex gap-2">
                                @if(!$notification->read_at)
                                    <form action="{{ route('notifications.mark-read', $notification->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            علامت خوانده شده
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('notifications.destroy', $notification->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('آیا مطمئن هستید؟')">
                                        حذف
                                    </button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-4">
                    {{ $notifications->links() }}
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 
<li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
    <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
        <i class="bx bx-bell bx-sm"></i>
        @if($unreadNotifications = auth()->user()->unreadNotifications->count())
            <span class="badge bg-danger rounded-pill badge-notifications">{{ $unreadNotifications }}</span>
        @endif
    </a>
    <ul class="dropdown-menu dropdown-menu-end py-0">
        <li class="dropdown-menu-header border-bottom">
            <div class="dropdown-header d-flex align-items-center py-3">
                <h5 class="text-body mb-0 me-auto">اعلان‌ها</h5>
                @if($unreadNotifications)
                    <a href="{{ route('notifications.mark-all-read') }}" 
                       class="dropdown-notifications-all text-body"
                       data-bs-toggle="tooltip"
                       data-bs-placement="top"
                       title="علامت‌گذاری همه به عنوان خوانده شده">
                        <i class="bx fs-4 bx-envelope-open"></i>
                    </a>
                @endif
            </div>
        </li>
        <li class="dropdown-notifications-list scrollable-container">
            <ul class="list-group list-group-flush">
                @forelse(auth()->user()->notifications()->limit(5)->get() as $notification)
                    <li class="list-group-item list-group-item-action dropdown-notifications-item {{ $notification->read_at ? '' : 'marked-as-unread' }}">
                        <div class="d-flex">
                            <div class="flex-shrink-0 me-3">
                                <div class="avatar">
                                    <span class="avatar-initial rounded-circle {{ $notification->data['icon_class'] ?? 'bg-primary' }}">
                                        <i class="bx {{ $notification->data['icon'] ?? 'bx-bell' }}"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="flex-grow-1">
                                <h6 class="mb-1">{{ $notification->data['title'] }}</h6>
                                <p class="mb-1">{{ $notification->data['message'] }}</p>
                                <small class="text-muted">{{ $notification->created_at->diffForHumans() }}</small>
                            </div>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item list-group-item-action dropdown-notifications-item">
                        <div class="d-flex">
                            <div class="flex-grow-1">
                                <p class="mb-0 text-center">اعلان جدیدی وجود ندارد</p>
                            </div>
                        </div>
                    </li>
                @endforelse
            </ul>
        </li>
        <li class="dropdown-menu-footer border-top">
            <a href="{{ route('notifications.index') }}" class="dropdown-item d-flex justify-content-center p-3">
                مشاهده همه اعلان‌ها
            </a>
        </li>
    </ul>
</li> 
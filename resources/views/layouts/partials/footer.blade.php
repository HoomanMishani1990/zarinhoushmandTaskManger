<footer class="content-footer footer bg-footer-theme">
    <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
        <div class="mb-2 mb-md-0">
            © {{ date('Y') }}
            <a href="{{ config('app.url') }}" class="footer-link fw-bolder">{{ config('app.name') }}</a>
        </div>
        <div>
            <a href="{{ route('dashboard') }}" class="footer-link me-4">داشبورد</a>
            
            @auth
                <a href="{{ route('profile.edit') }}" class="footer-link me-4">پروفایل</a>
            @endauth
            
            @if(auth()->user()?->isAdmin())
                <a href="{{ route('admin.users.index') }}" class="footer-link me-4">مدیریت کاربران</a>
            @endif
        </div>
    </div>
</footer>

<!-- Overlay -->
<div class="layout-overlay layout-menu-toggle"></div>

<!-- Drag Target Area To SlideIn Menu On Small Screens -->
<div class="drag-target"></div> 
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset('main.webp') }}" 
                     alt="{{ config('app.name') }}" 
                     width="26" 
                     height="26"
                     style="object-fit: contain;">
            </span>
            <span class="app-brand-text demo menu-text fw-bold ms-2">{{ config('app.name') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="bx menu-toggle-icon d-none d-xl-block fs-4 align-middle"></i>
            <i class="bx bx-x d-block d-xl-none bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-divider mt-0"></div>
    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div>داشبورد</div>
            </a>
        </li>

        <!-- Projects -->
        <li class="menu-item {{ request()->routeIs('projects.*') ? 'active' : '' }}">
            <a href="{{ route('projects.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div>پروژه‌ها</div>
            </a>
        </li>

        <!-- Tasks -->
        <li class="menu-item {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
            <a href="{{ route('tasks.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-check-square"></i>
                <div>وظایف</div>
            </a>
        </li>

        <!-- Kanban Board -->
        <li class="menu-item {{ request()->routeIs('kanban.*') ? 'active' : '' }}">
            <a href="{{ route('kanban.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-grid"></i>
                <div>تخته کانبان</div>
            </a>
        </li>

        @if(auth()->user()->isAdmin())
        <!-- Admin Section -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">مدیریت</span>
        </li>

        <!-- User Management -->
        <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div>کاربران</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('admin.users.index') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.index') }}" class="menu-link">
                        <div>لیست کاربران</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('admin.users.create') ? 'active' : '' }}">
                    <a href="{{ route('admin.users.create') }}" class="menu-link">
                        <div>افزودن کاربر</div>
                    </a>
                </li>
            </ul>
        </li>
        @endif

        <!-- User Profile & Settings -->
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">پروفایل و تنظیمات</span>
        </li>

        <li class="menu-item {{ request()->routeIs('profile.*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-user-circle"></i>
                <div>پروفایل</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('profile.edit') ? 'active' : '' }}">
                    <a href="{{ route('profile.edit') }}" class="menu-link">
                        <div>ویرایش پروفایل</div>
                    </a>
                </li>
                <li class="menu-item {{ request()->routeIs('profile.password') ? 'active' : '' }}">
                    <a href="{{ route('profile.password') }}" class="menu-link">
                        <div>تغییر رمز عبور</div>
                    </a>
                </li>
            </ul>
        </li>
    </ul>
</aside> 
<div class="offcanvas offcanvas-end kanban-update-item-sidebar">
    <div class="offcanvas-header border-bottom">
        <h5 class="offcanvas-title">ویرایش وظیفه</h5>
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav nav-tabs tabs-line">
            <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#tab-update">
                    <i class="bx bx-edit me-2"></i>
                    <span class="align-middle">ویرایش</span>
                </button>
            </li>
            <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#tab-activity">
                    <i class="bx bx-trending-up me-2"></i>
                    <span class="align-middle">فعالیت</span>
                </button>
            </li>
        </ul>
        <div class="tab-content px-0 pb-0">
            @include('kanban.partials.edit-task-form')
            @include('kanban.partials.task-activity')
        </div>
    </div>
</div> 
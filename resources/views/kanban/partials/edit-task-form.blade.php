<div class="tab-pane fade show active" id="tab-update" role="tabpanel">
    <form id="editTaskForm" action="{{ route('tasks.update', ':id') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label" for="title">عنوان</label>
            <input type="text" id="title" name="title" class="form-control" placeholder="عنوان را وارد کنید">
        </div>
        <div class="mb-3">
            <label class="form-label" for="due-date">تاریخ سررسید</label>
            <input type="text" id="due-date" name="due_date" class="form-control flatpickr" placeholder="تاریخ سررسید را وارد کنید">
        </div>
        <div class="mb-3">
            <label class="form-label" for="priority">اولویت</label>
            <select class="form-select" id="priority" name="priority">
                <option value="low">کم</option>
                <option value="medium">متوسط</option>
                <option value="high">زیاد</option>
            </select>
        </div>
        <div class="mb-3">
            <label class="form-label">توضیحات</label>
            <div class="comment-editor border-bottom-0"></div>
        </div>
        <div class="d-flex flex-wrap">
            <button type="submit" class="btn btn-primary me-3">
                به‌روزرسانی
            </button>
            <button type="button" class="btn btn-label-danger delete-task">
                حذف
            </button>
        </div>
    </form>
</div> 
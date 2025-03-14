@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">تغییر رمز عبور</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">تغییر رمز عبور</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.password.update') }}">
                        @csrf
                        @method('patch')

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="current_password" class="form-label">رمز عبور فعلی</label>
                                <input class="form-control" type="password" id="current_password" name="current_password" />
                                @error('current_password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label">رمز عبور جدید</label>
                                <input class="form-control" type="password" id="password" name="password" />
                                @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="password_confirmation" class="form-label">تکرار رمز عبور جدید</label>
                                <input class="form-control" type="password" id="password_confirmation" name="password_confirmation" />
                            </div>
                        </div>

                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">تغییر رمز عبور</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 
@extends('layouts.app')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">پروفایل کاربری</h4>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">اطلاعات پروفایل</h5>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">نام</label>
                                <input class="form-control" type="text" id="name" name="name" 
                                    value="{{ old('name', auth()->user()->name) }}" />
                                @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">ایمیل</label>
                                <input class="form-control" type="email" id="email" name="email" 
                                    value="{{ old('email', auth()->user()->email) }}" />
                                @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">ذخیره تغییرات</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

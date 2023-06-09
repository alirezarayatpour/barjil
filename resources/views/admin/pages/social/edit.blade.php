@extends('admin.layouts.app')
@section('title', 'شبکه‌های اجتماعی')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('social.update', $social->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>نام آیکون</label>
                            <input type="text" name="icon" class="form-control" value="{{ $social->icon }}"/>
                        </div>
                        <div class="form-group">
                            <label>لینک</label>
                            <input type="text" name="link" class="form-control" value="{{ $social->link }}"/>
                        </div>
                        <div class="form-group">
                            <label>رنگ پس زمینه</label>
                            <input type="color" name="color" class="form-control-color" value="{{ $social->color }}"/>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

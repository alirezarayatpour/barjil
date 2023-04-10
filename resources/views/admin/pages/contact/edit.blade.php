@extends('admin.layouts.app')
@section('title', 'اطلاعات تماس')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('contact.update', $contact->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>شماره تلفن</label>
                            <input type="text" name="phone" class="form-control" value="{{ $contact->phone }}"/>
                        </div>
                        <div class="form-group">
                            <label>آدرس ایمیل</label>
                            <input type="email" name="email" class="form-control" value="{{ $contact->email }}"/>
                        </div>
                        <div class="form-group">
                            <label>شماره واتساپ</label>
                            <input type="text" name="whatsapp" class="form-control" value="{{ $contact->whatsapp }}"/>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

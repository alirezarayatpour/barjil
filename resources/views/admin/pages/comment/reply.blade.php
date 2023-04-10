@extends('admin.layouts.app')
@section('title', 'پاسخ نظرات')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('reply') }}" method="POST">
                        @csrf
                        {{-- <input type="text" name="comment_id" id="comment_id" /> --}}
                        <div class="form-group">
                            <label>پاسخ</label>
                            <textarea name="reply" id="reply" rows="5" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">پاسخ</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

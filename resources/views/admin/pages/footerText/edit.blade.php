@extends('admin.layouts.app')
@section('title', 'متن Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerText.update', $footerText->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>متن</label>
                            <textarea id="mytextarea" name="body">{!! $footerText->body !!}</textarea>
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ویرایش</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

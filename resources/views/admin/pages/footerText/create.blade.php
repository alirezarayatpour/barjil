@extends('admin.layouts.app')
@section('title', 'متن Footer')
@section('content')
    <!-- ============================================================== -->
    <div class="row mt-3">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('footerText.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>متن</label>
                            <textarea id="mytextarea" name="body" class="@error('body') is-invalid @enderror">
                                {{ old('body') }}
                            </textarea>
                            @error('body')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success mt-2">ایجاد</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

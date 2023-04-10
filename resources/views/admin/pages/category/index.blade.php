@extends('admin.layouts.app')
@section('title', 'دسته‌بندی')
@section('content')
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-md-12">

            @include('message.message')

            <a href="{{ route('category.create') }}" class="btn btn-primary">ایجاد دسته‌بندی جدید</a>

            <div class="card mt-2">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Parent_id</th>
                                <th scope="col">نام دسته‌بندی</th>
                                <th scope="col">وضعیت</th>
                                <th scope="col">حذف</th>
                                <th scope="col">ویرایش</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <th scope="row">{{ $category->parent_id }}</th>
                                    <th scope="row">{{ $category->category }}</th>

                                    @switch($category->status)
                                        @case(0)
                                        @php
                                            $url = route('category.status', $category->id);
                                            $status = "<a href='".$url."' class='btn btn-danger text-white'>غیرفعال</a>";
                                        @endphp
                                        @break

                                        @case(1)
                                        @php
                                            $url = route('category.status', $category->id);
                                            $status = "<a href='".$url."' class='btn btn-success text-white'>فعال</a>";
                                        @endphp
                                        @break
                                    @endswitch

                                    <td>{!! $status !!}</td>
                                    <td>
                                        <form action="{{ route('category.destroy', $category->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger">حذف</button>
                                        </form>
                                    </td>
                                    <td>
                                        <a href="{{ route('category.edit', $category->id) }}"
                                           class="btn btn-primary mr-2">ویرایش</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

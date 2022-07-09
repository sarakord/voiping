@extends('admin.layouts.index')

@section('title')
    تماس ها
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="col-10 float-right  page-title">تماس ها</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>نام کاربر</th>
                                    <th>نام مخاطب</th>
                                    <th>تاریخ تماس</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($calls as $call)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ optional($call->user)->name }}</td>
                                        <td>{{ optional($call->contact)->name }}</td>
                                        <td>{{ $call->call_date }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @include('admin.layouts.footer')

    </div>

@endsection

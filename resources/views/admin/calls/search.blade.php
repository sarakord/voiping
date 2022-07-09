@extends('admin.layouts.index')

@section('title')
    مدیریت مطالب
@endsection

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row page-title-header">
                <div class="col-12">
                    <div class="page-header">
                        <h4 class="col-10 float-right  page-title"> مدیریت مطالب</h4>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 grid-margin stretch-card">
                    <select class="col-4" name="" id="users">
                        <option value="">انتخاب کاربر</option>
                        @foreach($users as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card" id="content">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>آیدی کاربر</th>
                                    <th>آیدی مخاطب</th>
                                    <th>نام مخاطب</th>
                                    <th>تاریخ تماس</th>
                                </tr>
                                </thead>
                                <tbody id="contactInformation">
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

@push('js')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script>
        $('#users').change(function () {
            let user = $(this).val();
            if (user) {
                $('#contactInformation').empty();
                let url = '/admin/search/result/'+ user;
                axios.get( url )
                    .then(function (response) {
                        if(response.data.success){
                            $('#contactInformation').html(response.data.result);
                        }else{
                            $('#contactInformation').html(`<tr><td colspan="4">${ response.data.message }</td></tr>`);
                        }
                    })
                    .catch(function (error) {
                        $('#contactInformation').html(`<tr><td colspan="4">${ error.data.message }</td></tr>`);
                    });
            }else{
                $('#contactInformation').empty();
                $('#contactInformation').html('<tr><td colspan="4">لطفا یک کاربر انتخاب کنید</td></tr>');
            }
        });
    </script>
@endpush

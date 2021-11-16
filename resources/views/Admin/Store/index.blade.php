@extends('admin.dashboard.layouts.master')

@section('title', 'الشركاء (المتاجر)')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('admin.dashboard.index') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('admin.store.index') }}">الشركاء (المتاجر)</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> قائمة الشركاء (المتاجر)
        </h1>
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <a href="{{ route('admin.store.create', 0) }}" class="btn btn-primary"><i
                                    class="fa fa-plus-square"></i></a>
                        </div>

                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> الشعار </th>
                                        <th> اسم المتجر </th>
                                        <th> موقع الويب </th>
                                        <th> رقم الجوال </th>
                                        <th> الايميل </th>.
                                        <th> رقم الأيبان </th>
                                        <th> رقم السجل التجاري </th>
                                        <th> الحالة </th>
                                        <th> تاريخ الانشاء </th>
                                        <th> اجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $key => $record)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td>
                                                <img class="img-responsive img-thumbnail" src="{{ $record->logo }} "
                                                    style="height: 70px; width: 70px" alt="">
                                            </td>
                                            <td> {{ $record->store_name }} </td>
                                            <td> {{ $record->web_url }} </td>
                                            <td> {{ $record->phone }} </td>
                                            <td> {{ $record->email }} </td>
                                            <td> {!! $record->bank->iban !!} </td>
                                            <td> {!! $record->cr->commercial_number !!} </td>

                                            <td>
                                                <div class="form-group">
                                                    <div class="col-md-9">
                                                        <input type="checkbox" onchange="update_status(this)"
                                                            <?php if ($record->status == 1) {
                                                                echo 'checked';
                                                            } ?> class="make-switch"
                                                            value="{{ $record->id }}" data-size="small">
                                                    </div>
                                                </div>
                                            </td>

                                            <td> {{ $record->created_at }} </td>

                                            <td>

                                                <a href="{{ route('admin.store.show', [$record->id]) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                                <a href="{{ route('admin.store.edit', [$record->id]) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                                <form id="delete-form-{{ $record->id }}"
                                                    action="{{ route('admin.store.destroy', $record->id) }}"
                                                    style="display: none;" method="POST">
                                                    @csrf
                                                </form>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="if(confirm('هل أنت متأكد أنك تريد حذف السجل؟')){
                                                    event.preventDefault();
                                                    document.getElementById('delete-form-{{ $record->id }}').submit();
                                                    } else {
                                                    event.preventDefault();
                                                    }"><i class="fa fa-trash"></i>


                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>

    </div>

@endsection
@section('myjsfile')
    <script>
        function update_status(el) {
            if (el.checked) {
                var status = 1;
            } else {
                var status = 0;
            }
            $.post('{{ route('admin.store.status', isset($record) ? $record->id : '') }}', {
                _token: '{{ csrf_token() }}',
                id: el.value,
                status: status
            }, function(data) {
                if (data == 1) {
                    alert('تم تغيير الحالة');
                } else {
                    alert('هناك خطأ!');
                }
            });
        }
    </script>
@endsection

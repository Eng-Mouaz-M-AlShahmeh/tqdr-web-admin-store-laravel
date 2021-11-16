@extends('admin.dashboard.layouts.master')

@section('title', 'الإيصالات')

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
                    <a href="{{ route('admin.invoice.index') }}">الإيصالات</a>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> قائمة الإيصالات
        </h1>
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption">
                            <a href="{{ route('admin.invoice.create', 0) }}" class="btn btn-primary"><i
                                    class="fa fa-plus-square"></i></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> معرف الإيصال </th>
                                        <th> المبلغ </th>
                                        <th> المبلغ المتبقي </th>
                                        <th> حالة الدفع </th>
                                        <th> مزود الخدمة </th>
                                        <th> الحالة </th>
                                        <th> تاريخ الانشاء </th>
                                        <th> اجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $key => $record)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {{ $record->id }} </td>
                                            <td> {{ $record->amount }} ريال</td>
                                            <td> {{ $record->remaining_amount }} ريال</td>
                                            <td>
                                                <div
                                                    class="badge badge-pill {{ $record->is_paid == 1 ? 'badge-success' : 'badge-warning' }} p-3">
                                                    {{ $record->is_paid == 1 ? 'تم الدفع' : 'لم يتم الدفع' }}
                                                </div>
                                            </td>
                                            <td> {!! $record->serviceProvider->username !!} </td>
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
                                                <a href="{{ route('admin.invoice.show', [$record->id]) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('admin.invoice.edit', [$record->id]) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                                <form id="delete-form-{{ $record->id }}"
                                                    action="{{ route('admin.invoice.destroy', $record->id) }}"
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
            $.post('{{ route('admin.invoice.status', isset($record) ? $record->id : '') }}', {
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

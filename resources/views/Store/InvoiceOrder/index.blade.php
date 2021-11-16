@extends('store.dashboard.layouts.master')

@section('title', 'طلبات الإيصالات')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('store.dashboard.index') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('store.invoiceorder.index') }}">طلبات الإيصالات</a>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> قائمة طلبات الإيصالات
        </h1>
        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        {{-- 
                        <div class="caption">
                            <a href="{{ route('store.invoiceorder.create', 0) }}" class="btn btn-primary"><i
                                    class="fa fa-plus-square"></i></a>
                        </div>
                        --}}
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover" id="sample_3">
                                <thead>
                                    <tr>
                                        <th> # </th>
                                        <th> رقم جوال العميل </th>
                                        <th> رقم الإيصال </th>
                                        <th> اسم المتجر </th>
                                        <th> مبلغ الدفع </th>
                                        <th> تاريخ الانشاء </th>
                                        <th> اجراءات </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $key => $record)
                                        <tr>
                                            <td> {{ $key + 1 }} </td>
                                            <td> {!! $record->customer->phone !!} </td>
                                            <td> {!! $record->invoice->id !!} </td>
                                            <td> {!! $record->store->store_name !!} </td>
                                            <td> {!! $record->amount !!} ريال</td>
                                            <td> {{ $record->created_at }} </td>
                                            <td>

                                                <a href="{{ route('store.invoiceorder.show', [$record->id]) }}"
                                                    class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>

                                                {{--
                                                <a href="{{ route('store.invoiceorder.edit', [$record->id]) }}"
                                                    class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>

                                                <form id="delete-form-{{ $record->id }}"
                                                    action="{{ route('store.invoiceorder.destroy', $record->id) }}"
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
                                                --}}
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
@endsection

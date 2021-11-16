@extends('store.dashboard.layouts.master')

@section('title', 'تفاصيل طلب الإيصال')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb pull-right">
                <li>
                    <a href="{{ route('store.dashboard.index') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('store.invoiceorder.index') }}">طلبات الإيصالات</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تفاصيل طلب الإيصال</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">تفاصيل طلب الإيصال
        </h1>

        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption pull-right">
                            <h5> المعلومات الرئيسية </h5>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> رقم جوال العميل </th>
                                        <th> رقم الإيصال </th>
                                        <th> اسم المتجر </th>
                                        <th> مبلغ الدفع </th>
                                        <th> تاريخ الإنشاء </th>
                                        <th> تاريخ التعديل </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {!! $record->customer->phone !!} </td>
                                        <td> {!! $record->invoice->id !!} </td>
                                        <td> {!! $record->store->store_name !!} </td>
                                        <td> {!! $record->amount !!} ريال </td>
                                        <td> {{ $record->created_at }} </td>
                                        <td> {{ $record->updated_at }} </td>
                                    </tr>
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

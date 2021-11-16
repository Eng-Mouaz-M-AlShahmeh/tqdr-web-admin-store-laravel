@extends('admin.dashboard.layouts.master')

@section('title', 'تفاصيل البنك')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb pull-right">
                <li>
                    <a href="{{ route('admin.dashboard.index') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <a href="{{ route('admin.bank.index') }}">البنك</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تفاصيل البنك</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">تفاصيل البنك
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
                                        <th> اسم البنك </th>
                                        <th> اسم العميل </th>
                                        <th> رقم العميل </th>
                                        <th> العنوان </th>
                                        <th> رقم الحساب الحالي </th>
                                        <th> الأيبان </th>
                                        <th> تاريخ الإنشاء </th>
                                        <th> تاريخ التعديل </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{ $record->name }} </td>
                                        <td> {{ $record->customer_name }} </td>
                                        <td> {{ $record->customer_number }} </td>
                                        <td> {{ $record->address }} </td>
                                        <td> {{ $record->current_account_number }} </td>
                                        <td> {{ $record->iban }} </td>
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

@extends('admin.dashboard.layouts.master')

@section('title', 'تفاصيل عميل')

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
                    <a href="{{ route('admin.customer.index') }}">العملاء</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تفاصيل عميل</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">تفاصيل عميل
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
                                        <th> الصورة الشخصية </th>
                                        <th> اسم المستخدم </th>
                                        <th> الاسم الأول </th>
                                        <th> الاسم الأخير </th>
                                        <th> الايميل </th>
                                        <th> رقم الجوال </th>
                                        <th> تاريخ الإنشاء </th>
                                        <th> تاريخ التعديل </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                src="{{ $record->getImageAttribute($record->avatar) }}"
                                                style="height: 100px; width: 100px" alt="">
                                        </td>
                                        <td> {{ $record->username }} </td>
                                        <td> {{ $record->first_name }} </td>
                                        <td> {{ $record->last_name }} </td>
                                        <td> {{ $record->email }} </td>
                                        <td> {{ $record->phone }} </td>
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

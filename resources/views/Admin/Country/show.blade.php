@extends('admin.dashboard.layouts.master')

@section('title', 'تفاصيل البلد')

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
                    <a href="{{ route('admin.country.index') }}">البلدان</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تفاصيل البلد</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">تفاصيل البلد
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
                                        <th> الاسم </th>
                                        <th> العلم </th>
                                        <th> الرقم الدولي </th>
                                        <th> المعرف الدولي ISO 2Code </th>
                                        <th> المعرف الدولي ISO 3Code </th>
                                        <th> تاريخ الإنشاء </th>
                                        <th> تاريخ التعديل </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{ $record->name }} </td>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                src="{{ $record->getImageAttribute($record->flag) }} "
                                                style="height: 70px; width: 70px" alt="">
                                        </td>
                                        <td> {{ $record->phone_code }} </td>
                                        <td> {{ $record->iso_2code }} </td>
                                        <td> {{ $record->iso_3code }} </td>
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

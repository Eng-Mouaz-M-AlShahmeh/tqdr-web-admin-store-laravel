@extends('admin.dashboard.layouts.master')

@section('title', 'تفاصيل السجل التجاري')

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
                    <a href="{{ route('admin.cr.index') }}">السجلات التجارية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تفاصيل السجل التجاري</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">تفاصيل السجل التجاري
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
                                        <th> الاسم التجاري </th>
                                        <th> رقم السجل </th>
                                        <th> نوع السجل </th>
                                        <th> الرقم الموحد للمنشأة </th>
                                        <th> نوع المنشأة </th>
                                        <th> حالة السجل </th>
                                        <th> تاريخ الانتهاء </th>
                                        <th> الجهة المرخصة للنشاط </th>
                                        <th> النشاط </th>
                                        <th> حالة شهادة نطاقات </th>
                                        <th> حالة شهادة الزكاة </th>
                                        <th> حالة شهادة اشتراك الغرفة التجارية </th>
                                        <th> حالة شهادة رخصة البلدية </th>
                                        <th> تاريخ الإنشاء </th>
                                        <th> تاريخ التعديل </th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{ $record->commercial_name }} </td>
                                        <td> {{ $record->commercial_number }} </td>
                                        <td> {{ $record->commercial_type }} </td>
                                        <td> {{ $record->unified_number_of_facility }} </td>
                                        <td> {{ $record->facility_type }} </td>
                                        <td> {{ $record->cr_state }} </td>
                                        <td> {{ $record->expired_at }} </td>
                                        <td> {{ $record->authorized_entity_for_activity }} </td>
                                        <td> {{ $record->activity }} </td>
                                        <td> {{ $record->netaqat_cirtificate }} </td>
                                        <td> {{ $record->zaqat_certificate }} </td>
                                        <td> {{ $record->chamber_of_commerce_subscription }} </td>
                                        <td> {{ $record->municipal_license }} </td>
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

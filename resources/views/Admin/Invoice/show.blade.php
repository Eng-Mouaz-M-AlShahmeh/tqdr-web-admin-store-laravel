@extends('admin.dashboard.layouts.master')

@section('title', 'تفاصيل الإيصال')

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
                    <a href="{{ route('admin.invoice.index') }}">الإيصالات</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تفاصيل الإيصال</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">تفاصيل الإيصال
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
                                        <th> معرف الإيصال </th>
                                        <th> المبلغ </th>
                                        <th> المبلغ المتبقي </th>
                                        <th> حالة الدفع </th>
                                        <th> الحالة </th>
                                        <th> تاريخ الإنشاء </th>
                                        <th> تاريخ التعديل </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{ $record->id }} </td>
                                        <td> {{ $record->amount }} ريال</td>
                                        <td> {{ $record->remaining_amount }} ريال</td>
                                        <td>
                                            <div
                                                class="badge badge-pill {{ $record->is_paid == 1 ? 'badge-success' : 'badge-warning' }} p-3">
                                                {{ $record->is_paid == 1 ? 'تم الدفع' : 'لم يتم الدفع' }}
                                            </div>
                                        </td>
                                        <td>
                                            <div
                                                class="badge badge-pill {{ $record->status == 1 ? 'badge-success' : 'badge-danger' }} p-3">
                                                {{ $record->status == 1 ? 'فعال' : 'معطل' }}
                                            </div>
                                        </td>
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

        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption pull-right">
                            <h5> معلومات مزود الخدمة </h5>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> الصورة الشخصية </th>
                                        <th> الاسم </th>
                                        <th> رقم الجوال </th>
                                        <th> الايميل </th>
                                        <th> تسعيرة خدمة تقدر شاملة قيمة الضريبة المضافة </th>
                                        <th> نسبة الربح </th>
                                        <th> مبلغ الربح الثابت </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="img-responsive img-thumbnail" src="{!! $record->serviceProvider->getImageAttribute($record->serviceProvider->avatar) !!} "
                                                style="height: 70px; width: 70px" alt="">
                                        </td>
                                        <td> {!! $record->serviceProvider->first_name !!} {!! $record->serviceProvider->last_name !!} </td>
                                        <td> {!! $record->serviceProvider->phone !!} </td>
                                        <td> {!! $record->serviceProvider->email !!} </td>
                                        <td> {!! round($record->serviceProvider->tqdr_service_price + $record->serviceProvider->tqdr_service_price * ($record->serviceProvider->tqdr_service_vat_percentage / 100.0), 2) !!} ريال</td>
                                        <td> {!! $record->serviceProvider->profit_percentage !!} %</td>
                                        <td> {!! $record->serviceProvider->profit_fixed_amount !!} ريال</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="portlet light portlet-fit portlet-datatable bordered">
                    <div class="portlet-title">
                        <div class="caption pull-right">
                            <h5> باركود الإيصال </h5>
                        </div>
                    </div>
                    <div class="portlet-body">

                        <div class="card text-center">
                            {!! QrCode::size(200)->color(14, 48, 126)->encoding('UTF-8')->generate("المبلغ: '$record->amount' - رقم الإيصال: '$record->id'") !!}
                        </div>
                        {{-- backgroundColor(255,90,0) --}}
                        {{-- color(255, 0, 0); // Red QrCode
                             color(255, 0, 0, 25); //Red QrCode with 25% transparency  
                             eyeColor(0, 255, 255, 255, 0, 0, 0); // Changes the eye color of eye `0` --}}
                    </div>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>

        <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-12">
                <!-- Begin: life time stats -->
                <div class="card text-center">
                    <a href="{{ route('admin.invoice.pdf', $record->id) }}" type="button"
                        class="btn btn-info btn-outline"><i class="fa fa-print"></i> طباعة PDF</a>
                </div>
                <!-- End: life time stats -->
            </div>
        </div>

    </div>
@endsection

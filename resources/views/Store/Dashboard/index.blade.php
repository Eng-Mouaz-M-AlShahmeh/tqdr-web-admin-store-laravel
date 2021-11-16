@extends('store.dashboard.layouts.master')

@section('title', 'لوحة تحكم الشركاء (المتاجر)')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN THEME PANEL -->
        <!-- END THEME PANEL -->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb">
                <li>
                    <a href="{{ route('store.dashboard.index') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>لوحة التحكم</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> لوحة التحكم
            <small>لوحة التحكم والاحصاءات</small>
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->
        <!-- BEGIN DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pull-right">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="#">
                    <div class="visual">
                        <i class="fa fa-file"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ \App\Models\InvoiceOrder::where('store_id', Auth::guard('store')->user()->id)->count() }}">{{ \App\Models\InvoiceOrder::where('store_id', Auth::guard('store')->user()->id)->count() }}</span>
                            {{-- <span data-counter="counterup" data-value="{{ \Modules\Resturant\Entities\Resturant::all()->count() }}">{{ \Modules\Resturant\Entities\Resturant::all()->count() }}</span> --}}
                        </div>
                        <div class="desc"> طلبات الدفع </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12 pull-right">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="#">
                    <div class="visual">
                        <i class="fa fa-money"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup" data-value="{{ \App\Models\InvoiceOrder::where('store_id', Auth::guard('store')->user()->id)->sum('amount') }}">{{ \App\Models\InvoiceOrder::where('store_id', Auth::guard('store')->user()->id)->sum('amount') }} </span> ريال
                            {{-- <span data-counter="counterup" data-value="{{ \Modules\Trainer\Entities\Trainer::all()->count() }}">{{ \Modules\Trainer\Entities\Trainer::all()->count() }}</span>  --}}
                        </div>
                        <div class="desc"> إجمالي المبالغ المدفوعة </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md pull-right">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">آخر 5 طلبات دفع </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th class="text-center"> رقم جوال العميل </th>
                                        <th class="text-center"> رقم الإيصال </th>
                                        <th class="text-center"> رقم طلب الدفع </th>
                                        <th class="text-center"> المبلغ المدفوع </th>
                                        <th class="text-center"> تاريخ الطلب </th>
                                    </tr>
                                </thead>

                                @foreach (\App\Models\InvoiceOrder::where('store_id', Auth::guard('store')->user()->id)->orderBy('id', 'desc')->take(5)->get()
                                as $invoiceorder)
                                                            <tr>
                                                                {{-- <td class="fit">
                                                                    <img class="img-responsive" style="width: 50px; height: 50px;"
                                                                        src="{{ $serviceP->getImageAttribute($serviceP->avatar) }}">
                                                                </td> --}}
                                                                {{-- <td>
                                                                    <a href="{{ route('admin.serviceprovider.show', $serviceP->id) }}"
                                                                        class="primary-link">{{ $serviceP->username }}</a>
                                                                </td> --}}
                                                                <td class="text-center"> {{ $invoiceorder->customer_phone }} </td>
                                                                <td class="text-center"> {{ $invoiceorder->invoice_id }} </td>
                                                                <td class="text-center"> {{ $invoiceorder->id  }} </td>
                                                                <td class="text-center"> {{ $invoiceorder->amount  }} ريال</td>
                                                                {{-- <td>
                                                                    @if ($serviceP->status == 1)
                                                                        <i style="color: green;" class="icon-check"></i>
                                                                    @else
                                                                        <i style="color: red;" class="icon-close"></i>
                                                                    @endif
                                                                </td> --}}
                                                                <td class="text-center"> {{ $invoiceorder->created_at }} </td>
                                                            </tr>
                                                        @endforeach

                            </table>
                        </div>
                    </div>
                </div>
            </div>
             {{--<div class="col-md-6 col-sm-6">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">آخر 5 إيصالات</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> المعرف </th>
                                        <th> المبلغ </th>
                                        <th> المبلغ المتبقي </th>
                                        <th> العميل </th>
                                        <th> مزود الخدمة </th>
                                        <th> المتجر </th>
                                        <th> الحالة </th>
                                        <th> تاريخ الانشاء </th>
                                    </tr>
                                </thead>

                            </table>
                        </div>
                    </div>
                </div> 
            </div>--}}
        </div>
    </div>
@endsection
@section('myjsfile')
@stop

@extends('admin.dashboard.layouts.master')

@section('title', 'لوحة تحكم المشرف')

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
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 blue" href="{{ route('admin.customer.index') }}">
                    <div class="visual">
                        <i class="fa fa-comments"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                data-value="{{ \App\Models\Customer::all()->count() }}">{{ \App\Models\Customer::all()->count() }}</span>
                        </div>
                        <div class="desc"> العملاء </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 red" href="{{ route('admin.serviceprovider.index') }}">
                    <div class="visual">
                        <i class="fa fa-bar-chart-o"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                data-value="{{ \App\Models\ServiceProvider::all()->count() }}">{{ \App\Models\ServiceProvider::all()->count() }}</span>
                        </div>
                        <div class="desc"> مزودي الخدمة </div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 green" href="{{ route('admin.store.index') }}">
                    <div class="visual">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="details">
                        <div class="number">
                            <span data-counter="counterup"
                                data-value="{{ \App\Models\Store::all()->count() }}">{{ \App\Models\Store::all()->count() }}</span>
                        </div>
                        <div class="desc"> الشركاء (المتاجر)</div>
                    </div>
                </a>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <a class="dashboard-stat dashboard-stat-v2 purple" href="{{ route('admin.invoice.index') }}">
                    <div class="visual">
                        <i class="fa fa-globe"></i>
                    </div>
                    <div class="details">
                        <div class="number">

                            <span data-counter="counterup"
                                data-value="{{ \App\Models\Invoice::all()->count() }}">{{ \App\Models\Invoice::all()->count() }}</span>
                        </div>
                        <div class="desc"> الإيصالات </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="clearfix"></div>
        <!-- END DASHBOARD STATS 1-->
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md pull-right">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">آخر 5 مزودي خدمة</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> الصورة الشخصية </th>
                                        <th> الاسم </th>
                                        <th> رقم الجوال </th>
                                        <th> نسبة الربح </th>
                                        <th> الحالة </th>
                                        <th> تاريخ الانشاء </th>
                                    </tr>
                                </thead>
                                @foreach (\App\Models\ServiceProvider::orderBy('id', 'desc')->take(5)->get()
        as $serviceP)
                                    <tr>
                                        <td class="fit">
                                            <img class="img-responsive" style="width: 50px; hieght: 50px;"
                                                src="{{ $serviceP->getImageAttribute($serviceP->avatar) }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.serviceprovider.show', $serviceP->id) }}"
                                                class="primary-link">{{ $serviceP->username }}</a>
                                        </td>
                                        <td> {{ $serviceP->phone }} </td>
                                        <td> {{ $serviceP->profit_percentage }} </td>
                                        <td>
                                            @if ($serviceP->status == 1)
                                                <i style="color: green;" class="icon-check"></i>
                                            @else
                                                <i style="color: red;" class="icon-close"></i>
                                            @endif
                                        </td>
                                        <td> {{ $serviceP->created_at }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md pull-right">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">آخر 5 شركاء (متاجر)</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> الشعار </th>
                                        <th> الاسم </th>
                                        <th> رقم السجل التجاري </th>
                                        <th> رقم الجوال </th>
                                        <th> الايميل </th>
                                        <th> الحالة </th>
                                        <th> تاريخ الانشاء </th>
                                    </tr>
                                </thead>
                                @foreach (\App\Models\Store::orderBy('id', 'desc')->take(5)->get()
        as $store)
                                    <tr>
                                        <td class="fit">
                                            <img class="img-responsive" style="width: 50px; hieght: 50px;"
                                                src="{{ $store->logo }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.store.show', $store->id) }}"
                                                class="primary-link">{{ $store->username }}</a>
                                        </td>
                                        <td> {{ $store->cr->commercial_number }} </td>
                                        <td> {{ $store->phone }} </td>
                                        <td> {{ $store->email }} </td>
                                        <td>
                                            @if ($store->status == 1)
                                                <i style="color: green;" class="icon-check"></i>
                                            @else
                                                <i style="color: red;" class="icon-close"></i>
                                            @endif
                                        </td>
                                        <td> {{ $store->created_at }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md pull-right">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">آخر 5 عملاء </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable table-scrollable-borderless">
                            <table class="table table-hover table-light">
                                <thead>
                                    <tr class="uppercase">
                                        <th> الصورة الشخصية </th>
                                        <th> الاسم </th>
                                        <th> رقم الجوال </th>
                                        <th> الايميل </th>
                                        <th> تاريخ الالتحاق </th>
                                    </tr>
                                </thead>
                                @foreach (\App\Models\Customer::orderBy('id', 'desc')->take(5)->get()
        as $customer)
                                    <tr>
                                        <td class="fit">
                                            <img class="img-responsive" style="width: 50px; hieght: 50px;"
                                                src="{{ $customer->getImageAttribute($customer->avatar) }}">
                                        </td>
                                        <td>
                                            <a href="{{ route('admin.customer.show', $customer->id) }}"
                                                class="primary-link">{{ $customer->username }}</a>
                                        </td>
                                        <td> {{ $customer->phone }} </td>
                                        <td> {{ $customer->email }} </td>
                                        <td> {{ $customer->created_at }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-sm-6">
                <div class="portlet light ">
                    <div class="portlet-title">
                        <div class="caption caption-md pull-right">
                            <i class="icon-bar-chart font-dark hide"></i>
                            <span class="caption-subject font-dark bold uppercase">آخر 5 طلبات إيصالات</span>
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
                                        <th> رقم جوال العميل </th>
                                        <th> مزود الخدمة </th>
                                        <th> المتجر </th>
                                        <th> تاريخ الانشاء </th>
                                    </tr>
                                </thead>
                                @foreach (\App\Models\InvoiceOrder::orderBy('id', 'desc')->take(5)->get()
        as $invoiceorder)
                                    <tr>
                                        <td>
                                            <a href="{{ route('admin.invoice.show', $invoiceorder->invoice->id) }}"
                                                class="primary-link">{{ $invoiceorder->invoice->id }}</a>
                                        </td>
                                        <td> {{ $invoiceorder->invoice->amount }} ريال </td>
                                        <td> {{ $invoiceorder->invoice->remaining_amount }} ريال </td>
                                        <td> {{ $invoiceorder->customer_phone }} </td>
                                        <td> {{ $invoiceorder->invoice->serviceProvider->first_name }}
                                            {{ $invoiceorder->invoice->serviceProvider->last_name }} </td>
                                        <td> {{ $invoiceorder->store->store_name }} </td>
                                        <td> {{ $invoiceorder->created_at }} </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('myjsfile')
@stop

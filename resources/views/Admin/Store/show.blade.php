@extends('admin.dashboard.layouts.master')

@section('title', 'تفاصيل الشريك (المتجر)')

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
                    <a href="{{ route('admin.store.index') }}">الشركاء (المتاجر)</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تفاصيل الشريك (المتجر)</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">تفاصيل الشريك (المتجر)
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
                                        <th> الشعار </th>
                                        <th> الغلاف </th>
                                        <th> اسم المستخدم </th>
                                        <th> اسم المتجر </th>
                                        <th> موقع الويب </th>
                                        <th> رقم الجوال </th>
                                        <th> الايميل </th>
                                        <th> الوصف </th>
                                        <th> تاريخ الإنشاء </th>
                                        <th> تاريخ التعديل </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img class="img-responsive img-thumbnail" src="{{ $record->logo }}"
                                                style="height: 70px; width: 70px" alt="">
                                        </td>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                src="{{ $record->getCoverAttribute($record->cover_image) }}"
                                                style="height: 70px; width: 70px" alt="">
                                        </td>
                                        <td> {{ $record->username }} </td>
                                        <td> {{ $record->store_name }} </td>
                                        <td> {{ $record->web_url }} </td>
                                        <td> {{ $record->phone }} </td>
                                        <td> {{ $record->email }} </td>
                                        <td> {{ $record->description }} </td>
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
                            <h5> معلومات البنك </h5>
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

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {!! $record->bank->name !!} </td>
                                        <td> {!! $record->bank->customer_name !!} </td>
                                        <td> {!! $record->bank->customer_number !!} </td>
                                        <td> {!! $record->bank->address !!} </td>
                                        <td> {!! $record->bank->current_account_number !!} </td>
                                        <td> {!! $record->bank->iban !!} </td>
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
                            <h5> معلومات وسائل التواصل الاجتماعي </h5>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> فيسبوك </th>
                                        <th> تويتر </th>
                                        <th> انستاغرام </th>
                                        <th> لينكيدإن </th>
                                        <th> يوتيوب </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {!! $record->socialLinks->facebook !!} </td>
                                        <td> {!! $record->socialLinks->twitter !!} </td>
                                        <td> {!! $record->socialLinks->instagram !!} </td>
                                        <td> {!! $record->socialLinks->linkedin !!} </td>
                                        <td> {!! $record->socialLinks->youtube !!} </td>
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
                            <h5> معلومات السجل التجاري </h5>
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
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {!! $record->cr->commercial_name !!} </td>
                                        <td> {!! $record->cr->commercial_number !!} </td>
                                        <td> {!! $record->cr->commercial_type !!} </td>
                                        <td> {!! $record->cr->unified_number_of_facility !!} </td>
                                        <td> {!! $record->cr->facility_type !!} </td>
                                        <td> {!! $record->cr->cr_state !!} </td>
                                        <td> {!! $record->cr->expired_at !!} </td>
                                        <td> {!! $record->cr->authorized_entity_for_activity !!} </td>
                                        <td> {!! $record->cr->activity !!} </td>
                                        <td> {!! $record->cr->netaqat_cirtificate !!} </td>
                                        <td> {!! $record->cr->zaqat_certificate !!} </td>
                                        <td> {!! $record->cr->chamber_of_commerce_subscription !!} </td>
                                        <td> {!! $record->cr->municipal_license !!} </td>
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
                            <h5> معلومات الوثيقة الشخصية </h5>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> الرقم الوطني </th>
                                        <th> الصورة الأمامية </th>
                                        <th> الصورة الخلفية </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> {{ $record->national->national_number }} </td>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                src="{{ $record->national->front_image }} "
                                                style="height: 70px; width: 70px" alt="">
                                        </td>
                                        <td>
                                            <img class="img-responsive img-thumbnail"
                                                src="{{ $record->national->back_image }} "
                                                style="height: 70px; width: 70px" alt="">
                                        </td>
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
                            <h5> معلومات العناوين </h5>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-container">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th> رقم المبنى </th>
                                        <th> اسم الشارع </th>
                                        <th> الرمز البريدي </th>
                                        <th> خط الطول </th>
                                        <th> خط العرض </th>
                                        <th> الزوم </th>
                                        <th> البلد </th>
                                        <th> المدينة </th>
                                        <th> الحي </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($record->address as $addr)
                                        <tr>
                                            <td> {!! $addr->building_number !!} </td>
                                            <td> {!! $addr->street_name !!} </td>
                                            <td> {!! $addr->postal_code !!} </td>
                                            <td> {!! $addr->longitude !!} </td>
                                            <td> {!! $addr->latitude !!} </td>
                                            <td> {!! $addr->zoom !!} </td>
                                            <td> {!! $addr->country->name !!} </td>
                                            <td> {!! $addr->city->name !!} </td>
                                            <td> {!! $addr->nighborhood->name !!} </td>
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

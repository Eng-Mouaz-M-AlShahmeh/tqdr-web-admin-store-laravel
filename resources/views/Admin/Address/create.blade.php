@extends('admin.dashboard.layouts.master')

@section('title', 'إنشاء عنوان')

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
                    <a href="{{ route('admin.address.index') }}">العناوين</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>إضافة عنوان</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">نموذج إضافة عنوان
        </h1>
        <!-- END PAGE TITLE-->
        <!-- END PAGE HEADER-->

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN VALIDATION STATES-->
                <div class="portlet light portlet-fit portlet-form bordered">
                    <div class="portlet-title">
                        <div class="caption pull-right">
                            <i class="icon-settings font-red"></i>
                            <span class="caption-subject font-red sbold uppercase">المعلومات الأساسية</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form id="form_sample_1" class="form-horizontal" action="{{ route('admin.address.store') }}"
                            method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <div class="alert alert-danger display-hide">
                                    <button class="close" data-close="alert"></button> You have some form errors.
                                    Please check below.
                                </div>
                                <div class="alert alert-success display-hide">
                                    <button class="close" data-close="alert"></button> Your form validation is
                                    successful!
                                </div>



                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" name="building_number" data-required="1"
                                            class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        رقم المبنى
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" name="street_name" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        اسم الشارع
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" name="postal_code" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الرمز البريدي
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" name="longitude" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        خط الطول
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" name="latitude" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        خط العرض
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" name="zoom" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        زوم
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>


                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="country_id" id="country_id">
                                            @foreach ($countries as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        البلد <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="city_id" id="city_id">
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        المدينة <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="nighborhood_id" id="nighborhood_id">
                                            @foreach ($nighborhoods as $nighborhood)
                                                <option value="{{ $nighborhood->id }}">{{ $nighborhood->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        الحي <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="store_id" id="store_id">
                                            @foreach ($stores as $store)
                                                <option value="{{ $store->id }}">{{ $store->store_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        المتجر <span class="required"> * </span>
                                    </label>

                                </div>



                                <div class="form-actions text-center">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">حفظ</button>
                                            <a href="{{ route('admin.address.index') }}" type="button"
                                                class="btn grey-salsa btn-outline">إلغاء</a>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </form>
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END VALIDATION STATES-->
            </div>
        </div>


    </div>
@endsection

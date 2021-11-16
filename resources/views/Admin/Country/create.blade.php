@extends('admin.dashboard.layouts.master')

@section('title', 'إنشاء بلد')

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
                    <span>إضافة بلد</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">نموذج إضافة بلد
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
                        <form id="form_sample_1" class="form-horizontal" action="{{ route('admin.country.store') }}"
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
                                        <input type="text" name="name" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الاسم <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" name="phone_code" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الرقم الدولي <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" name="iso_2code" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        المعرف الدولي ISO 2Code <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" name="iso_3code" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        المعرف الدولي ISO 3Code <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" name="flag" id="exampleInputFile1">
                                    </div>

                                    <label class="control-label col-md-3">صورة العلم
                                    </label>

                                </div>

                                <div class="form-actions text-center">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">حفظ</button>
                                            <a href="{{ route('admin.country.index') }}" type="button"
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

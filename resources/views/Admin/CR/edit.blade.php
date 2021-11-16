@extends('admin.dashboard.layouts.master')

@section('title', 'تعديل سجل تجاري')

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
                    <span>تعديل سجل تجاري</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">نموذج تعديل سجل تجاري
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
                        <form id="form_sample_1" class="form-horizontal"
                            action="{{ route('admin.cr.update', [$recordtoedit->id]) }}" method="post"
                            enctype="multipart/form-data">
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
                                        <input type="text" value="{{ $recordtoedit->commercial_name }}"
                                            name="commercial_name" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الاسم التجاري
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" value="{{ $recordtoedit->commercial_number }}"
                                            name="commercial_number" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        رقم السجل
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->commercial_type }}"
                                            name="commercial_type" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        نوع السجل
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" value="{{ $recordtoedit->unified_number_of_facility }}"
                                            name="unified_number_of_facility" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الرقم الموحد للمنشأة
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->facility_type }}" name="facility_type"
                                            data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        نوع المنشأة
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->cr_state }}" name="cr_state"
                                            data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        حالة السجل
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->authorized_entity_for_activity }}"
                                            name="authorized_entity_for_activity" data-required="1"
                                            class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الجهة المرخصة للنشاط
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->activity }}" name="activity"
                                            data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        النشاط
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->netaqat_cirtificate }}"
                                            name="netaqat_cirtificate" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        حالة شهادة نطاقات
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->zaqat_certificate }}"
                                            name="zaqat_certificate" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        حالة شهادة الزكاة
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->chamber_of_commerce_subscription }}"
                                            name="chamber_of_commerce_subscription" data-required="1"
                                            class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        حالة شهادة اشتراك الغرفة التجارية
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->municipal_license }}"
                                            name="municipal_license" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        حالة شهادة رخصة البلدية
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="date" value="{{ $recordtoedit->expired_at }}" name="expired_at"
                                            data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        تاريخ الإنتهاء
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-actions text-center">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">تعديل</button>
                                            <a href="{{ route('admin.cr.index') }}" type="button"
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

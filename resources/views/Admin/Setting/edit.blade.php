@extends('admin.dashboard.layouts.master')

@section('title', 'تهيئة الإعدادات')

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
                    <span>تهيئة الإعدادات</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">نموذج نهيئة الإعدادات
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
                            <span class="caption-subject font-red sbold uppercase">معلومات موقع تقدر</span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form id="form_sample_1" class="form-horizontal"
                            action="{{ route('admin.setting.update', [$recordtoedit->id]) }}" method="post"
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
                                        <img class="img-responsive img-thumbnail"
                                            src="{{ $recordtoedit->getImageAttribute($recordtoedit->tqdr_logo) }}"
                                            style="height: 100px; width: 100px" alt="">
                                    </div>
                                    <label class="control-label col-md-3"> شعار الموقع
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" name="tqdr_logo" id="exampleInputFile1">
                                    </div>
                                    <label class="control-label col-md-3">رفع صورة
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->title }}" name="title"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        العنوان
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->main_dsc }}" name="main_dsc"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        الكلمة التعريفية
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="number" value="{{ $recordtoedit->admin_phone }}" name="admin_phone"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        رقم الجوال للموقع
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="email" value="{{ $recordtoedit->admin_email }}" name="admin_email"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        ايميل للموقع
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->admin_periods }}" name="admin_periods"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        مواعيد العمل
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->admin_copyright }}"
                                            name="admin_copyright" data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        حقوق النشر
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->admin_twitter }}" name="admin_twitter"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        حساب تويتر
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->admin_facebook }}"
                                            name="admin_facebook" data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        حساب فيسبوك
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->admin_google_plus }}"
                                            name="admin_google_plus" data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        حساب جوجل بلس
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <textarea type="text" value="{{ $recordtoedit->about }}" name="about"
                                            data-required="1"
                                            class="form-control">{{ $recordtoedit->about }}</textarea>
                                    </div>
                                    <label class="control-label col-md-3">
                                        من نحن
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <textarea type="text" value="{{ $recordtoedit->privacy }}" name="privacy"
                                            data-required="1"
                                            class="form-control">{{ $recordtoedit->privacy }}</textarea>
                                    </div>
                                    <label class="control-label col-md-3">
                                        سياسة الخصوصية
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <textarea type="text" value="{{ $recordtoedit->terms }}" name="terms"
                                            data-required="1"
                                            class="form-control">{{ $recordtoedit->terms }}</textarea>
                                    </div>
                                    <label class="control-label col-md-3">
                                        شروط الاستخدام
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <br /><br /><br /><br /><br /><br />

                                <div class="portlet-title">
                                    <div class="caption pull-right">
                                        <i class="icon-settings font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">معلومات السيرفر</span>
                                    </div>
                                </div>

                                <br /><br /><br /><br /><br /><br />

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="email" value="{{ $recordtoedit->header_email }}" name="header_email"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        ايميل الإرسال
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->smtp_host }}" name="smtp_host"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        SMTP Host
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->smtp_port }}" name="smtp_port"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        SMTP Port
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->email_encription }}"
                                            name="email_encription" data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        تشفير الايميل
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->smtp_user }}" name="smtp_user"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        مستخدم SMTP
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->smtp_pass }}" name="smtp_pass"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        الرمز السري لـ SMTP
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->api_key }}" name="api_key"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        مفتاح الـ API
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-actions text-center">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">تهيئة الإعدادات</button>
                                            <a href="{{ route('admin.dashboard.index') }}" type="button"
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

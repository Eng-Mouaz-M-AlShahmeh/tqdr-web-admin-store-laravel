@extends('store.dashboard.layouts.master')

@section('title', 'تهيئة الحساب')

@section('content')
    <div class="page-content">
        <!-- BEGIN PAGE HEADER-->
        <!-- BEGIN PAGE BAR -->
        <div class="page-bar">
            <ul class="page-breadcrumb pull-right">
                <li>
                    <a href="{{ route('store.dashboard.index') }}">الرئيسية</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تهيئة الحساب</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title"> نموذج تهيئة الحساب
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
                            <span class="caption-subject font-red sbold uppercase"> المعلومات الأساسية </span>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <!-- BEGIN FORM-->
                        <form id="form_sample_1" class="form-horizontal"
                            action="{{ route('store.dashboard.profile.update') }}" method="post"
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
                                        <input type="text" value="{{ Auth::user()->username }}" name="username"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        اسم المستخدم
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="email" value="{{ Auth::user()->email }}" name="email"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        الايميل
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                    {{-- value="{{ Auth::user()->password }}" --}}
                                        <input type="password" name="password"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        كلمة المرور
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                {{-- 
                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <img class="img-responsive img-thumbnail"
                                            src="{{ Auth::user()->getImageAttribute(Auth::user()->avatar) }}"
                                            style="height: 100px; width: 100px" alt="">
                                    </div>
                                    <label class="control-label col-md-3"> الشعار
                                    </label>
                                </div> --}}

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ Auth::user()->store_name }}" name="store_name"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        اسم الشريك (المتجر)
                                        <span class="required"> * </span>
                                    </label>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <img class="img-responsive img-thumbnail"
                                            src="{{ Auth::user()->logo }}"
                                            style="height: 100px; width: 100px" alt="">
                                    </div>
                                    <label class="control-label col-md-3"> الشعار
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" name="logo" id="exampleInputFile1">
                                    </div>
                                    <label class="control-label col-md-3">
                                    </label>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <img class="img-responsive img-thumbnail"
                                            src="{{ Auth::user()->getCoverAttribute(Auth::user()->cover_image) }}"
                                            style="height: 100px; width: 100px" alt="">
                                    </div>
                                    <label class="control-label col-md-3"> صورة الغلاف
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" name="cover_image" id="exampleInputFile1">
                                    </div>
                                    <label class="control-label col-md-3">
                                    </label>
                                </div>



                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="text" value="{{ Auth::user()->web_url }}" name="web_url"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        الموقع الالكتروني
                                        <span class="required"> * </span>
                                    </label>
                                </div>


                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <input type="number" value="{{ Auth::user()->phone }}" name="phone"
                                            data-required="1" class="form-control" />
                                    </div>
                                    <label class="control-label col-md-3">
                                        رقم الجوال
                                        <span class="required"> * </span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <textarea type="number" name="description"
                                            data-required="1" class="form-control" >{{ Auth::user()->description }}</textarea>
                                    </div>
                                    <label class="control-label col-md-3">
                                        الوصف
                                        {{-- <span class="required"> * </span> --}}
                                    </label>
                                </div>


                                <div class="form-actions text-center">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">تهيئة الحساب</button>
                                            <a href="{{ route('store.dashboard.index') }}" type="button"
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

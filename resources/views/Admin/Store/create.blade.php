@extends('admin.dashboard.layouts.master')

@section('title', 'إنشاء شريك (متجر)')

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
                    <span>إضافة شريك (متجر)</span>
                </li>
            </ul>
        </div>
        <!-- END PAGE BAR -->
        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">نموذج إضافة شريك (متجر)
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
                        <form id="form_sample_1" class="form-horizontal" action="{{ route('admin.store.store') }}"
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
                                        <input type="text" name="username" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        اسم المستخدم
                                        <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="password" name="password" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        كلمة المرور
                                        <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" name="phone" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        رقم الجوال
                                        <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="email" name="email" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الايميل
                                        <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" name="logo" id="exampleInputFile1">
                                    </div>

                                    <label class="control-label col-md-3">الشعار
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="file" accept="image/*" name="cover_image" id="exampleInputFile1">
                                    </div>

                                    <label class="control-label col-md-3">صورة الغلاف
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" name="store_name" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        اسم المتجر
                                        <span class="required"> * </span>
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" name="web_url" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        موقع الويب
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <textarea type="text" name="description" data-required="1"
                                            class="form-control"></textarea>
                                    </div>

                                    <label class="control-label col-md-3">
                                        الوصف
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="bank_id" id="bank_id">
                                            <option value="">اختر بنك</option>
                                            @foreach ($banks as $bank)
                                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        البنك
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="social_links_id" id="social_links_id">
                                            <option value="">اختر وسائل التواصل الاجتماعي</option>
                                            @foreach ($socialLinks as $socialLink)
                                                <option value="{{ $socialLink->id }}">Facebook:
                                                    ({{ $socialLink->facebook }}) - Twitter: ({{ $socialLink->twitter }}) -
                                                    Instagram: ({{ $socialLink->instagram }}) - Linkedin:
                                                    ({{ $socialLink->linkedin }}) - Youtube: ({{ $socialLink->youtube }})
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        وسائل التواصل الاجتماعي
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="cr_id" id="cr_id">
                                            <option value="">اختر سجل تجاري</option>
                                            @foreach ($crs as $cr)
                                                <option value="{{ $cr->id }}">{{ $cr->commercial_number }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        السجل التجاري
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">

                                        <select class="form-control" name="national_id" id="national_id">
                                            <option value="">اختر وثيقة شخصية</option>
                                            @foreach ($nationals as $national)
                                                <option value="{{ $national->id }}">{{ $national->national_number }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <label class="control-label col-md-3">
                                        الوثيقة الشخصية
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4"></div>

                                    <label class="control-label col-md-3">
                                        <span class="required"> ملاحظة: يمكن إضافة العناوين للشريك (المتجر) من قسم
                                            العناوين </span>
                                    </label>

                                </div>

                                <div class="form-actions text-center">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">حفظ</button>
                                            <a href="{{ route('admin.store.index') }}" type="button"
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

@extends('admin.dashboard.layouts.master')

@section('title', 'تعديل البنك')

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
                    <a href="{{ route('admin.bank.index') }}">البنوك</a>
                    <i class="fa fa-circle"></i>
                </li>
                <li>
                    <span>تعديل البنك</span>
                </li>
            </ul>

        </div>
        <!-- END PAGE BAR -->

        <!-- BEGIN PAGE TITLE-->
        <h1 class="page-title">نموذج تعديل البنك
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
                            action="{{ route('admin.bank.update', [$recordtoedit->id]) }}" method="post"
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
                                        <input type="text" value="{{ $recordtoedit->name }}" name="name" data-required="1"
                                            class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        اسم البنك
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->customer_name }}" name="customer_name"
                                            data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        اسم العميل
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" value="{{ $recordtoedit->customer_number }}"
                                            name="customer_number" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        رقم العميل
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->address }}" name="address"
                                            data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        العنوان
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="number" value="{{ $recordtoedit->current_account_number }}"
                                            name="current_account_number" data-required="1" class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        رقم الحساب الحالي
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-group">

                                    <div class="col-md-4"></div>

                                    <div class="col-md-4">
                                        <input type="text" value="{{ $recordtoedit->iban }}" name="iban" data-required="1"
                                            class="form-control" />
                                    </div>

                                    <label class="control-label col-md-3">
                                        الأيبان
                                        {{-- <span class="required"> * </span> --}}
                                    </label>

                                </div>

                                <div class="form-actions text-center">
                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-9">
                                            <button type="submit" class="btn green">تعديل</button>
                                            <a href="{{ route('admin.bank.index') }}" type="button"
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

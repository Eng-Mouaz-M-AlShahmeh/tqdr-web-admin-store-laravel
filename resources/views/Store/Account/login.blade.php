{{-- @extends('store.layouts.master')
@section('content')
        <!-- BEGIN LOGIN FORM -->
        <form class="login-form" action="{{route('front.store.checkLogin')}}" method="post">
            @csrf
            <h3 class="form-title font-green">تسجيل الدخول</h3>
            <div class="alert alert-danger display-hide">
                <button class="close" data-close="alert"></button>
                <span> أدخل اسم المستخدم وكلمة المرور </span>
            </div>
            <div class="form-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">اسم المستخدم</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="اسم المستخدم" name="username" /> </div>
            <div class="form-group">
                <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
                <input class="form-control form-control-solid placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور" name="password" /> </div>
            <div class="form-actions" style="text-align: center;">
                <button type="submit" class="btn green uppercase">تسجيل الدخول</button>
            </div>
        </form>
        <!-- END LOGIN FORM -->
@endsection --}}
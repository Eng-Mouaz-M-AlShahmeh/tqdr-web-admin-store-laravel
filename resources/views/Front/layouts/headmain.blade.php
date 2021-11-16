<!-- header area start -->
<header class="header-area" style="
  background-image: url('site/assets/img/icon/hero.jpg'); 
  background-color: #0e307e;
  /* height: 100vh;  */
  background-position: center; 
  background-repeat: no-repeat; 
  background-size: cover; 
">
    <div style="padding: 30px;" class="container">
        <div class="row justify-content-between">
            <div class="col-md-3 col-lg-3 col-sm-12">
                <span class="text-center"><a style="color: white; margin-top: 15px; font-size: 10px"
                        href="{{ route('front.admin.login') }}">تسجيل الدخول</a></span>
                {{-- <span class="text-center"><a style="color: white; margin-top: 15px; font-size: 10px" href="{{route('front.store.login')}}">دخول الشركاء (المتاجر)</a></span> --}}
            </div>
            <div class="col-md-9 col-lg-9 col-sm-12">
                <h2 style="color: white; font-size: 20px">سعر الخدمة 10 ريال فقط</h2>
            </div>
            {{-- <div class="col-md-3 col-lg-3 col-sm-12">
                </div>
                <div class="col-md-3 col-lg-3 col-sm-12">
                </div> --}}
            {{-- <div class="col-md-4 col-lg-4 col-sm-12" style="margin-top: 50px;">
                </div> --}}
            {{-- <div class="col-md-4 col-lg-4 col-sm-12" style="margin-top: 50px;">
                </div> --}}
            <div class="col-md-12 col-lg-12 col-sm-12">
                <div class="row justify-content-between">
                    <div class="col-md-3 col-lg-3 col-sm-12" style="margin-top: 50px;">
                        <h2 style="color: white;">اتصل بنا</h2>
                        <p style="margin-top: 20px;"><a style="color: white; font-size: 20px;"
                                href="tel:{{ str_replace('966', '05', \App\Models\Setting::where('id', 1)->first()->admin_phone) }}">{{ str_replace('966', '05', \App\Models\Setting::where('id', 1)->first()->admin_phone) }}</a>
                        </p>
                    </div>
                    <div class="col-md-9 col-lg-9 col-sm-12" style="margin-top: 50px;">
                        <a href="{{ route('front.index') }}"><img style="height: 100px; "
                                src="{{ asset('site/assets/img/icon/logo.png') }}" alt=""></a>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12">
                <h2 class="text-center" style="color: white; margin-top: 50px; font-size: 20px">تسوق من أشهر المواقع
                    وأدفع كاش فى ثلاث خطوات</h2>
            </div>
            {{ Form::open(['route' => ['front.pay'], 'method' => 'post', 'files' => true]) }}
            @csrf
            <div class="col-md-3 col-lg-3 col-sm-12">
                <h2 class="text-center"
                    style="color: white; margin-top: 100px; margin-bottom: 20px; font-size: 15px">رقم الجوال</h2>
                {{ Form::text('phone', '', ['placeholder' => '05xxxxxxxx', 'class' => 'form-control']) }}
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <h2 class="text-center"
                    style="color: white; margin-top: 100px; margin-bottom: 20px; font-size: 15px">لمن ستدفع</h2>
                {{ Form::select(
                    'store',
                    \App\Models\Store::where('status', '1')->get()->map(function ($item) {
                            return [$item->id => $item->store_name];
                        }),
                    // [
                    //    '' => 'اختر المتجر',
                    //    '1' => 'أمازون السعودية'
                    // ],
                    null,
                    ['class' => 'form-control'],
                ) }}
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <h2 class="text-center"
                    style="color: white; margin-top: 100px; margin-bottom: 20px; font-size: 15px">المبلغ</h2>
                {{ Form::text('amount', '', ['placeholder' => 'أدخل القيمة', 'class' => 'form-control']) }}
            </div>
            <div class="col-md-3 col-lg-3 col-sm-12">
                <h2 class="text-center"
                    style="color: white; margin-top: 100px; margin-bottom: 20px; font-size: 15px">رقم الطلب</h2>
                {{ Form::text('order_number', '', ['placeholder' => '000-0000', 'class' => 'form-control']) }}
            </div>
            <div style="margin-top: 100px; margin-bottom: 50px;" class="col-md-12 col-lg-12 col-sm-12">
                <div class="text-center">{{ Form::submit('إرسال', ['class' => 'p-5 btn btn-warning']) }}</div>
            </div>
            @if (Session::has('errorpay'))
                <div style="margin-top: 10px; margin-bottom: 10px;" class="col-md-12 col-lg-12 col-sm-12">
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('errorpay') }}
                    </div>
                </div>
            @else
            @endif
            {{ Form::close() }}
        </div>
    </div>
</header>
<!-- header area end -->

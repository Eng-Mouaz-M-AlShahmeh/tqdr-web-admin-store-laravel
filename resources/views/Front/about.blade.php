@extends('front.layouts.master')

@section('title', 'من نحن')

@section('header')
    @include('front.layouts.head')
@endsection

@section('content')

    <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
        <div style="background: #f5f5f5; padding: 25px;" class="container">
            <h2 style="color: black;">من نحن</h2>
            <p style="color: black; margin-top: 15px;"> {{ \App\Models\Setting::where('id', 1)->first()->about }} </p>
            {{-- <p style="color: black; margin-top: 15px;">تقدر هي أول منصة رقمية سعودية تعود ملكيتها لمؤسسة تقدر للوساطة التجارية (سجل تجاري رقم 10108581937) متخصصة في توفير خدمة الدفع الكاش لجميع مشترياتك الرقمية عن طريق ربط الزبائن بالمتاجر والتطبيقات عبر شبكة مزودو خدمة تقدر المنتشرين في الرياض حالياً وجميع مناطق المملكة العربية السعودية قريباً.</p>
                <p style="color: black; margin-top: 15px;">رسالتنا ربط الناس بالمتاجر والتطبيقات من خلال تقديم حلول دفع مبدعة ذكية سهلة وآمنة بكل احترافية وحب.</p>
                <p style="color: black; margin-top: 15px;">رؤيتنا أن نكون خيار الدفع كاش الأول للمدفوعات الرقمية في المملكة العربية السعودية.</p> --}}
        </div>
    </div>
@endsection

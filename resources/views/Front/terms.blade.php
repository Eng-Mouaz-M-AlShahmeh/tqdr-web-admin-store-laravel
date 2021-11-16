@extends('front.layouts.master')

@section('title', 'شروط الاستخدام')

@section('header')
    @include('front.layouts.head')
@endsection

@section('content')
    <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
        <div style="background: #f5f5f5; padding: 25px;" class="container">
            <h2 style="color: black;">شروط الاستخدام</h2>
            <p style="color: black; margin-top: 15px;">
                {{ \App\Models\Setting::where('id', 1)->first()->terms }}
            </p>
            {{-- <p style="color: black; margin-top: 15px;">يحق لك تعديل الطلب خلال يوم عمل قبل تنفيذ عملية الدفع للمتجر او للتطبيق ، عن طريق التواصل عبر واتس اب أو عبر إرسال بريد إلكتروني لخدمة العملاء info@tqdr.com.sa .</p>
                <p style="color: black; margin-top: 15px;">بسبب طبيعة الخدمة المقدمة فإنه لا يمكن استرجاع المدفوعات الإلكترونية من خلالنا ولكن يمكن لك ذلك وفق شروط وأحكام شركاؤنا مزودو خدمة تقدر.</p> --}}
        </div>
    </div>
@endsection

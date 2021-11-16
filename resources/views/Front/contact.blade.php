@extends('front.layouts.master')

@section('title', 'اتصل بنا')

@section('header')
    @include('front.layouts.head')
@endsection

@section('content')
    <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
        <div style="background: #f5f5f5; padding: 25px;" class="container">
            <h2 style="color: black;">اتصل بنا</h2>
            {{-- <p style="color: black; margin-top: 15px;">info@tqdr.com.sa</p>
                {{ \App\Models\Setting::where('id', 1)->first()->about }} --}}
            <p style="color: black; margin-top: 15px;">يمكنك مراسلتنا عبر البريد الالكتروني</p>
            <p style="color: black; margin-top: 15px;">{{ \App\Models\Setting::where('id', 1)->first()->admin_email }}</p>
            <p style="color: black; margin-top: 15px;">او من خلال واتساب</p>
            <p style="color: black; margin-top: 15px;">{{ \App\Models\Setting::where('id', 1)->first()->admin_phone }}</p>
        </div>
    </div>
@endsection

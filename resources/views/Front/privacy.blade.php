@extends('front.layouts.master')

@section('title', 'سياسة الخصوصية')

@section('header')
    @include('front.layouts.head')
@endsection

@section('content')
    <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
        <div style="background: #f5f5f5; padding: 25px;" class="container">
            <h2 style="color: black;">سياسة الخصوصية</h2>
            <p style="color: black; margin-top: 15px;">
                {{ \App\Models\Setting::where('id', 1)->first()->privacy }}
            </p>
        </div>
    </div>
@endsection

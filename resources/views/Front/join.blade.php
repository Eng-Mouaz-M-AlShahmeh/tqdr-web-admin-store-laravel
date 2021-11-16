@extends('front.layouts.master')

@section('title', 'انضم إلينا')

@section('header')
    @include('front.layouts.head')
@endsection

@section('content')
    <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
        <div style="background: #f5f5f5; padding: 25px;" class="container">
            <h2 style="color: black;">انضم إلينا</h2>
            <p style="color: black; margin-top: 15px;">
                {{ \App\Models\Setting::where('id', 1)->first()->joinUs }}
            </p>
        </div>
    </div>
@endsection

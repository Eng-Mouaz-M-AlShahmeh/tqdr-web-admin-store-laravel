@extends('front.layouts.master')

@section('title', 'عملية دفع ناجحة')

@section('header')
    @include('front.layouts.head')
@endsection

@section('content')
    <div style="margin-top: 50px; margin-bottom: 50px;" class="container">
        <div style="background: #f5f5f5; padding: 25px;" class="container">
            <h1 style="color: black;">شكراً لكم</h1>
            <h2 style="color: black;">نظام تقدر للوساطة التجارية</h2>
            <br /><br />
            <h1 style="color: black;">عملية دفع ناجحة</h1>
            <div style="margin-top: 10px; margin-bottom: 10px;" class="col-md-12 col-lg-12 col-sm-12">
                <div class="alert alert-success" role="alert">
                    لقد تمت عملية الدفع بنجاح
                </div>
            </div>
            <br /><br />
            <p style="color: black; margin-top: 15px;">
                رقم جوال العميل:
            </p>
            <p style="color: black; margin-top: 15px;">
                {{ $invoiceorder->customer_phone }}
            </p>
            <p style="color: black; margin-top: 15px;">
                اسم المتجر:
            </p>
            <p style="color: black; margin-top: 15px;">
                {{ $invoiceorder->store->store_name }}
            </p>
            <p style="color: black; margin-top: 15px;">
                رقم الإيصال:
            </p>
            <p style="color: black; margin-top: 15px;">
                {{ $invoiceorder->invoice_id }}
            </p>
            <p style="color: black; margin-top: 15px;">
                مبلغ الدفع:
            </p>
            <p style="color: black; margin-top: 15px;">
                {{ $invoiceorder->amount }} ريال
            </p>
            <p style="color: black; margin-top: 15px;">
                المبلغ المتبقي من الإيصال:
            </p>
            <p style="color: black; margin-top: 15px;">
                {{ $invoiceorder->invoice->remaining_amount }} ريال
            </p>
        </div>
    </div>
@endsection

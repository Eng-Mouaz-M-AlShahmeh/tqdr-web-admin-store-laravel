@extends('front.layouts.master')

@section('title', 'خدمة وساطة تجارية')

@section('header')
    @include('front.layouts.headmain')
@endsection

@section('styles')

    <style>
        * {
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            -o-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
            margin: 0;
            list-style: none;
            /* font-family: "Gudea", sans-serif; */
            font-weight: normal;
        }

        body {
            background: #eee;
        }

        h1 {
            text-align: center;
            margin-top: 40px;
            font-size: 60px;
            color: #333;
        }

        h1 a {
            font-size: 14px;
            color: #aaa;
            background: #fff;
            border-radius: 5px;
            padding: 2px 5px;
            border: 1px solid #dcdcdc;
            text-decoration: none;
        }

        h1 a:hover {
            color: #0fe0ba;
            text-decoration: underline;
        }

        .slider {
            width: 100%;
            max-width: 750px;
            padding: 0 50px;
            margin: 25px auto 0;
            height: 350px;
            position: relative;
        }

        .slider ul,
        .slider ul li {
            width: 100%;
            height: 100%;
        }

        .slider ul {
            position: relative;
            overflow: hidden;
            border-radius: 15px;
        }

        .slider ul li {
            position: absolute;
            top: 0;
            left: -100%;
            background-size: contain;
            /* semon #f98686 */
            background-position: center;
            background-repeat: no-repeat;
            color: #fff;
            /* font-family: serif; */
        }

        .slider ul li:first-of-type {
            background-image: url("site/assets/img/icon/visa.jpg");
        }

        .slider ul li:nth-of-type(2) {
            background-image: url("site/assets/img/icon/master.jpg");
        }

        .slider ul li:nth-of-type(3) {
            background-image: url("site/assets/img/icon/visa.jpg");
        }

        .slider ul li:nth-of-type(4) {
            background-image: url("site/assets/img/icon/master.jpg");
        }

        .slider ul li:last-of-type {
            background-image: url("site/assets/img/icon/visa.jpg");
        }

        .slider .controll {
            width: 40px;
            height: 40px;
            position: absolute;
            top: 44%;
            border-bottom: 3px solid #333;
            border-left: 3px solid #333;
            cursor: pointer;
            color: #333;
        }

        .slider .controll:first-of-type {
            transform: rotate(45deg);
            left: 20px;
        }

        .slider .controll:last-of-type {
            transform: rotate(225deg);
            right: 20px;
        }

        .slider .controll:hover,
        .slider .controll.active {
            border-color: #f98686;
            /* rose */
        }

        .slider ol {
            text-align: center;
            padding-top: 10px;
        }

        .slider ol li {
            display: inline-block;
            margin-right: 5px;
        }

        .slider ol .fa {
            font-size: 20px;
            color: #333;
            cursor: pointer;
            font-weight: normall;
        }

        .slider ol li:hover .fa:before,
        .slider ol li.active .fa:before {
            content: "\f111";
        }

        /* .slider ul li.active {
                        z-index: 999;
                        left: 0
                        } */
        @media (max-width: 490px) {
            h1 {
                font-size: 45px;
            }
        }

        @media (max-width: 350px) {
            h1 {
                font-size: 25px;
            }
        }

    </style>

@endsection

@section('content')

    <div style="padding: 50px;" class="container">
        <div class="row justify-content-between">
            <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                <h2 style="color: black; margin-top: 50px; font-size: 30px">كيف نعمل</h2>
                <hr style="width:25%; color: #0e307e; background-color: #0e307e; border-width: 3px;">
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 text-center">
                <img style="height: 200px;" src="site/assets/img/icon/smsb.png" alt="">
                <p style="color: black; margin-top: 20px; font-size: 20px">استلم رسالة التأكيد</p>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 text-center">
                <img style="height: 200px;" src="site/assets/img/icon/formb.png" alt="">
                <p style="color: black; margin-top: 20px; font-size: 20px">قم بتعبئة البيانات</p>
            </div>
            <div class="col-md-4 col-lg-4 col-sm-12 text-center">
                <img style="height: 200px;" src="site/assets/img/icon/paycashb.png" alt="">
                <p style="color: black; margin-top: 20px; font-size: 20px">ادفع عند أقرب مزود خدمة</p>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                <h2 style="color: black; margin-top: 100px; font-size: 30px">مزودو الخدمة</h2>
                <hr style="width:25%; color: #0e307e; background-color: #0e307e; border-width: 3px;">
            </div>
            {{-- <div class="col-md-3 col-lg-3 col-sm-12 justify-content-end" style="margin-top: 20px; margin-bottom: 20px;">
            {{ Form::select('nighborhood', ['' => 'اختر الحي', '1' => 'البديعة'], null, ['class'=>'form-control']) }} 
        </div> --}}
            <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                <div class="portlet-body">
                    <div class="table-container">
                        <table class="table table-striped table-bordered table-hover">
                            <!-- <thead>
                                            <tr>
                                                <th></th>
                                            </tr>
                                        </thead> -->
                            <tbody>
                                @foreach (\App\Models\ServiceProvider::all() as $serviceProvider)
                                    @if ($serviceProvider->status == 1)
                                        <tr>
                                            <td>
                                                {{ $serviceProvider->first_name }} {{ $serviceProvider->last_name }}
                                                {{-- خدمات صيانة المحمدي --}}
                                            </td>
                                            <td>
                                                {{ $serviceProvider->phone }}
                                                {{-- الشميسي – شارع الإمام تركي --}}
                                            </td>
                                            {{-- <td>
                                    <p><a href="https://goo.gl/maps/56gmcb2i71BXQDAW9" target="_blank"> خريطة </a></p>
                                </td> --}}
                                        </tr>
                                    @endif
                                @endforeach
                                {{-- <tr>
                                <td>
                                مكتبة شروق الشمس
                                </td>
                                <td>
                                البديعة – شارع سماحة الشيخ ابن باز
                                </td>
                                <td>
                                    <p><a href="https://goo.gl/maps/56gmcb2i71BXQDAW9">خريطة</a></p>
                                </td>
                            </tr> --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-12 col-sm-12 text-center">
                <h2 style="color: black; margin-top: 100px; font-size: 30px">شركاؤنا</h2>
                <hr style="width:25%; color: #0e307e; background-color: #0e307e; border-width: 3px;">
            </div>
            @foreach (\App\Models\Store::all() as $store)
                @if ($store->status == 1)
                    <div class="col-md-3 col-lg-3 col-sm-12 text-center">
                        <div class="card bg-info p-5" style="width: 18rem; margin-top: 20px;">
                            <img class="card-img-top" src="{{ $store->logo }}" alt="">
                            <div class="card-body">
                                <h5 class="card-title"> {{ $store->store_name }} </h5>
                                <p class="card-text"> {{ $store->description }} </p>
                                <a href="{{ route('front.storepay', $store->id) }}" class="btn btn-warning"
                                    style="margin: 20px;"> تقديم طلب دفع </a>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
            {{-- <div class="col-md-12 col-lg-12 col-sm-12 text-center" style="margin-top: 50px;">
            <!-- slider -->
            <div class="slider">
                <!-- slide -->
                <ul>
                    <li class="active"></li>
                    <li></li>
                    <li></li>
                    <li></li>
                    <li></li>
                </ul>
                <ol>
                <!-- point -->
                <li class="active"><i class="fa fa-circle-o"></i></li>
                <li><i class="fa fa-circle-o"></i></li>
                <li><i class="fa fa-circle-o"></i></li>
                <li><i class="fa fa-circle-o"></i></li>
                <li><i class="fa fa-circle-o"></i></li>
                <!-- playpause -->
                <i class="fa playpause fa-pause-circle-o" title="pause"></i>   
                </ol>
                <!-- controll -->
                <span class="controll active"></span>
                <span class="controll"></span>
            </div>
        </div> --}}
        </div>
    </div>
@endsection
@section('scripts')
    <script src="http://cdnjs.cloudflare.com/ajax/libs/gsap/1.18.0/TweenMax.min.js"></script>

    <script>
        $(function() {
            "use strict";
            var body = $("body"),
                active = $(".slider ol li, .slider .controll"),
                controll = $(".slider .controll"),
                playpause = $(".playpause"),
                sliderTime = 1,
                sliderWait = 3000,
                i = 999,
                autoRun,
                stop = false;
            // Reset
            $(".slider ul li:first").css("left", 0);
            // Run Slider
            function runSlider(what) {
                what.addClass("active").siblings("li, span").removeClass("active");
            }
            // slider gsap
            function gsapSlider(whose, left) {
                i++;
                if (whose.hasClass("active")) {
                    TweenMax.fromTo(
                        ".slider ul li.active",
                        sliderTime, {
                            zIndex: i,
                            left: left
                        }, {
                            left: 0
                        }
                    );
                }
            }
            // Active
            active.on("click", function() {
                runSlider($(this));
            });
            // Arrow left
            controll.first().on("click", function() {
                var slide = $(".slider ul li.active, .slider ol li.active").is(
                        ":first-of-type"
                    ) ?
                    $(".slider ul li:last, .slider ol li:last") :
                    $(".slider ul li.active, .slider ol li.active").prev("li");
                runSlider(slide);
                gsapSlider(slide, "100%");
            });
            // Arrow right
            controll.last().on("click", function() {
                var slide = $(".slider ul li.active, .slider ol li.active").is(
                        ":last-of-type"
                    ) ?
                    $(".slider ul li:first, .slider ol li:first") :
                    $(".slider ul li.active, .slider ol li.active").next("li");
                runSlider(slide);
                gsapSlider(slide, "-100%");
            });
            // Point
            $(".slider ol li").on("click", function() {
                var start = $(".slider ul li.active").index();
                var slide = $(".slider ul li").eq($(this).index());
                runSlider(slide);
                var end = $(".slider ul li.active").index();
                if (start > end) {
                    gsapSlider(slide, "100%");
                }
                if (start < end) {
                    gsapSlider(slide, "-100%");
                }
            });
            // Auto run slider
            function autoRunSlider() {
                if (body.css("direction") === "ltr" && stop === false) {
                    autoRun = setInterval(function() {
                        controll.last().click();
                    }, sliderWait);
                } else if (body.css("direction") === "rtl" && stop === false) {
                    autoRun = setInterval(function() {
                        controll.first().click();
                    }, sliderWait);
                }
            }
            autoRunSlider();
            // When hover
            active.on("mouseenter", function() {
                if (stop === false) {
                    clearInterval(autoRun);
                }
            });
            active.on("mouseleave", function() {
                if (stop === false) {
                    autoRunSlider();
                }
            });
            // play pause click
            playpause.on("click", function() {

                $(this).toggleClass("fa-play-circle-o fa-pause-circle-o");

                if (playpause.hasClass("fa-play-circle-o")) {
                    stop = true;
                    clearInterval(autoRun);
                    $(this).attr("title", "play");
                }

                if (playpause.hasClass("fa-pause-circle-o")) {
                    stop = false;
                    autoRunSlider();
                    $(this).attr("title", "pause");
                }
            });
        });
    </script>
@endsection

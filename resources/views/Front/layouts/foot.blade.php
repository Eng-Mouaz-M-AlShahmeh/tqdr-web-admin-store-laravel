    <!-- footer area start -->
    <footer>
        <div class="footer-area bg-theme ptb--50">
            <div class="container">
                <div class="footer-inner">
                    <div class="row justify-content-between">
                        <div class="col-md-4 col-lg-4 col-sm-12">
                            <a href="{{ route('front.index') }}"><img style="height: 300px;"
                                    src="{{ asset('site/assets/img/icon/logo.png') }}" alt=""></a>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12">
                            <h2 style="color: white; margin-top: 20px;">عن تقدر</h2>
                            <ul style="margin-top: 40px;">
                                <li><a href="{{ route('front.about') }}">
                                        <p style="color: white;">من نحن</p>
                                    </a></li>
                                <li><a href="{{ route('front.contact') }}">
                                        <p style="color: white;">اتصل بنا</p>
                                    </a></li>
                                <li><a href="{{ route('front.join') }}">
                                        <p style="color: white;">انضم إلينا</p>
                                    </a></li>
                                <li><a href="{{ route('front.terms') }}">
                                        <p style="color: white;">شروط الاستخدام</p>
                                    </a></li>
                                <li><a href="{{ route('front.privacy') }}">
                                        <p style="color: white;">سياسة الخصوصية</p>
                                    </a></li>
                            </ul>
                        </div>
                        <div class="col-md-4 col-lg-4 col-sm-12">
                            <!-- <div class="row justify-content-start">
                                 <div class="col-md-12 col-lg-12 col-sm-12"> -->
                            <h2 style="color: white; margin-top: 20px;">مواعيد العمل</h2>
                            <p style="color: white;">
                                {{ \App\Models\Setting::where('id', 1)->first()->admin_periods }} </p>
                            {{-- <p style="color: white; margin-top: 40px;">من السبت للخميس من 9ص إلى 5م</p>
                                    <p style="color: white;">الجمعة من 1م إلى 5م</p> --}}
                            <ul class="fsocial" style="margin-top: 40px;">
                                <li><a href="{{ \App\Models\Setting::where('id', 1)->first()->admin_facebook }}"
                                        target="_blank"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="{{ \App\Models\Setting::where('id', 1)->first()->admin_twitter }}"
                                        target="_blank"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="{{ \App\Models\Setting::where('id', 1)->first()->admin_google_plus }}"
                                        target="_blank"><i class="fa fa-google"></i></a></li>
                            </ul>
                            <!-- </div>
                            </div> -->
                        </div>
                    </div>
                    <br>
                    <div style="
                border-style: solid;
                border-width: 1px 0 0;
                border-color: #d1d1d1;
                transition: background .3s,border .3s,border-radius .3s,box-shadow .3s;
                " class="row justify-content-between m-5">
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <a href="https://maroof.sa/119492" target="_blank"><img
                                    style="height: 50px; margin-top: 15px;"
                                    src="{{ asset('site/assets/img/icon/marof.png') }}" alt=""></a>
                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12">
                            <p style="margin-top: 15px;" class="copy-right">
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                {{ \App\Models\Setting::where('id', 1)->first()->admin_copyright }}
                                {{-- جميع الحقوق محفوظة (تقدر) لخدمات الوساطة التجارية --}}
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                <script>
                                    document.write(new Date().getFullYear());
                                </script> All rights reserved <i class="fa fa-heart-o" aria-hidden="true"></i><a href="#" target="_blank"></a> -->
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer area end -->

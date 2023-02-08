@extends('main.home_master')
@section('content')
    <div class=" contact-us">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-4">
                    <div class="contact-icon">
                        <i class="fa-sharp fa-solid fa-location-dot"></i>
                    </div>
                    <p class="contact-details">
                        عنوانا عنوانا عنوانا
                    </p>
                </div>
                <div class="col-4">
                    <div class="contact-icon">
                        <i class="fa-solid fa-envelope"></i>
                    </div>
                    <p class="contact-details">
                        عنوانا عنوانا عنوانا
                    </p>
                </div>
                <div class="col-4">
                    <div class="contact-icon">
                        <i class="fa-solid fa-phone"></i>

                    </div>
                    <p class="contact-details">
                        عنوانا عنوانا عنوانا
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container form">
        <div class="row ">
            <div class="col-12">
                <form class="text-right" action="{{ route('contact.form') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>الاسم الكامل</label>
                        <input type="name" class="form-control" name="name">

                    </div>
                    <div class="contact-info d-flex justify-content-between">
                        <div class="form-group">

                            <label>رقم الهاتف</label>
                            <input type="phone" name="phone">

                        </div>
                        <div class="form-group">
                            <label>ايميل</label>
                            <input type="email" name="email">
                        </div>
                    </div>


                    <div id="feedback">

                    </div>
                    <div class="form-group">
                        <label>الرساله</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">إرسال</button>
                </form>
            </div>

        </div>
    </div>
    <div class="map">
        <div class="mapouter">
            <div class="gmap_canvas"><iframe class="gmap_iframe" frameborder="0" scrolling="no" marginheight="0"
                    marginwidth="0"
                    src="https://maps.google.com/maps?width=100&amp;height=450&amp;hl=en&amp;q=University of Oxford&amp;t=&amp;z=14&amp;ie=UTF8&amp;iwloc=B&amp;output=embed"></iframe><a
                    href="https://pdflist.com/" alt="pdflist.com">Pdflist.com</a></div>
            <style>
                .mapouter {
                    position: relative;
                    text-align: right;
                    width: 100%;
                    height: 450px;
                }

                .gmap_canvas {
                    overflow: hidden;
                    background: none !important;
                    width: 100%;
                    height: 450px;
                }

                .gmap_iframe {
                    width: 100% !important;
                    height: 450px !important;
                }
            </style>
        </div>
        <div class="learn-more">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6 text-center">
                        <div class="learn-more-details">
                            <p>اعرف المزيد من التفاصيل</p>
                            <button class="btn-details">المزيد من التفاصيل</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

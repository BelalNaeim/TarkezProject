@extends('main.home_master')
@section('content')
    <div class="services pt-3 pb-3">
        <div class="services-title text-center">
            <h3>خدماتنا</h3>
        </div>
        <div class="container">
            <div class="row">
                @foreach ($galleries as $gallery)
                    <div class="col-md-4 service">
                        <div class="serv ">
                            <div class="serve-title ">
                                <p>{!! $gallery->title['en'] !!}</p>
                                <p>المزيد <i class="fa-solid fa-arrow-left"></i></p>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="serv">
                    <div class="serve-title ">
                        <p>أجهزه</p>
                        <p>المزيد <i class="fa-solid fa-arrow-left"></i></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    @foreach ($galleries as $gallery)
        <div class="gym-halls gym">
            <div class="gym-halls-details">
                <p><strong>{!! $gallery->title['en'] !!}</strong> <br>
                    {!! $gallery->description['en'] !!}
                </p>
                <button class="btn ">اتصل بنا </button>
            </div>
        </div>
    @endforeach



    <div class="contact_us mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="details-title">
                        <h3>عنوان</h3>
                    </div>
                    <div class="details-prag">
                        <p>قم بالاختيار من بين أكثر من 30 نموذج سيرة ذاتية cv
                            احترافي متوفرة باللغة العربية والإنجليزية تناسب جميع المهن والاختصاصات، بعد تحميل السي في
                            التي
                            تعجبك كل ما عليك فعله هو فتحها ببرنامج الورد والتعديل عليها عن طريق إضافة معلوماتك ومهاراتك
                            لتحصل على سيرة
                            ذاتية تناسب الوظيفة التي تريد التقدم للعمل فيها. وفي
                            أسفل الصفحة ستجد نصائح مفيدة لطريقة كتابة السيرة الذاتية
                            والمعلومات
                            التي يجب أن
                            تضمنها فيها.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

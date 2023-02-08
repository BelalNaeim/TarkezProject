@extends('main.home_master')
@section('content')
    <div class="contact_us">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="details-title">
                        <h3>عنوان</h3>
                    </div>
                    <div class="details-prag">
                        <p>قم بالاختيار من بين أكثر من 30 نموذج سيرة ذاتية cv
                            احترافي متوفرة باللغة العربية والإنجليزية تناسب جميع المهن والاختصاصات، بعد تحميل السي في التي
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
            <div class="col-lg-2">
                <button class="btn">اتصل بنا </button>
            </div>
        </div>
    </div>

    <div class="gym-machine">
        <div class="container">
            <div class="row">
                @foreach ($mains as $main)
                    <div class="col-lg-6">
                        <div class="d-flex justify-content-between">
                            <div class="icon-img">
                                <img src="{{ URL::to($main->cover) }}" alt="" style="width:250px;height:250px">
                            </div>
                            <div class="machine-prag">
                                <h4>{!! $main->title['en'] !!}</h4>
                                <p>{!! $main->description['en'] !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
    <div class="contact_us mt-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <div class="details-title">
                        <h3>عنوان</h3>
                    </div>
                    <div class="details-prag">
                        <p>قم بالاختيار من بين أكثر من 30 نموذج سيرة ذاتية cv
                            احترافي متوفرة باللغة العربية والإنجليزية تناسب جميع المهن والاختصاصات، بعد تحميل السي في التي
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
    <div class="learn-more">
    @endsection

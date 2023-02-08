@extends('main.home_master')
@section('content')
    <div class="container about-us">
        <div class="row">
            @foreach ($abouts as $about)
                <div class="col-md-6">
                    <div class="about-us-img">
                        <img src="{{ URL::to($about->image) }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <h5>{{ $about->title['en'] }}</h5>
                    <p>{{ $about->description['en'] }}
                    </p>
                </div>
            @endforeach
        </div>
    </div>
@endsection

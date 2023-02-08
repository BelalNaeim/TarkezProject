@extends('main.home_master')
@section('content')
    @foreach ($Projects as $Project)
        <div class="container pt-3">
            <div class="row">
                <div class="col-md-3 mt-3">
                    <div class="project-img">
                        <img src="{{ URL::to($Project->image) }}" alt="">
                    </div>
                </div>
                <div class="col-md-8 mt-3 projects-details">
                    <div class="project-details
                ">
                        <p><strong>{!! $Project->title['en'] !!}</strong></p>
                        <div class="d-flex">
                            <p>
                                {!! $Project->description['en'] !!} </p>
                            <button class="btn mx-2">صور المشاريع</button>
                        </div>


                    </div>
                </div>
    @endforeach
@endsection

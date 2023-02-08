@extends('layouts.master')

@section('title')
@endsection

@section('css')
@endsection

@section('title_page')
@endsection

@section('title_home')
    WEBSITE SETTINGS
@endsection

@section('content')
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Update Website Setting </h4>
                <br><br>
                {{-- @php
                    dd($websitesetting);
                @endphp --}}
                <form class="forms-sample" method="POST" action="{{ route('update.websetting', $websitesetting->id) }}"
                    enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Website Logo Upload</label>
                            <input type="file" name="logo" class="form-control-file" id="exampleFormControlFile1">
                        </div>

                        <div class="form-group col-md-6">
                            <label for="exampleInputName1">Old Image</label>
                            <img src="{{ asset($websitesetting->logo) }}" style="width: 70px; height: 50px;">
                            <input type="hidden" name="oldlogo" value="{{ $websitesetting->logo }}">
                        </div>

                    </div> <!-- End Row  -->



                    <div class="form-group">
                        <label for="exampleTextarea1">Address English</label>
                        <textarea class="form-control" name="address_en" id="summernote">
     {{ $websitesetting->address_en }}

   </textarea>
                    </div>



                    <div class="form-group">
                        <label for="exampleTextarea1">Address Arabic</label>
                        <textarea class="form-control" name="address_ar" id="summernote1">
       {{ $websitesetting->address_ar }}
    </textarea>
                    </div>




                    <div class="form-group">
                        <label for="exampleInputEmail1">Phone English</label>
                        <input type="text" class="form-control" name="phone_en" value="{{ $websitesetting->phone_en }}">

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1"> Phone Arabic</label>
                        <input type="text" class="form-control" name="phone_ar" value="{{ $websitesetting->phone_ar }}">
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Email</label>
                        <input type="email" class="form-control" name="email" value="{{ $websitesetting->email }}">
                    </div>




                    <button type="submit" class="btn btn-primary mr-2">Update</button>

                </form>
            </div>
        </div>
    </div>
@endsection

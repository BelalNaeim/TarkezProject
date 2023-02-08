@extends('layouts.master')

@section('title')
@endsection

@section('css')
@endsection

@section('title_page')
@endsection

@section('title_home')
    SOCIAL SETTING
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update Social Links</h4>
                        <br><br>
                        <form class="forms-sample" method="POST" action="{{ route('update.social', $social->id) }}">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputUsername1">Facebook</label>
                                <input type="text" class="form-control" name="facebook" value="{{ $social->facebook }}">

                                @error('facebook')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Twitter</label>
                                <input type="text" class="form-control" name="twitter" value="{{ $social->twitter }}">
                                @error('twitter')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Youtube</label>
                                <input type="text" class="form-control" name="youtube" value="{{ $social->youtube }}">
                                @error('youtube')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">SnapCaht</label>
                                <input type="text" class="form-control" name="snapchat" value="{{ $social->snapchat }}">
                                @error('linkedin')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Instagram</label>
                                <input type="text" class="form-control" name="instagram"
                                    value="{{ $social->instagram }}">
                                @error('instgram')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mr-2">Update</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>
@endsection

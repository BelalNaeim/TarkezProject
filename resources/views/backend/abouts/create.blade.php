@extends('layouts.master')

@section('title')
@endsection

@section('css')
@endsection

@section('title_page')
@endsection

@section('title_home')
    CREATE ABOUT SECTION
@endsection

@section('content')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header" style="background-color: #343A40">
                        <h3 class="card-title">Add About Section</h3>
                    </div>


                    <form action="{{ route('abouts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Title en') }}</label>
                                        <input type="text" name="title_en" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter English title">

                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Title ar') }}</label>
                                        <input type="text" name="title_ar" class="form-control" id="exampleInputEmail1"
                                            placeholder="أدخل العنوان باللغة العربية" dir="rtl">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Description en') }}</label>
                                        <textarea name="desc_en" class="form-control" id="exampleInputEmail1" placeholder="Enter English Description"></textarea>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{ __('Description ar') }}</label>
                                        <textarea name="desc_ar" class="form-control" id="exampleInputEmail1" placeholder="أدخل الوصف باللغة العربية"
                                            dir="rtl"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <label for="exampleInputFile">{{ __('About Us Section Image') }}</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="form-control" name="image" accept="image/*"
                                            onchange="loadFile(event)">
                                        <img id="output" style="width: 80px" />
                                    </div>

                                </div>
                            </div>
                        </div>

                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" style="background-color: #343A40">Submit</button>
                </div>
                </form>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>

    </div>
@endsection
@endsection

@section('script')
<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
<script type="text/javascript">
    function display(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(event) {
                $('#myid').attr('src', event.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#demo").change(function() {
        display(this);
    });
</script>
@endsection

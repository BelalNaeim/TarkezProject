@extends('layouts.master')

@section('title')
@endsection

@section('css')
@endsection

@section('title_page')
@endsection

@section('title_home')
    INDEX PROJECT
@endsection

@section('content')
    <section class="content m-5">

        <div class="box box-primary">

            <h3 class="box-title" style="margin-bottom: 15px">projects Count <small>{{ $Projects->total() }}</small>
            </h3>

            <form action="{{ route('projects.index') }}" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="search here"
                            value="{{ request()->search }}">
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary" style="background-color: #041C32"><i
                                class="fa fa-search"></i>
                            {{ __('search') }}</button>
                        <a href="{{ route('projects.create') }}" class="btn btn-primary"
                            style="background-color: #041C32"><i class="fa fa-plus"></i>
                            {{ __('add Project') }}</a>


                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->


        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($Projects as $key => $Project)
                        <tr>
                            {{-- @php
                                dd($Project);
                            @endphp --}}
                            <td style="width: 10%">{{ $loop->iteration }}</td>
                            <td style="width: 20%">{{ $Project->title['en'] }}</td>
                            <td style="width: 30%">
                                {{ \Illuminate\Support\Str::limit($Project->description['en'], 250) }}
                            </td>
                            <td style="width: 20%"><img style="width: 100px" src="{{ URL::to($Project->image) }}"
                                    alt="">
                            </td>
                            <td style="width: 20%">
                                <a href="{{ route('projects.edit', $Project->id) }}" class="btn btn-info btn-sm"><i
                                        class="fa fa-edit"></i>
                                    {{ __('edit') }}</a>

                                <form action="{{ route('projects.destroy', $Project->id) }}" method="post"
                                    style="display: inline-block">
                                    {{ csrf_field() }}
                                    {{ method_field('delete') }}
                                    <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i>
                                        {{ __('delete') }}</button>
                                </form><!-- end of form -->
                            </td>
                        </tr>
                </tbody>
                @endforeach
            </table>
            <div class="d-flex">
                {{ $Projects->links() }}
                {{-- {!! $services->links() !!} --}}
            </div>
        </div>
    </section>
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

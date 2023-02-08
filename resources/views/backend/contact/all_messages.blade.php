@extends('layouts.master')

@section('title')
@endsection

@section('css')
@endsection

@section('title_page')
@endsection

@section('title_home')
    INDEX Contact Us
@endsection

@section('content')
    <div class="container-fluid">


        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Contact Messages Details</h5>

            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Contact Messages List </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                            <tr>
                                <th class="wd-15p">Name</th>
                                <th class="wd-15p">Phone</th>
                                <th class="wd-15p">Email</th>
                                <th class="wd-20p">Message</th>
                                <th class="wd-20p">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($message as $row)
                                <tr>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->phone }}</td>
                                    <td>{{ $row->email }} </td>
                                    <td>{{ $row->msg }} </td>


                                    <td>
                                        <a href=" " class="btn btn-sm btn-info">View</a>

                                    </td>

                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->




        </div>
    </div>
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

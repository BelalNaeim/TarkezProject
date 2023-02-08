@include('layouts.head')

<body class="hold-__ition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Admin</b>LTE</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">{{ __('login') }}</p>

                {!! Form::open(['route' => 'admin.login', 'method' => 'POST']) !!}
                @csrf
                <div class="input-group mb-3">
                    {!! Form::text('email', null, ['placeholder' => __('email'), 'class' => 'form-control']) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>

                    </div>

                </div>
                <div class="input-group mb-3">
                    {!! Form::password('password', ['class' => 'form-control', 'placeholder' => __('password')]) !!}
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>


                    </div>

                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember">
                            <label for="remember">
                                {{ __('remember_me') }}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">{{ __('sign in') }}</button>
                    </div>
                    <!-- /.col -->
                </div>
                </form>

                @if (Session::has('failed'))
                    <div class="alert alert-danger">{{ Session::get('failed') }}</div>
                @endif

                <!-- /.social-auth-links -->


            </div>
            <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->


    @include('layouts.footer-scripts')

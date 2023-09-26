<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
{{--    <meta name="csrf-token" content="{{ csrf_token() }}">--}}
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}" />
    {{-- <link rel="stylesheet" href="assets/css/login.css" /> --}}

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

{{--    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}" />--}}

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>

    <script src="{{asset('assets/js/popper.js')}}"></script>
    <script src="{{asset('assets/js/main.js')}}"></script>
</head>
<body>
<div id="app" class="img js-fullheight" style="background-image: url('assets/images/backgroudimage.jpeg');">

    <section class="ftco-section">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-12">
                    <div class="login-wrap p-0">

                        <main class="py-4">

                            <div class="container">
                                <div class="row justify-content-center">
                                    <div class="col-md-8">
                                        <div class="card">
                                            <div class="card-header">{{ __('Reset Password') }}</div>

                                            <div class="card-body">
                                                <form method="POST" action="{{route('update.password')}}">
                                                    @csrf

                                                    <input type="hidden" name="token" value="{{ $token }}">

                                                    <div class="row mb-3">
                                                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="email" type="email" class="form-control" name="email" value="" required autocomplete="email" autofocus>
                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password" type="password" class="form-control" name="password" required autocomplete="new-password">

                                                        </div>
                                                    </div>

                                                    <div class="row mb-3">
                                                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                                        <div class="col-md-6">
                                                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                        </div>
                                                    </div>

                                                    <div class="row mb-0">
                                                        <div class="col-md-6 offset-md-4">
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Reset Password') }}
                                                            </button>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </main>


                    </div>
                </div>
            </div>
        </div>
</div>
</section>



</div>
</body>
</html>

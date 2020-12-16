<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Build Resume - {{ config('app.name') }}</title>
    <script src=""></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('front/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/styles.css') }}">
</head>
<body>
<main>
    <section class="user-page">
        <div class="row no-gutters">
            <div class="col-md-5">
                <div class="login-splash side-splash"
                     style="background: url({{ asset('front/images/side-image2.png') }}) no-repeat;
                         background-size: 100%;background-position: right;">
                    <div class="text-left login-logo pl-lg-5 pl-3">
                        <img src="{{ asset('front/images/logo.png') }}" alt="" height="70"/>
                    </div>

                </div>
            </div>
            <div class="col-md-7">
                <div class="login-formwrap">


                    <div class="text-right pt-3 pr-3">
                        <a href="" class=" btn primary-btn">
                            <i class="fa fa-user mr-2"></i> Account
                        </a>

                    </div>
                    <div class="row no-gutters">
                        <div class="col-lg-9 m-auto">
                            <div class="center-container text-left">
                                <h3 class="mb-5 fw-600">How would you like to build <br class="desktop-break">your
                                    resume?</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="create-resume">
                                            <a href=" " class=" dashed-box text-center text-dark">
                                                <img src="{{ asset('front/images/add.svg') }}" height="60" class="mb-4"
                                                     alt="">
                                                <h5 class="fw-600 fs-18 mb-3">Build a new resume</h5>
                                                <p class="fs-14">We’ll help you build a new job-winning resume from
                                                    start to finish!</p>
                                                <label class="badge badge-danger">Recommended</label>
                                            </a>
                                        </div>
                                    </div>

                                </div>


                                <div class=" text-right mt-5">
                                    <button type="button" class="btn btn-outline-secondary text-center text-uppercase ">
                                        BACK
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="{{ asset('front/js/jquery-3.3.1.min.js')}}"></script>
<script src="{{ asset('front/js/bootstrap.min.js')}}"></script>
</body>
</html>

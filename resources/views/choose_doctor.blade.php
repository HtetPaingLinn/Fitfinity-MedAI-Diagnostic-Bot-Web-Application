<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Fitfinity</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <link rel="icon" href="{{ Vite::asset('assets/images/logo/logo.svg') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"/>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- ========================= CSS here ========================= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />

    <style>
        html {
            scroll-behavior: smooth;
        }
        body {
            background-color: #f0f0f0;
            font-family: "Poppins", sans-serif;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            margin: 5px;
        }

        h3 {
            color: #00594d;
            font-family: "Poppins", sans-serif;
            margin-bottom: 20px;
        }

        .dropdown {
            margin-bottom: 20px;
        }

        .dropdown-menu {
            background-color: #f0f0f0;
            border: 1px solid #A6A6A6;
        }

        .dropdown-item {
            color: #00594d;
            padding: 20px 25px;
        }

        .dropdown-item:hover {
            background-color: #0bb288;
            color: white;
        }

        .doctor-card {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            flex-direction: row;
            align-items: center;
            border-radius: 10px;
            width: 455px;
        }

        .doctor-card h3 {
            color: #00594d;
            font-family: "Poppins", sans-serif;
            margin-top: 0;
            margin-bottom: 15px;
        }

        .doctor-card p {
            color: #646569;
            font-size: 16px;
            margin-bottom: 8px;
        }

        .doctor-card .user-img {
            width: 140px;
            height: auto;
            border-radius: 10%;
            margin-left: 20px;
            margin-right: 20px;
        }

        .doctor-card a.btn {
            background-color: #0bb288;
            color: white;
            padding: 10px 20px;
            text-transform: uppercase;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .doctor-card a.btn:hover {
            background-color: #e8bd70;
            color: white;
        }

        .doctor-card-tag {
            background-color: #e8bd70;
            color: #ffffff;
            border-radius: 5px;
            padding: 5px 10px;
            margin-bottom: 10px;
            margin-right: 10px;
            font-size: 10px;
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .doctor-card {
                flex-direction: column;
                text-align: center;
            }

            .doctor-card .user-img {
                margin: 0 auto 20px auto;
            }
            .scroll-top {
                position: fixed;
                bottom: 20px;
                right: 20px;
                display: none;
                background-color: #0bb288;
                color: #fff;
                border-radius: 50%;
                padding: 10px;
                cursor: pointer;
            }

            .scroll-top.show {
                display: block;
            }
        }

        .navbar-nav .nav-item {
            margin-left: 10px;
            position: relative;
            display: flex;
            align-items: center;
        }

        .navbar-nav .nav-item:first-child {
            margin-left: 0;
        }

        @media only screen and (min-width: 992px) and (max-width: 1199px) {
            .navbar-nav .nav-item {
                margin-left: 30px;
            }
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .navbar-nav .nav-item {
                margin: 0;
            }
        }

        @media (min-width: 768px) {
            .navbar-nav {
                justify-content: center; /* Center the nav items in the navbar */
            }
        }

        .navbar-nav .nav-item a {
            font-size: 16px;
            padding: 8px 10px;
            color: #af976d;
            font-family: "Raleway", sans-serif;
            -webkit-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .navbar-nav .nav-item a {
                display: block;
                padding: 4px 0;
            }
        }

        @media (max-width: 767px) {
            .navbar-nav .nav-item a {
                display: block;
                padding: 4px 0;
            }
        }

        .navbar-nav .nav-item a.active, .navbar-nav .nav-item a:hover {
            color: #0bb288;
        }

        .navbar-nav .nav-item:hover .sub-menu {
            top: 100%;
            opacity: 1;
            visibility: visible;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .navbar-nav .nav-item:hover .sub-menu {
                top: 0;
            }
        }

        @media (max-width: 767px) {
            .navbar-nav .nav-item:hover .sub-menu {
                top: 0;
            }
        }

        .navbar-nav .nav-item .sub-menu {
            width: 200px;
            background-color: #fff;
            -webkit-box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            box-shadow: 0px 0px 20px 0px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 110%;
            left: 0;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all 0.3s ease-out 0s;
            transition: all 0.3s ease-out 0s;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .navbar-nav .nav-item .sub-menu {
                position: relative;
                width: 100%;
                top: 0;
                display: none;
                opacity: 1;
                visibility: visible;
            }
        }

        @media (max-width: 767px) {
            .navbar-nav .nav-item .sub-menu {
                position: relative;
                width: 100%;
                top: 0;
                display: none;
                opacity: 1;
                visibility: visible;
            }
        }

        .navbar-nav .nav-item .sub-menu li {
            display: block;
        }

        .navbar-nav .nav-item .sub-menu li a {
            display: block;
            padding: 8px 20px;
            color: #222;
        }

        .navbar-nav .nav-item .sub-menu li a.active, .navbar-nav .nav-item .sub-menu li a:hover {
            padding-left: 25px;
            color: #0bb288;
        }

        .navbar-nav .sub-nav-toggler {
            display: none;
        }

        @media only screen and (min-width: 768px) and (max-width: 991px) {
            .navbar-nav .sub-nav-toggler {
                display: block;
                position: absolute;
                right: 0;
                top: 0;
                background: none;
                color: #222;
                font-size: 18px;
                border: 0;
                width: 30px;
                height: 30px;
            }
        }

        @media (max-width: 767px) {
            .navbar-nav .sub-nav-toggler {
                display: block;
                position: absolute;
                right: 0;
                top: 0;
                background: none;
                color: #222;
                font-size: 18px;
                border: 0;
                width: 30px;
                height: 30px;
            }
        }

        .navbar-nav .sub-nav-toggler span {
            width: 8px;
            height: 8px;
            border-left: 1px solid #222;
            border-bottom: 1px solid #222;
            -webkit-transform: rotate(-45deg);
            transform: rotate(-45deg);
            position: relative;
            top: -5px;
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'assets/css/main.css', 'assets/css/bootstrap-5.0.5-alpha.min.css', 'assets/css/LineIcons.2.0.css'])

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/bootstrap-5.0.5-alpha.min.css') }}" />
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/LineIcons.2.0.css') }}" />
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/tiny-slider.css') }}" />
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/main.css') }}" />
</head>
<body>

@if(Auth::guard('web')->check())
    <header id="home" class="header">
        <div class="header-wrapper">
            <div class="header-top theme-bg py-2">
                <div class="mx-auto max-w-screen-lg px-4">
                    <div class="flex flex-wrap -mx-28 items-center">
                        <div class="w-full md:w-2/3 text-center text-md-left">
                            <ul class="flex justify-center md:justify-start lg:justify-start">
                                <li class="mr-4"><a href="#"><i class="lni lni-phone"></i> +959985056890</a></li>
                                <li><a href="#"><i class="lni lni-envelope"></i> fitfinity@gmail.com </a></li>
                            </ul>
                        </div>
                        <div class="w-full md:w-1/3 text-right">
                            <ul class="flex justify-center md:justify-end">
                                <li class="mr-2"><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                <li class="mr-2"><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-area">
                <div class="mx-auto max-w-screen-lg px-2">
                    <nav class="navbar navbar-expand-lg">
                        <a class="-ml-20 navbar-brand d-flex align-items-center" href="#">
                            <img style="width: 40px" src="{{ Vite::asset('assets/images/logo/MainLogosvg.svg') }}"
                                 alt="Logo"/>
                            <div class="ml-2">
                                <h4 style="display: inline; font-size: 1rem;">
                                    <span style="color: #0bb288; font-family: 'Nunito', sans-serif; font-weight: 700;">FitFinity</span>
                                    <span style="color: #af976d; font-family: 'Nunito', sans-serif; font-weight: 700;">Healthcare</span>
                                </h4>
                                <h6 style="font-size: 0.75rem; margin: 0; margin-top: -5px;" class="navDiv">
                                    <span style="color: #af976d; font-family: 'Pacifico', cursive">Health For</span>
                                    <span style="color: #0bb288; font-family: 'Pacifico', cursive">Everyone</span>
                                </h6>
                            </div>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="-mr-36 collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="ml-10 relative flex items-center mt-2.5">
                                    <a class="page-scroll text-sm text-gray-700 active transition-colors transition-300" style="color: #af976d" href="/">Home</a>
                                </li>
                                <li class="ml-10 relative flex items-center mt-1">
                                    <a class="page-scroll active text-sm text-gray-700 active transition-colors transition-300" style="color: #af976d" href="/">Find Doctor</a>
                                </li>
                                <li class="ml-10 relative flex items-center mt-1">
                                    <a class="page-scroll text-sm text-gray-700 active transition-colors transition-300" style="color: #af976d" href="/">Contact</a>
                                </li>
                                <li class="ml-10 relative flex items-center mt-1">
                                    <a class="page-scroll text-sm text-gray-700 active transition-colors transition-300" style="color: #af976d" href="/">History</a>
                                </li>
                                <li class="ml-10 relative flex items-center mt-1">
                                    <div class="dropdown me-5">
                                        <button class="btn p-3 rounded-3" type="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false"
                                                style="outline: none; box-shadow: none;">
                                            <img class="rounded-circle" width="45px" src="{{ auth()->guard('web')->user()->photo ? asset('storage/' . auth()->guard('web')->user()->photo) : asset('storage/images/default_profile.jpg') }}"
                                                 alt="Profile Picture">
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end" style="min-width: 250px;">
                                            <li class="px-6 py-1.5">
                                                <div class="d-flex flex-column">
                                                    <span class="text-sm font-semibold text-gray-700 w-full mb-1">Signed in as <span class="font-bold">{{ auth()->guard('web')->user()->username }}</span></span>
                                                    <span class="text-xs font-mono">{{ auth()->guard('web')->user()->email }}</span>
                                                </div>
                                            </li>
                                            <li><hr class="dropdown-divider"></li>
                                            <li class="px-3">
                                                <a class="dropdown-item d-flex align-items-center" href="/logout">
                                                    <i class="fas fa-sign-out-alt"></i> <span class="text-sm">Logout</span>
                                                </a>
                                            </li>
                                        </ul>

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
@else
    <header id="home" class="header mb-10">
        <div class="header-wrapper">
            <div class="header-top theme-bg py-2">
                <div class="mx-auto max-w-screen-lg px-4">
                    <div class="flex flex-wrap -mx-28 items-center">
                        <div class="w-full md:w-2/3 text-center text-md-left">
                            <ul class="flex justify-center md:justify-start lg:justify-start">
                                <li class="mr-4"><a href="#"><i class="lni lni-phone"></i> +959985056890</a></li>
                                <li><a href="#"><i class="lni lni-envelope"></i> fitfinity@gmail.com </a></li>
                            </ul>
                        </div>
                        <div class="w-full md:w-1/3 text-right">
                            <ul class="flex justify-center md:justify-end">
                                <li class="mr-2"><a href="#"><i class="lni lni-facebook-filled"></i></a></li>
                                <li class="mr-2"><a href="#"><i class="lni lni-twitter-filled"></i></a></li>
                                <li><a href="#"><i class="lni lni-linkedin-original"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="navbar-area">
                <div class="mx-auto max-w-screen-lg px-2">
                    <nav class="navbar navbar-expand-lg">
                        <a class="-ml-20 mt-1 -mb-1 navbar-brand d-flex align-items-center" href="#">
                            <img style="width: 40px" src="{{ Vite::asset('assets/images/logo/MainLogosvg.svg') }}"
                                 alt="Logo"/>
                            <div class="ml-2">
                                <h4 style="display: inline; font-size: 1rem;">
                                    <span style="color: #0bb288; font-family: 'Nunito', sans-serif; font-weight: 700;">FitFinity</span>
                                    <span style="color: #af976d; font-family: 'Nunito', sans-serif; font-weight: 700;">Healthcare</span>
                                </h4>
                                <h6 style="font-size: 0.75rem; margin: 0; margin-top: -5px;" class="navDiv">
                                    <span style="color: #af976d; font-family: 'Pacifico', cursive">Health For</span>
                                    <span style="color: #0bb288; font-family: 'Pacifico', cursive">Everyone</span>
                                </h6>
                            </div>
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="-mr-16 collapse navbar-collapse sub-menu-bar flex flex-row items-center" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item my-auto"><a class="page-scroll active" href="#">Home</a></li>
                                <li class="nav-item my-auto"><a class="page-scroll" href="#">About</a></li>
                                <li class="nav-item my-auto"><a target="_blank" href="#">Diagnosis</a></li>
                                <li class="nav-item my-auto"><a target="_blank" href="#">Contact</a></li>
                                <li class="nav-item my-auto"><a href="/login">Login</a></li>
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="/register">
                                        <button class="signUpbtn">SignUp</button>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
@endif

    <div class="container mt-40">
        <h4 class="font-semibold text-gray-700 mb-4"> Here is the list of available doctors </h4>
        <div class="flex flex-row">
            <div class="w-1/4" style="width: 22%" id="info-card">
                <div class="px-9 pt-4 pb-5 border-2 border-green-400 rounded-xl bg-white mt-2">
                    <h4 class="text-sm font-normal text-gray-700 mb-2">Selected Disease</h4>
                    <hr class="border-t border-gray-300 my-2">
                    <p class="text-2xl font-bold text-gray-900 mb-4"> {{ request('disease') }}</p>

                    <h5 class="text-sm font-normal text-gray-700 mb-2">Symptoms</h5>
                    <hr class="border-t border-gray-300 my-2">
                    <ul class="list-decimal list-inside text-sm text-gray-700 space-y-1">
                        @php
                            $symptoms = json_decode(request('symptoms'), true);
                        @endphp
                        @foreach($symptoms as $sym)
                            @php
                                $sym = str_replace('_', ' ', $sym ?? '');
                            @endphp
                            <li>
                                @if($sym)
                                    {{ $sym }}
                                @else
                                    <span class="text-center"> - </span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="w-3/4 ml-5" style="margin-right: -30px; margin-left: 30px">
                <div id="doctorList" class="row">
                    @php
                        $input_query = request('speciality') ?: '';
                        $filter_doctors = $doctors->filter(function($doctor) use ($input_query) {
                                                return stripos($doctor->dept_name, $input_query) !== false;
                        });
                    @endphp
                    @foreach($filter_doctors as $dd)
                        <div class="col-md-6">
                            <div class="w-72 flex flex-row">
                                <span class="doctor-card-tag">&#8226; Real-time Booking</span>
                                <span class="doctor-card-tag">&#8226; Fitfinity</span>
                            </div>
                            <div class="doctor-card w-full border-gray-300 shadow shadow-gray-200 rounded-xl">
                                <div class="w-2/3">
                                    <h4 class="mb-2 font-semibold"> {{ $dd -> doctor_name }} </h4>
                                    <span style="font-size: 13px" class="text-gray-700 mb-1">Email: <span class="text-right"> {{ $dd -> email }} </span></span>
                                    <span style="font-size: 13px" class="text-gray-700 mb-1">Tel: <span class="text-right">{{ $dd -> phone }}</span></span>
                                    <span style="font-size: 13px" class="text-gray-700 mb-1">Department: <span class="text-right">{{ $dd -> dept_name }}</span></span> <br>
                                    <span style="font-size: 13px" class="text-gray-700 mb-3">Role: <span class="text-right">{{ $dd -> role_name }}</span></span>
                                    <a target="" href="/dr_booking?id={{ $dd -> id }}&symptoms={{ request('symptoms') }}" style="background: #0bb288" class="text-white px-3 py-2 text-sm rounded-lg font-poppins font-semibold">Make Appointment</a>
                                </div>
                                <img class="user-img w-1/3" src="{{ (Str::startsWith($dd->doctor_name, 'U')) ? Vite::asset('assets/images/doctorProfile/maleDr.png') : Vite::asset('assets/images/doctorProfile/femaleDr.png') }}" alt="Doctor Image" />
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

    <a href="" class="scroll-top">
        <i class="lni lni-arrow-up"></i>
    </a>
    <script>
        window.addEventListener('scroll', function() {
            const scrollTopButton = document.querySelector('.scroll-top');
            if (window.pageYOffset > 300) {
                scrollTopButton.classList.add('show');
            } else {
                scrollTopButton.classList.remove('show');
            }
        });

        document.querySelector('.scroll-top').addEventListener('click', function(event) {
            event.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

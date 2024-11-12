<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Fitfinity</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="icon" href="{{ Vite::asset('assets/images/logo/logo.svg') }}"/>

    <!-- Tailwind CSS CDN -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet"/>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Place favicon.ico in the root directory -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@500&display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet"/>
    <!-- ========================= CSS here ========================= -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"/>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/bootstrap-5.0.5-alpha.min.css') }}"/>
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/LineIcons.2.0.css') }}"/>
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/animate.css') }}"/>
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/tiny-slider.css') }}"/>
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/main.css') }}"/>
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
            padding: 10px 25px;
        }

        .dropdown-item:hover {
            background: transparent;
            color: darkred;
        }

        .doctor-card {
            background-color: #ffffff;
            padding: 20px;
            margin-bottom: 25px;
            display: flex;
            flex-direction: row;
            align-items: center;
            border-radius: 10px;
            width: 655px;
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

        .navbar-area {
            padding: 0;
        }

        .navbar {
            padding: 0;
        }

        .nav-item {
            margin-top: 5px; /* Adjust the margin as needed to fit your design */
        }

        .navbar-brand {
            margin-left: -10px; /* Fine-tune the left margin for the logo */
        }

        .navbar-toggler {
            padding: 0.25rem; /* Adjust the padding of the toggler */
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
    </style>
    @vite(['resources/css/main.css', 'resources/js/main.js'])
</head>
<body>

@if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let errorMessages = @json($errors->all());
            let errorMessage = errorMessages.map(error => `<li>${error}</li>`).join('');

            // Set the error message in the custom alert box
            let alertMessageElement = document.getElementById('alert_message');
            if (alertMessageElement) {
                alertMessageElement.innerHTML = `<ul>${errorMessage}</ul>`;
            }

            // Show the custom alert box for errors
            let alertBox = document.getElementById('custom-alert');
            if (alertBox) {
                alertBox.classList.remove('hidden', 'bg-green-200', 'text-green-800');
                alertBox.classList.add('bg-red-200', 'text-red-800');
                document.getElementById('alert-title').textContent = 'Error';
                alertBox.classList.remove('hidden'); // Make sure the alert is visible
            }
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let successMessage = @json(session('success'));

            // Set the success message in the custom alert box
            let alertMessageElement = document.getElementById('alert_message');
            if (alertMessageElement) {
                alertMessageElement.innerHTML = successMessage;
            }

            // Show the custom alert box for success
            let alertBox = document.getElementById('custom-alert');
            if (alertBox) {
                alertBox.classList.remove('hidden', 'bg-red-200', 'text-red-800');
                alertBox.classList.add('bg-green-200', 'text-green-800');
                document.getElementById('alert-title').textContent = 'Success';
                alertBox.classList.remove('hidden'); // Make sure the alert is visible
            }
        });
    </script>
@endif

<div id="custom-alert" class="bg-red-100 border border-red-200 text-sm text-red-800 rounded-lg p-4 hidden" role="alert" tabindex="-1" aria-labelledby="hs-soft-color-danger-label">
    <span id="alert_message"></span>
    <span id="alert-title"></span>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const alertBox = document.getElementById('custom-alert');
        if (alertBox && !alertBox.classList.contains('hidden')) {
            setTimeout(() => {
                alertBox.classList.add('hidden');
            }, 3000);
        }
    });
</script>
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
                <div class="mx-8 max-w-screen-lg px-2">
                    <nav class="navbar navbar-expand-lg">
                        <a class="-ml-5 navbar-brand d-flex align-items-center" href="#">
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

                        <div class="-mr-56 collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto flex flex-row items-center">
                                <li class="nav-item active mt-2.5 items-center"><a class="page-scroll" href="/">Home</a></li>
                                <li class="nav-item mt-1.5 items-center"><a class="page-scroll" href="#about">About</a></li>
                                <li class="nav-item mt-1.5 items-center"><a class="" href="/med_ai">Diagnosis</a></li>
                                <li class="nav-item mt-1.5 items-center "><a target="_blank" class="" href="/doctor_search">Doctors</a></li>
                                <li class="nav-photo mt-3 -mb-1 ml-3 items-center">
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
                                                    <i class="fas fa-sign-out-alt"></i> <span class="text-sm ml-2">Logout</span>
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

                        <div class="-mr-16 collapse navbar-collapse sub-menu-bar flex flex-row items-center"
                             id="navbarSupportedContent">
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

<div class="container ml-5">
    <h4 class="mt-5 font-semibold" style="color: #00594d; margin-bottom: 10px;"> You can make appointment here </h4>
    <div class="mt-4">
        @php
            $doctorID = request('id');
            $patientID = auth() -> guard('web') -> user() -> id;

            $filter_doctor = $doctors -> filter(function ($doctor) use ($doctorID) {
                return $doctor->id == $doctorID;
            });
        @endphp
    </div>
    <div class="">
        @foreach($filter_doctor as $fd)
            <div class="doctor-card w-full border-gray-300 shadow shadow-gray-200 rounded-xl px-6 pt-4">
                <div class="w-4/5 ml-2">
                    <h4 class="mb-2 font-semibold"> {{ $fd -> doctor_name }} </h4>
                    <span style="font-size: 13px" class="text-gray-700 mb-1">Department: <span class="text-right">{{ $fd -> dept_name }}</span></span> <br>
                    <span style="font-size: 13px" class="text-gray-700 mb-3">Role: <span class="text-right">{{ $fd -> role_name }}</span></span>
                    <span style="font-size: 13px" class="text-gray-700 mb-3">{{ $fd -> qualifications }}</span>
                </div>
                <img class="user-img w-2/5" src="{{ (Str::startsWith($fd->doctor_name, 'U')) ? Vite::asset('assets/images/doctorProfile/maleDr.png') : Vite::asset('assets/images/doctorProfile/femaleDr.png') }}" alt="Doctor Image" />
            </div>
        @endforeach
    </div>

    <!-- Query to retrieve doctor's schedule -->
    <div class="bg-white px-5 py-2 rounded-xl mb-5">
        <h4 class="mt-4 font-semibold" style="color: #00594d; margin-bottom: 10px;">Doctor Schedule</h4>
        <table class="table">
            <thead>
                <tr style="border-bottom: 1px solid #E8BD70;">
                    <th>Day</th>
                    <th>Shift</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

            @php
                $doctorID = request('id');
                $filter_schedule = $schedules -> filter(function ($schedule) use ($doctorID) {
                    return ($schedule->doctor_id == $doctorID) !== false;
                });

                use Carbon\Carbon;

                $today = Carbon::now();
                $daysOfWeek = [
                    'Sunday' => Carbon::SUNDAY,
                    'Monday' => Carbon::MONDAY,
                    'Tuesday' => Carbon::TUESDAY,
                    'Wednesday' => Carbon::WEDNESDAY,
                    'Thursday' => Carbon::THURSDAY,
                    'Friday' => Carbon::FRIDAY,
                    'Saturday' => Carbon::SATURDAY,
                ];
            @endphp
            @foreach($filter_schedule as $fs)
                @php
                    $scheduleDate = $today->copy()->next($daysOfWeek[$fs->day]);
                @endphp
                <tr class="" style="border-bottom: 1px solid #E8BD70">
                    <td class="">
                        <div class="grow">
                            <span class="block text-sm font-semibold text-gray-800"> {{ $fs->day }} </span>
                            <span class="block text-sm text-gray-500"> {{ $scheduleDate->format('d/m/Y') }}</span>
                        </div>
                    </td>
                    <td class=""> <span class="block text-sm font-semibold text-gray-800"> {{ $fs->shift }} </span> </td>
                    <td class="">
                        <form action="/make_appointment" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="text" name="patient_id" value="{{ $patientID }}" hidden>
                            <input type="number" name="schedule_id" value="{{ $fs -> id }}" hidden>
                            <input type="text" name="date" value="{{ $scheduleDate->format('Y-m-d') }}" hidden>
                            <input type="text" name="shift" value="{{ $fs -> shift }}" hidden>
                            <input type="text" name="symptoms" value="{{ request('symptoms') }}" hidden>
                            <button type="submit" style="background: #0bb288" class="text-white px-3 py-2 text-sm rounded-lg font-poppins font-semibold">Make Appointment</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
</html>

@php
    use Carbon\Carbon;
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required Meta Tags Always Come First -->
    <meta charset="utf-8">
    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1">
    <link rel="canonical" href="https://preline.co/">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">

    <meta name="twitter:site" content="@preline">
    <meta name="twitter:creator" content="@preline">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta name="twitter:description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta name="twitter:image" content="https://preline.co/assets/img/og-image.png">

    <meta property="og:url" content="https://preline.co/">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Preline">
    <meta property="og:title" content="Tailwind CSS Admin Template | Preline UI, crafted with Tailwind CSS">
    <meta property="og:description" content="Comprehensive overview with charts, tables, and a streamlined dashboard layout for easy data visualization and analysis.">
    <meta property="og:image" content="https://preline.co/assets/img/og-image.png">

    <!-- Title -->
    <title> FitFinity | Doctor Dashboard </title>
    <link rel="icon" href="{{ Vite::asset('assets/images/logo/logo.svg') }}"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="shortcut icon" href="../../../public/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts/dist/apexcharts.min.css">
    <style>
        .apexcharts-tooltip.apexcharts-theme-light
        {
            background-color: transparent !important;
            border: none !important;
            box-shadow: none !important;
        }
        .transition-colors {
            transition: color 0.2s, border-bottom-color 0.2s;
        }
        #custom-alert {
            transition: opacity 0.3s ease-in-out;
        }
        #custom-alert.hidden {
            opacity: 0;
            pointer-events: none;
        }
        .button-container {
            display: flex;
            justify-content: flex-end;
            gap: 0.5rem;
            padding-top: 1rem;
        }
    </style>
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-50">

<!-- HEADER -->
<header class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-signatureGreen border-b text-sm py-1 lg:ps-[260px]">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-4 lg:me-0 lg:hidden">
            <a class="flex-none rounded-md text-xl flex flex-row items-center font-semibold focus:outline-none focus:opacity-80" href="#">
                <img src="{{ Vite::asset('resources/images/FitFinityLogo.svg') }}" class="w-[70px] h-[70px]" alt="logo">
                <h2 class="font-bold text-[24px] -ml-4">FitFinity</h2>
            </a>
        </div>
        <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">
            <div id="digital-clock" class="md:block lg:block text-white font-semibold text-left">
                <div id="datetime"></div>
            </div>

            <div class="flex flex-row items-center justify-end gap-1">
                <button type="button" class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <!-- Dropdown -->
                <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                    <button id="hs-dropdown-account" type="button" class="size-[48px] mr-5 inline-flex justify-center items-center gap-x-3 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <div class="flex items-center gap-x-1 mr-20">
                            <span class="text-white font-semibold mr-2" style="white-space: nowrap;">{{ auth()->guard('doctor')->user()->doctor_name }}</span>
                            <img id="profile_avatar" src="{{ asset('storage/images/' . (Str::startsWith(auth()->guard('doctor')->user()->doctor_name, 'U') ? 'doctor_male.jpg' : 'doctor_female.jpg')) }}"
                                 alt="Profile Picture"
                                 class="rounded-full w-9 h-9">
                        </div>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                        <div class="py-3 px-5 bg-gray-100 rounded-t-lg">
                            <p class="text-sm text-gray-500">Signed in as</p>
                            <p class="text-xs font-medium text-gray-800">{{ auth() -> guard('doctor') -> user() -> email }}</p>
                        </div>
                        <div class="p-1.5 space-y-0.5">
                            <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-xs text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                                <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2" />
                                    <circle cx="9" cy="7" r="4" />
                                    <path d="M22 21v-2a4 4 0 0 0-3-3.87" />
                                    <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                </svg>
                                My Profile
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <script>
        function updateClock() {
            const now = new Date();
            const hours = now.getHours() % 12 || 12; // Convert to 12-hour format
            const minutes = now.getMinutes().toString().padStart(2, '0');
            const seconds = now.getSeconds().toString().padStart(2, '0');
            const ampm = now.getHours() >= 12 ? 'pm' : 'am';
            const timeString = `${hours}:${minutes}:${seconds} ${ampm}`;

            const day = now.getDate();
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
            const month = monthNames[now.getMonth()];
            const year = now.getFullYear();
            const dateString = `${month} ${day} ${year}`;

            document.getElementById('datetime').textContent = `${timeString}, ${dateString}`;
        }

        setInterval(updateClock, 1000); // Update the clock every second
        updateClock();
    </script>
</header>

<!--  MAIN CONTENT  -->
<div class="sticky top-0 inset-x-0 z-20 bg-white border-y px-4 sm:px-6 lg:px-8 lg:hidden">
    <div class="flex items-center py-2">
        <!-- Navigation Toggle -->
        <button type="button" class="size-8 flex justify-center items-center gap-x-2 border border-gray-200 text-gray-800 hover:text-gray-500 rounded-lg focus:outline-none focus:text-gray-500 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="dialog" aria-expanded="false" aria-controls="hs-application-sidebar" aria-label="Toggle navigation" data-hs-overlay="#hs-application-sidebar">
            <span class="sr-only">Toggle Navigation</span>
            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <rect width="18" height="18" x="3" y="3" rx="2" />
                <path d="M15 3v18" />
                <path d="m8 9 3 3-3 3" />
            </svg>
        </button>
        <!-- End Navigation Toggle -->

        <!-- Breadcrumb -->
        <ol class="ms-3 flex items-center whitespace-nowrap">
            <li class="flex items-center text-sm text-gray-800">
                Application Layout
                <svg class="shrink-0 mx-3 overflow-visible size-2.5 text-gray-400" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5 1L10.6869 7.16086C10.8637 7.35239 10.8637 7.64761 10.6869 7.83914L5 14" stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                </svg>
            </li>
            <li class="text-sm font-semibold text-gray-800 truncate" aria-current="page">
                Dashboard
            </li>
        </ol>
    </div>
</div>
<!-- The above codes are for mobile responsive -->

<!-- Sidebar -->
<div id="hs-application-sidebar" class="hs-overlay [--auto-close:lg] hs-overlay-open:translate-x-0 -translate-x-full transition-all duration-300 transform w-[250px] h-full hidden fixed inset-y-0 start-0 z-[60] bg-white border-e border-gray-200 lg:block lg:translate-x-0 lg:end-auto lg:bottom-0" role="dialog" tabindex="-1" aria-label="Sidebar">
    <div class="relative flex flex-col h-full max-h-full">
        <!-- Logo -->
        <div class="px-1 pt-2 flex flex-row items-center">
            <a class="rounded-xl text-xl flex flex-row items-center font-semibold focus:outline-none focus:opacity-80" href="#">
                <img src="{{ Vite::asset('assets/images/logo/logo.svg') }}" class="w-[30px] h-[30px] mt-2 ml-4 mr-2.5" alt="logo">
                <h2 class="font-bold text-[24px]">FitFinity</h2>
            </a>
        </div>

        <!-- Buttons -->
        <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">
                    <li>
                        <button id='dashboard-btn' onclick="showSection('dashboard-section')" class="hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="users-accordion-child">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg> <span class="-ml-1"> Dashboard </span>
                        </button>
                    </li>
                    <li>
                        <button type="button" onclick="showSection('health-record-section')" id='health-record-btn' class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                            <i class="fa-solid fa-laptop-medical"></i> Health Records
                        </button>
                    </li>
                    <li class="hs-accordion" id="account-accordion">
                        <button type="button" onclick="showSection('income-section')" id='income-btn' class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                            <i class="fa-solid fa-sack-dollar"></i> Income
                        </button>
                    </li>
                    <li class="hs-accordion" id="account-accordion">
                        <button type="button" onclick="showSection('account-section')" id='account-btn' class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                            <i class="fa-solid fa-user"></i> Account
                        </button>
                    </li>
                    <li class="absolute bottom-3">
                        <a href="/logout" type="submit" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100" aria-expanded="true" aria-controls="projects-accordion-child">
                            <i class="fa-solid fa-chevron-left"></i> <span class="ml-1 text-red-500">Logout </span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Content -->
<div id="dashboard-section" class="w-full lg:ps-64 transition-all duration-300">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <div id="appointment-div" class="gap-y-4">
            <div class="border border-gray-200 rounded-xl shadow-sm bg-white max-w-7xl mx-auto p-6 mb-7">
                <h2 class="text-lg font-semibold text-gray-800 mb-4"> Today's Appointments </h2>
                @if($appointments -> isEmpty())
                    <p class="text-center text-gray-600">No appointment today</p>
                @else
                    <div class="mx-5 grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        @foreach($appointments as $aa)
                            <div class="col-span-1 max-w-sm bg-white rounded-lg shadow-md p-6 space-y-4">
                                <div class="flex items-center space-x-4">
                                    <img class="w-14 h-14 rounded-full" src="{{ $aa -> photo ? asset('storage/' . $aa ->photo) : asset('storage/images/default_profile.jpg') }}" alt="Profile image">
                                    <div>
                                        <h2 class="text-md font-semibold"> {{ $aa -> username }}</h2>
                                        <p class="text-gray-500 text-xs">
                                            @php
                                                $birthDate = $aa -> date_of_birth;
                                                $bd = Carbon::createFromFormat('Y-m-d', $birthDate);
                                                $age = $bd->age;
                                            @endphp
                                            {{ $age }} yrs old</p>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-sm h-[65px]">
                                    @php
                                        $symptoms = explode(',', $aa->former_symptoms);
                                        $symptom1 = str_replace('_', ' ', $symptoms[0] ?? 'a symptom');
                                        $symptom2 = str_replace('_', ' ', $symptoms[1] ?? 'another symptom');
                                        $symptom3 = str_replace('_', ' ', $symptoms[2] ?? 'yet another symptom');
                                    @endphp
                                    Experiencing {{ $symptom1 }} with {{ $symptom2 }} and {{ $symptom3 }}.
                                </p>
                                @php
                                    $currentTime = Carbon::now();
                                    $shiftTimes = explode(' - ', $aa->shift);
                                    $shiftEnd = Carbon::createFromFormat('h:iA', $shiftTimes[1]);
                                @endphp
                                @if($aa->medical_record_id)
                                    <button class="fill-btn px-4 py-1.5 bg-signatureGreen text-sm text-white rounded-lg" disabled>
                                        Completed
                                    </button>
                                @elseif($currentTime->greaterThan($shiftEnd))
                                    <button class="fill-btn px-4 py-1.5 bg-red-200 text-sm text-gray-800 rounded-lg shadow" disabled>
                                        Expired
                                    </button>
                                @else
                                    <button class="fill-btn px-4 py-1.5 bg-gray-200 text-sm text-gray-800 rounded-lg shadow" data-appointment-id="{{ json_encode($aa) }}">
                                        Fill Records
                                    </button>
                                @endif
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
            <div class="border border-gray-200 rounded-xl shadow-sm bg-white max-w-7xl mx-auto p-6 -mt-2">
                <h2 class="text-lg font-semibold text-gray-800 mb-4"> Upcoming Appointments </h2>
                @if($upcomingAppointments -> isEmpty())
                    <p class="text-center text-gray-600"> No upcoming appointments </p>
                @else
                    <div class="mx-5 grid sm:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                        @foreach($upcomingAppointments as $aa)
                            <div class="col-span-1 max-w-sm bg-white rounded-lg shadow-md p-6 space-y-4">
                                <div class="flex items-center space-x-4">
                                    <img class="w-14 h-14 rounded-full" src="{{ $aa -> photo ? asset('storage/' . $aa ->photo) : asset('storage/images/default_profile.jpg') }}" alt="Profile image">
                                    <div>
                                        <h2 class="text-md font-semibold"> {{ $aa -> username }}</h2>
                                        <p class="text-gray-500 text-xs">
                                            @php
                                                $birthDate = $aa -> date_of_birth;
                                                $bd = Carbon::createFromFormat('Y-m-d', $birthDate);
                                                $age = $bd->age;
                                            @endphp
                                            {{ $age }} yrs old</p>
                                    </div>
                                </div>
                                <p class="text-gray-700 text-sm">
                                    Booked for {{ $aa -> date }}
                                </p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
        <div id="patient-record" class="rounded-xl bg-white border-t-4 border-customGreen3 shadow max-w-7xl mx-8 p-6 -mt-3.5 hidden">
            <form action="/add_record" method="post" enctype="multipart/form-data">
                @csrf
                <h2 class="text-xl font-semibold text-gray-800 mb-1.5"> Patient Record </h2>
                <div class="my-14 customXS:m-6 sm:m-10">
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="appointment-id" id="appointment_id" hidden>
                        <div class="flex flex-col col-span-1 space-y-7 pb-4 sm:pr-4 sm:vertical-line">
                            <div class="flex flex-col space-y-2">
                                <div class="flex flex-col sm:flex-row items-center space-x-6">
                                    <i class="fa-solid fa-user"></i>
                                    <label for="patient_name" class="pt-1">Patient Name</label>
                                    <div class="flex-1 bg-white flex max-h-10 items-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                        <x-form-input type="text" name="patient_name" id="patient_name" class="font-semibold" readonly> </x-form-input>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex flex-col col-span-1 space-y-7 pb-4 sm:pr-4 sm:vertical-line">
                            <div class="flex flex-col space-y-2">
                                <div class="flex flex-col sm:flex-row items-center space-x-6">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <label for="allergies" class="pt-1">Allergies</label>
                                    <div class="flex-1 bg-white flex max-h-10 items-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                        <x-form-input type="text" name="allergies" id="allergies" required> </x-form-input>
                                    </div>
                                </div>
                                <x-form_error :class="'font-semibold'" name="allergies" />
                            </div>
                        </div>
                        <div class="flex flex-col col-span-1 space-y-7 pb-4 sm:pr-4 sm:vertical-line">
                            <div class="flex flex-col space-y-2">
                                <div class="flex flex-col sm:flex-row items-center space-x-6">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <label for="surgical_history" class="pt-1">Surgical history</label>
                                    <div class="flex-1 bg-white flex max-h-10 items-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                        <x-form-input type="text" name="surgery_history" id="surgery_history" required> </x-form-input>
                                    </div>
                                </div>
                                <x-form_error :class="'font-semibold'" name="surgery_history" />
                            </div>
                        </div>
                        <div class="flex flex-col col-span-1 space-y-7 pb-4 sm:pr-4 sm:vertical-line">
                            <div class="flex flex-col space-y-2">
                                <div class="flex flex-col sm:flex-row items-center space-x-6">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <label for="family_history" class="pt-1">Family history</label>
                                    <div class="flex-1 bg-white flex max-h-10 items-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                        <x-form-input type="text" name="family_history" id="family_history" required> </x-form-input>
                                    </div>
                                </div>
                                <x-form_error :class="'font-semibold'" name="family_history" />
                            </div>
                        </div>
                        <div class="flex flex-col col-span-1 space-y-7 sm:pr-4 sm:vertical-line">
                            <div class="flex flex-col space-y-2">
                                <div class="flex flex-col sm:flex-row items-center space-x-6">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <label for="past_med_history" class="pt-1">Past Medical history</label>
                                    <div class="flex-1 bg-white flex max-h-10 items-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                        <x-form-input type="text" name="past_med_history" id="past_med_history" required> </x-form-input>
                                    </div>
                                </div>
                                <x-form_error :class="'font-semibold'" name="past_med_history" />
                            </div>
                        </div>
                        <div class="flex flex-col col-span-1 space-y-7 sm:pr-4 sm:vertical-line">
                            <div class="flex flex-col space-y-2">
                                <div class="flex flex-col sm:flex-row items-center space-x-6">
                                    <i class="fa-solid fa-pen-to-square"></i>
                                    <label for="current_disease" class="pt-1">Current Disease</label>
                                    <div class="flex-1 bg-white flex max-h-10 items-center border-b-2 px-3 py-0 focus-within:shadow-inner">
                                        <x-form-input type="text" name="current_disease" id="current_disease" required> </x-form-input>
                                    </div>
                                </div>
                                <x-form_error :class="'font-semibold'" name="current_disease" />
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="col-span-2 border-black/25 my-3">

                <h2 class="text-xl font-semibold text-gray-800">Medication</h2>
                <div class="my-4 customXS:mx-6 sm:mx-10">
                    <div class="flex flex-col col-span-2 space-y-7 pb-2 sm:pr-4 sm:vertical-line">
                        <div class="relative">
                            <textarea id="medications_data" name="medications_data" class="peer p-4 block w-full border-customGreen3 rounded-lg text-sm placeholder:text-transparent focus:border-customGreen2 focus:ring-customGreen2 disabled:opacity-50 disabled:pointer-events-none focus:pt-6 focus:pb-2 [&:not(:placeholder-shown)]:pt-6 [&:not(:placeholder-shown)]:pb-2 autofill:pt-6 autofill:pb-2" placeholder="Enter medications and dosages" required ></textarea>
                            <label for="medications_data" class="absolute top-0 start-0 p-4 h-full text-sm truncate pointer-events-none transition ease-in-out duration-100 border border-transparent origin-[0_0] dark:text-white peer-disabled:opacity-50 peer-disabled:pointer-events-none peer-focus:text-xs peer-focus:-translate-y-1.5 peer-focus:text-gray-500 peer-[:not(:placeholder-shown)]:text-xs peer-[:not(:placeholder-shown)]:-translate-y-1.5 peer-[:not(:placeholder-shown)]:text-gray-500 "
                            >Medications</label>
                        </div>
                        <x-form_error :class="'font-semibold'" name="medications_data" />
                    </div>
                </div>

                <div class="button-container col-span-2 flex flex-col sm:flex-row justify-end gap-2">
                    <button type="submit" id="create-btn" class="inline-flex items-center px-3 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const appointmentDiv = document.getElementById('appointment-div');
            const patientRecord = document.getElementById('patient-record');
            const appointmentIdInput = document.getElementById('appointment_id');
            const patientNameInput = document.getElementById('patient_name');

            appointmentDiv.addEventListener('click', function (e) {
                if (e.target.classList.contains('fill-btn')) {
                    const appointmentData = JSON.parse(e.target.getAttribute('data-appointment-id'));
                    const aaUsername = e.target.getAttribute('data-username');

                    appointmentIdInput.value = appointmentData.appointment_id;
                    console.log(appointmentIdInput.value);
                    patientNameInput.value = appointmentData.username;

                    patientRecord.classList.remove('hidden');
                    appointmentDiv.classList.add('hidden');
                }
            });
        });

    </script>
</div>

<!-- Account -->
<div id="account-section" class="w-full h-[100%] lg:pl-72 py-5 pr-10 transition-all duration-300">
    <div class="w-full max-w-4xl mx-auto p-5 pb-5 gap-7 columns-2 space-y-5">
        <div class="col-span-1 max-w-sm bg-white rounded-lg shadow-md p-6 space-y-4">
            <div class="flex items-center space-x-4">
                <img class="w-14 h-14 rounded-full" src="{{ asset('storage/images/' . (Str::startsWith(auth()->guard('doctor')->user()->doctor_name, 'U') ? 'doctor_male.jpg' : 'doctor_female.jpg')) }}" alt="Profile image">
                <div>
                    <h2 class="text-md font-semibold"> {{ auth() -> guard('doctor') -> user() -> doctor_name }}</h2>
                    <p class="text-gray-500 text-xs">
                        {{ auth() -> guard('doctor') -> user() -> email }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Update Password Section -->
        <div class="bg-white shadow rounded-lg p-6 h-[420px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Update Password</h2>
            <p class="text-sm text-gray-600 mb-6">Ensure your account is using a strong password to stay secure.</p>
            <form action="/dr_password_update" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-4 relative">
                    <label for="old-password" class="block text-sm font-medium text-gray-700">Current Password</label>
                    <div class="relative">
                        <input type="password" id="old_password" name="old_password"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-customGreen2 cursor-pointer" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="togglePassword('old_password')">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-sm font-medium text-gray-700">New Password</label>
                    <div class="relative">
                        <input type="password" id="password" name="password"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-customGreen2 cursor-pointer" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="togglePassword('password')">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
                    <div class="relative">
                        <input type="password" id="password_confirmation" name="password_confirmation" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-customGreen2 cursor-pointer" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" onclick="togglePassword('password_confirmation')">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                    </div>
                </div>
                <button id="edit_btn" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </form>
        </div>

        <!-- Profile Information Section -->
        <div class="bg-white shadow rounded-lg px-6 py-6 h-[330px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Profile Information</h2>
            <p class="text-sm text-gray-600 mb-6">Update your name and email address.</p>
            <form action="/dr_account_update" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="doctor_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name='doctor_name' id="doctor_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ auth() -> guard('doctor') -> user() -> doctor_name }}">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name='email' id="email"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ auth() -> guard('doctor') -> user() -> email }}">
                </div>
                <button id="edit_btn" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </form>
        </div>

        <!-- Contact Info Section -->
        <div class="bg-white shadow rounded-lg p-6 h-[240px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Contact Info</h2>
            <p class="text-sm text-gray-600 mb-6">Keep in touch with us by providing your contact</p>

            <form action="/dr_account_update" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700"> Phone Number </label>
                    <input type="text"  name='phone' id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" value="{{ auth() -> guard('doctor') -> user() -> phone }}">
                </div>

                <button id="edit_btn" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">Save</button>
            </form>
        </div>
    </div>
</div>

<!-- Income -->
<div id="income-section" class="w-full lg:ps-64 transition-all duration-300">
    <div class="border border-gray-200 rounded-xl shadow-sm bg-white max-w-7xl mx-6 my-6 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4"> Today's Income </h2>
        <table class="min-w-full divide-y divide-gray-200 table-fixed border-b-2 border-gray-100">
            <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="w-1/4 ps-8 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Time</span>
                    </div>
                </th>
                <th scope="col" class="w-1/48 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Patient Name</span>
                    </div>
                </th>
                <th scope="col" class="w-1/4 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Fee Charged</span>
                    </div>
                </th>
                <th scope="col" class="w-1/4 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Payment Status</span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($doctor_today_income as $dti)
                <tr>
                    <td class="w-1/4 ps-8 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">
                                 @php
                                    $appointmentTime = $dti -> created_at;
                                    $time = date("H:i:s", strtotime($appointmentTime));
                                 @endphp
                                {{ $time }}
                        </span>
                    </td>
                    <td class="w-1/4 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $dti -> username}}</span>
                    </td>
                    <td class="w-1/4 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $dti->basic_salary }} </span>
                    </td>
                    <td class="w-1/4 py-3 text-start">
                        <span class="ml-0 py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </svg>
                            Completed
                        </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="border border-gray-200 rounded-xl shadow-sm bg-white max-w-7xl mx-6 my-6 p-6">
        <h2 class="text-lg font-semibold text-gray-800 mb-4"> Monthly Income </h2>
        <table class="min-w-full divide-y divide-gray-200 table-fixed border-b-2 border-gray-100">
            <thead class="bg-gray-100">
            <tr>
                <th scope="col" class="w-1/3 ps-8 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Date</span>
                    </div>
                </th>
                <th scope="col" class="w-1/3 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Total Patients</span>
                    </div>
                </th>
                <th scope="col" class="w-1/3 py-3 text-start">
                    <div class="flex items-center gap-x-2">
                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Fee Charged</span>
                    </div>
                </th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
            @foreach($doctor_monthly_income as $dmi)
                <tr>
                    <td class="w-1/3 ps-8 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">
                            {{ $dmi -> date }}
                        </span>
                    </td>
                    <td class="w-1/3 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $dmi -> patient_count}}</span>
                    </td>
                    <td class="w-1/3 py-3 text-start">
                        <span class="block text-sm font-semibold text-gray-800">{{ $dmi-> basic_salary * $dmi-> patient_count}} </span>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Health Records -->
<div id="health-record-section" class="w-full lg:ps-64 transition-all duration-300">
    <div class="border border-gray-200 rounded-xl shadow-sm bg-white max-w-7xl mx-6 mt-6 p-6">
        <h2 class="text-[22px] font-semibold text-gray-800 mb-2 text-center">Medical Records Folder</h2>
        <div class="relative">
            <i class="absolute fa fa-search text-gray-400 top-4 left-4"></i>
            <input type="text" id="search" class="bg-white h-11 w-full px-12 rounded-lg focus:outline-none hover:cursor-pointer" placeholder="Search...">
            <span class="absolute top-2.5 right-5 border-l pl-4"><i class="fa-solid fa-laptop-medical"></i></span>
        </div>

        <div id="display-input" class="mt-2 text-sm text-gray-700"></div>
        <script>
            const searchInput = document.getElementById('search');

            searchInput.addEventListener('input', function() {
                const query_data = this.value;
                location.href = `?search_query=${query_data}`;
            });
        </script>
        <div class="overflow-x-auto">
            <table class="min-w-[1000px] divide-y divide-gray-200 table-fixed border-b-2 border-gray-100 mt-4">
                <thead class="bg-gray-100">
                <tr>
                    <th scope="col" class="w-1/5 ps-8 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Date</span>
                        </div>
                    </th>
                    <th scope="col" class="w-1/5 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Patient Name</span>
                        </div>
                    </th>
                    <th scope="col" class="w-1/5 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Doctor</span>
                        </div>
                    </th>
                    <th scope="col" class="w-1/5 py-3 text-start">
                        <div class="flex items-center gap-x-2">
                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Medical History</span>
                        </div>
                    </th>
                    <th scope="col" class="w-[60%] py-3 text-start">
                        <div class="flex items-center gap-x-2">
                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Treatment</span>
                        </div>
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                @php
                    $input_query = request('search_query') ?: '';
                    $filter_record = $all_record->filter(function($record) use ($input_query) {
                                            return stripos($record->username, $input_query) !== false ||
                                                   stripos($record->doctor_name, $input_query) !== false ||
                                                   stripos($record->current_disease, $input_query) !== false ||
                                                   stripos($record->medications, $input_query) !== false;
                    });
                @endphp
                @foreach($filter_record as $fr)
                    <tr>
                        <td class="w-1/5 ps-8 py-3 text-start">
                            <span class="block text-sm font-semibold text-gray-800">{{ $fr->date }}</span>
                        </td>
                        <td class="w-1/5 py-3 text-start">
                            <span class="block text-sm font-semibold text-gray-800">{{ $fr->username }}</span>
                        </td>
                        <td class="w-1/5 py-3 text-start">
                            <span class="block text-sm font-semibold text-gray-800">{{ $fr->doctor_name }}</span>
                            <span class="block text-xs text-gray-800">{{ $fr->dept_name }}</span>
                        </td>
                        <td class="w-1/5 py-3 text-start">
                            <span class="block text-sm font-semibold text-gray-800">{{ $fr->current_disease }}</span>
                        </td>
                        <td class="w-[60%] py-3 text-start">
                            <span class="block text-sm font-semibold text-gray-800">{{ $fr->medications }}</span>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Alert Box -->
<div id="custom-alert" class="fixed top-4 left-1/2 transform -translate-x-1/2 w-full max-w-sm p-4 rounded-md shadow-md hidden z-50">
    <div class="flex justify-between items-center">
        <span id="alert-title" class="font-bold">Message</span>
        <button onclick="closeAlert()" class="text-current hover:text-dark">
            &times;
        </button>
    </div>
    <div id="alert-message" class="mt-2">
        <!-- Message will be inserted here -->
    </div>
</div>

<script>
    function closeAlert() {
        document.getElementById('custom-alert').classList.add('hidden');
    }
</script>

<!-- JS PLUGINS -->
<!-- Required plugins -->
<script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

<!-- Show Section JS -->
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const activeSection = localStorage.getItem('activeSection') || 'dashboard-section'; // default to dashboard
        showSection(activeSection);
    });

    function showSection(sectionId) {
        document.querySelectorAll('div[id$="-section"]').forEach(section => {
            if (section.id !== sectionId) {
                section.style.display = 'none';
            }
        });

        const activeSection = document.getElementById(sectionId);
        if (activeSection) {
            activeSection.style.display = 'block';
            localStorage.setItem('activeSection', sectionId);
        }
    }
</script>

<script>
    function togglePassword(id) {
        var x = document.getElementById(id);
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function previewImage(event) {
        const reader = new FileReader();
        reader.onload = function(){
            const output = document.getElementById('profileImage');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files[0]);
    }
</script>

@if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let errorMessages = @json($errors->all());
            let errorMessage = errorMessages.map(error => `<li>${error}</li>`).join('');

            // Set the error message in the custom alert box
            document.getElementById('alert-message').innerHTML = `<ul>${errorMessage}</ul>`;

            // Show the custom alert box for errors
            let alertBox = document.getElementById('custom-alert');
            alertBox.classList.remove('hidden', 'bg-signatureGreen', 'text-green-800');
            alertBox.classList.add('bg-red-200', 'text-red-800');
            document.getElementById('alert-title').textContent = 'Error';
        });

        function closeAlert() {
            document.getElementById('custom-alert').classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const alertBox = document.getElementById('custom-alert');
            if (alertBox) {
                const timer = setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 4000);
            }
        });
    </script>
@endif

@if(session()->has('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let successMessage = @json(session('success'));

            // Set the success message in the custom alert box
            document.getElementById('alert-message').innerHTML = successMessage;

            // Show the custom alert box for success
            let alertBox = document.getElementById('custom-alert');
            alertBox.classList.remove('hidden', 'bg-red-200', 'text-red-800');
            alertBox.classList.add('bg-signatureGreen', 'text-green-800');
            document.getElementById('alert-title').textContent = 'Success';
        });

        function closeAlert() {
            document.getElementById('custom-alert').classList.add('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            const alertBox = document.getElementById('custom-alert');
            if (alertBox) {
                const timer = setTimeout(() => {
                    alertBox.classList.add('hidden');
                }, 3000);
            }
        });
    </script>
@endif
</body>
</html>

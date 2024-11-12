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
    <link rel="icon" href="{{ Vite::asset('assets/images/logo/logo.svg') }}"/>

    <!-- Title -->
    <title> Admin Dashboard </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="../../../public/favicon.ico">

    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Theme Check and Update -->
    <script>
        const html = document.querySelector('html');
        const isLightOrAuto = localStorage.getItem('hs_theme') === 'light' || (localStorage.getItem('hs_theme') === 'auto' && !window.matchMedia('(prefers-color-scheme: dark)').matches);
        const isDarkOrAuto = localStorage.getItem('hs_theme') === 'dark' || (localStorage.getItem('hs_theme') === 'auto' && window.matchMedia('(prefers-color-scheme: dark)').matches);

        if (isLightOrAuto && html.classList.contains('dark')) html.classList.remove('dark');
        else if (isDarkOrAuto && html.classList.contains('light')) html.classList.remove('light');
        else if (isDarkOrAuto && !html.classList.contains('dark')) html.classList.add('dark');
        else if (isLightOrAuto && !html.classList.contains('light')) html.classList.add('light');
    </script>

    <!-- Apexcharts -->
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
    </style>
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">
</head>
<body class="bg-gray-50">

<!-- ========== HEADER ========== -->
<header class="sticky top-0 inset-x-0 flex flex-wrap md:justify-start md:flex-nowrap z-[48] w-full bg-white border-b text-sm py-2.5 lg:ps-[260px]">
    <nav class="px-4 sm:px-6 flex basis-full items-center w-full mx-auto">
        <div class="me-4 lg:me-0 lg:hidden">
            <a class="flex-none rounded-md text-xl flex flex-row items-center font-semibold focus:outline-none focus:opacity-80" href="#">
                <img src="{{ Vite::asset('resources/images/FitFinityLogo.svg') }}" class="w-[70px] h-[70px]" alt="logo">
                <h2 class="font-bold text-[24px] -ml-4">FitFinity</h2>
            </a>
        </div>
        <div class="w-full flex items-center justify-end ms-auto md:justify-between gap-x-1 md:gap-x-3">
            <div class="hidden md:block">
                <!-- Search Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none z-20 ps-3.5">
                        <svg class="shrink-0 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" />
                            <path d="m21 21-4.3-4.3" />
                        </svg>
                    </div>
                    <input type="text" class="py-2 ps-10 pe-16 block w-full bg-white border-gray-200 rounded-lg text-sm focus:outline-none focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search">
                    <div class="hidden absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-1">
                        <button type="button" class="inline-flex shrink-0 justify-center items-center size-6 rounded-full text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 " aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="10" />
                                <path d="m15 9-6 6" />
                                <path d="m9 9 6 6" />
                            </svg>
                        </button>
                    </div>
                    <div class="absolute inset-y-0 end-0 flex items-center pointer-events-none z-20 pe-3 text-gray-400">
                        <svg class="shrink-0 size-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M15 6v12a3 3 0 1 0 3-3H6a3 3 0 1 0 3 3V6a3 3 0 1 0-3 3h12a3 3 0 1 0-3-3" />
                        </svg>
                        <span class="mx-1">
                            <svg class="shrink-0 size-3 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                              <path d="M5 12h14" />
                              <path d="M12 5v14" />
                            </svg>
                        </span>
                        <span class="text-xs">/</span>
                    </div>
                </div>
            </div>

            <div class="flex flex-row items-center justify-end gap-1">
                <button type="button" class="md:hidden size-[38px] relative inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-full border border-transparent text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 disabled:opacity-50 disabled:pointer-events-none">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <span class="sr-only">Search</span>
                </button>

                <div class="hs-dropdown [--placement:bottom-right] relative inline-flex">
                    <button id="hs-dropdown-account" type="button" class="size-[48px] mr-5 inline-flex justify-center items-center gap-x-3 text-sm font-semibold rounded-full border border-transparent text-gray-800 focus:outline-none disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <div class="flex items-center">
                            <img id="profile_avatar" src="{{ auth()->guard('admin')->user()-> photo ? asset('storage/' . auth()->guard('admin')->user()->photo) : asset('storage/images/default_profile.jpg') }}" alt="Profile Picture" class="rounded-full border-2 border-gray-400 w-9 h-9">
                        </div>
                    </button>

                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 after:h-4 after:absolute after:-bottom-4 after:start-0 after:w-full before:h-4 before:absolute before:-top-4 before:start-0 before:w-full" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-account">
                        <div class="py-3 px-5 bg-gray-100 rounded-t-lg">
                            <p class="text-sm text-gray-500">Signed in as</p>
                            <p class="text-xs font-medium text-gray-800">{{ auth() -> guard('admin') -> user() -> email }}</p>
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
</header>

<!-- ========== MAIN CONTENT ========== -->
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
            <a class="rounded-xl mt-4 text-xl flex flex-row items-center font-semibold focus:outline-none focus:opacity-80" href="#">
                <img src="{{ Vite::asset('assets/images/logo/logo.svg') }}" class="w-[35px] h-[35px] ml-3 mx-2" alt="logo">
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

                    <li class="hs-accordion" id="users-accordion">
                        <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="users-accordion-child">
                            <i class="fa-solid fa-coins "></i> <span> Finance </span>

                            <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m18 15-6-6-6 6" />
                            </svg>

                            <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m6 9 6 6 6-6" />
                            </svg>
                        </button>

                        <div id="users-accordion-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="region" aria-labelledby="users-accordion">
                            <ul class="hs-accordion-group ps-8 pt-1 space-y-1" data-hs-accordion-always-open>
                                <li class="hs-accordion" id="users-accordion-sub-1">
                                    <button type="button" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal " aria-expanded="true" aria-controls="users-accordion-sub-1-child">
                                        Sub Menu 1
                                        <svg class="hs-accordion-active:block ms-auto hidden size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m18 15-6-6-6 6" />
                                        </svg>
                                        <svg class="hs-accordion-active:hidden ms-auto block size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="m6 9 6 6 6-6" />
                                        </svg>
                                    </button>
                                    <div id="users-accordion-sub-1-child" class="hs-accordion-content w-full overflow-hidden transition-[height] duration-300 hidden" role="region" aria-labelledby="users-accordion-sub-1">
                                        <ul class="pt-1 space-y-1">
                                            <li>
                                                <button onclick="showSection('finance-section')" id='finance-btn' class="hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal">
                                                    Monthly Data
                                                </button>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <button type="button" onclick="showSection('doctor-list-section')" id='doctor-list-btn' class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                            <i class="fa-solid fa-stethoscope"></i> Doctor List
                        </button>
                    </li>

                    <li class="hs-accordion" id="account-accordion">
                        <button type="button" onclick="showSection('account-section')" id='account-btn' class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                            <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="18" cy="15" r="3" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M10 15H6a4 4 0 0 0-4 4v2" />
                                <path d="m21.7 16.4-.9-.3" />
                                <path d="m15.2 13.9-.9-.3" />
                                <path d="m16.6 18.7.3-.9" />
                                <path d="m19.1 12.2.3-.9" />
                                <path d="m19.6 18.7-.4-1" />
                                <path d="m16.8 12.3-.4-1" />
                                <path d="m14.3 16.6 1-.4" />
                                <path d="m20.7 13.8 1-.4" />
                            </svg> Account
                        </button>
                    </li>

                    <li class="hs-accordion" id="projects-accordion">
                        <a href="/adm_dashboard2" type="button" onclick="showSection('create-doctor-section')" id='create-doctor-btn' class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="projects-accordion-child">
                            <svg class="shrink-0 mt-0.5 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                            </svg> Create Doctor
                        </a>
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

<!-- Finance -->
<div id="finance-section" class="w-full lg:ps-[270px] transition-all duration-300" >
    <div class="flex flex-col my-5 mr-6">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="border rounded-lg divide-y bg-white w-full">
                    <div class="flex m-4 justify-between items-center">
                        <div class="relative max-w-xs flex flex-row">
                            <label for="hs-table-search" class="sr-only">Search</label>
                            <input type="date" name="hs-table-search" id="hs-table-search" class="py-2 px-3 ps-9 block w-full border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none" placeholder="Search by date">
                            <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-3">
                                <svg class="size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <path d="m21 21-4.3-4.3"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="text-gray-700 font-semibold">
                            <span id="selected-date-display">{{ \Carbon\Carbon::parse(request('specified-date') ?: now())->format('F j, Y') }}</span>
                        </div>
                    </div>


                    <input type="hidden" id="specified-date" name="specified-date" value="{{ now()->toDateString() }}">

                    <script>
                        const dateInput = document.getElementById('hs-table-search');
                        const specifiedDateInput = document.getElementById('specified-date');

                        // Set the input value to today's date by default
                        const today = new Date().toISOString().split('T')[0];
                        specifiedDateInput.value = today;

                        // Update the hidden input and perform the redirection when the date is changed
                        dateInput.addEventListener('input', function() {
                            const selectedDate = this.value;
                            specifiedDateInput.value = selectedDate;
                            location.href = `?specified-date=${selectedDate}`;
                        });
                    </script>

                    <div class="overflow-hidden mx-5">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead>
                            <tr>
                                <th scope="col" class="w-[10%] py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Date </span>
                                    </div>
                                </th>
                                <th scope="col" class="w-[19.28%] py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Doctor </span>
                                    </div>
                                </th>
                                <th scope="col" class="w-[13.56%] py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Position </span>
                                    </div>
                                </th>
                                <th scope="col" class="w-[14.29%] py-3">
                                    <div class="flex items-center text-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Total Patients </span>
                                    </div>
                                </th>
                                <th scope="col" class="w-[14.29%] py-3 px-3">
                                    <div class="flex items-center text-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Net Income </span>
                                    </div>
                                </th>
                                <th scope="col" class="w-[14.29%] px-3">
                                    <div class="flex items-center text-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Doctor's Pay </span>
                                    </div>
                                </th>
                                <th scope="col" class="w-[14.29%] py-3 px-3">
                                    <div class="flex items-center text-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Profit </span>
                                    </div>
                                </th>
                            </tr>
                            </thead>
                            <tbody class="divide-y divide-gray-200">
                            @php
                                $specifiedDate = request('specified-date') ?: now()->toDateString();
                                $groupedRecords = $medical_records->where('date', $specifiedDate)->groupBy('doctor_name');

                                $totalPatientsSum = 0;
                                $netIncomeSum = 0;
                                $doctorsPaySum = 0;
                                $profitSum = 0;
                            @endphp

                            @foreach($groupedRecords as $doctorName => $appointments)
                                @php

                                    $doctorPatientCount = $patientCount->where('doctor_name', $doctorName)
                                                                        ->where('date', $specifiedDate);
                                    $totalPatients = $doctorPatientCount->sum('total_patients');

                                    $roleName = $appointments->first()->role_name;
                                    $deptName = $appointments->first()->dept_name;
                                    $basicSalary = $appointments->first()->basic_salary;

                                    $netIncome = $totalPatients * ($basicSalary + 30000);
                                    $doctorsPay = $totalPatients * $basicSalary;
                                    $profit = $totalPatients * 30000;

                                    $totalPatientsSum += $totalPatients;
                                    $netIncomeSum += $netIncome;
                                    $doctorsPaySum += $doctorsPay;
                                    $profitSum += $profit;
                                @endphp
                                <tr>
                                    <td class="w-[15.28%] py-1.5 whitespace-nowrap text-sm text-gray-800">{{ $appointments->first()->date }}</td>
                                    <td class="w-[13.28%] py-1.5 whitespace-nowrap text-sm text-gray-800">
                                        <span class="text-sm text-gray-800">{{ $doctorName }}</span>
                                    </td>
                                    <td class="w-1/7 py-1.5 whitespace-nowrap text-sm text-gray-800">
                                        <div class="py-3">
                                            <span class="block text-sm font-semibold text-gray-800">{{ $roleName }}</span>
                                            <span class="block text-sm text-gray-500">{{ $deptName }}</span>
                                        </div>
                                    </td>
                                    <td class="w-1/7 py-1.5 whitespace-nowrap text-center text-sm text-gray-800">
                                        <span class="text-sm text-gray-800">{{ number_format($totalPatients) }}</span>
                                    </td>
                                    <td class="w-1/7 py-1.5 whitespace-nowrap text-center text-sm text-gray-800">
                                        <span class="text-sm text-gray-800">{{ number_format($totalPatients * ($basicSalary + 20000)) }}</span>
                                    </td>
                                    <td class="w-1/7 py-1.5 whitespace-nowrap text-center text-sm text-gray-800">
                                        <span class="text-sm text-gray-800">{{ number_format($totalPatients * $basicSalary) }}</span>
                                    </td>
                                    <td class="w-1/7 py-1.5 whitespace-nowrap text-center text-sm text-gray-800">
                                        <span class="text-sm text-gray-800">{{ number_format($totalPatients * 20000) }}</span>
                                    </td>
                                </tr>
                            @endforeach
                            <tr class="font-bold text-gray-800">
                                <td colspan="3" class="w-[38.56%] py-1.5 text-start">Total</td>
                                <td class="w-1/7 py-1.5 text-center">{{ number_format($totalPatientsSum) }}</td>
                                <td class="w-1/7 py-1.5 text-center">{{ number_format($netIncomeSum) }}</td>
                                <td class="w-1/7 py-1.5 text-center">{{ number_format($doctorsPaySum) }}</td>
                                <td class="w-1/7 py-1.5 text-center">{{ number_format($profitSum) }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content -->
<div id="dashboard-section" class="w-full lg:ps-64 transition-all duration-300">
    <div class="p-4 sm:p-6 space-y-4 sm:space-y-6">
        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-4 sm:gap-6">
            <!-- Card 1 -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500"> Total users </p>
                        <div class="hs-tooltip">
                            <!-- toggle -->
                            <div class="hs-tooltip-toggle">
                                <svg class="shrink-0 size-4 text-gray-500" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                    <circle cx="12" cy="12" r="10" />
                                    <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                    <path d="M12 17h.01" />
                                </svg>
                                <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm" role="tooltip"> The number of daily users </span>
                            </div>
                        </div>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ $userCount }}
                        </h3>
                        <span class="flex items-center gap-x-1 text-green-600">
                    <svg class="inline-block size-4 self-center" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                      <polyline points="22 7 13.5 15.5 8.5 10.5 2 17" />
                      <polyline points="16 7 22 7 22 13" />
                    </svg>
                    <span class="inline-block text-sm">
                      {{ $rate }}%
                    </span>
                </span>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="flex flex-col bg-white border shadow-sm rounded-xl">
                <div class="p-4 md:p-5">
                    <div class="flex items-center gap-x-2">
                        <p class="text-xs uppercase tracking-wide text-gray-500">
                            MedAI Bot Users
                        </p>
                    </div>

                    <div class="mt-1 flex items-center gap-x-2">
                        <h3 class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ $appointmentCount }}
                        </h3>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="sm:col-span-2 lg:col-span-2 w-full flex justify-center items-center">
                <div class="relative cursor-pointer dark:text-white">
                    <span class="absolute top-0 left-0 w-full h-full mt-0.5 ml-0.5 bg-signatureGreen rounded-lg"></span>
                    <div class="relative py-3.5 px-[82px] bg-white border-2 border-signatureGreen rounded-lg hover:scale-[1.025] transition duration-500">
                        <div class="flex items-center align-center">
                            <h3 class="mb-2 mt-1 ml-3 text-sm font-bold text-gray-800">Welcome Back, {{ auth()->guard('admin')->user()->admin_name  }}</h3>
                            <span class="text-xl -mt-2 pl-2">👋</span>
                        </div>
                        <p class="text-gray-600 text-xs text-center">
                            Your dashboard is waiting. Ready to help!
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-2 gap-4 sm:gap-6">
            <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl ">
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-sm text-gray-500 ">Income</h2>
                        @php
                            // Calculate total income for all records
                            $totalRecordsAllDay = \App\Models\Medical_record::all()->count();
                            $real_income_allDay = $totalRecordsAllDay * 30000;

                            // Calculate total income for today's records
                            $totalRecordsToday = \App\Models\Medical_record::whereDate('created_at', today())->count();
                            $real_income_today = $totalRecordsToday * 30000;
                        @endphp
                        @php
                            $today = date('Y-m-d');
                            $startDateThisWeek = date('Y-m-d', strtotime($today . ' -6 days'));
                            $endDateThisWeek = $today;

                            $thisWeekArray = [];
                            $currentDate = $startDateThisWeek;

                            // Use query builder to get the total patients per day
                            while($currentDate <= $endDateThisWeek){
                                $countByDayThis = $patientCount -> where('date', $currentDate)->sum('total_patients');
                                $incomeByDayThis = $countByDayThis * 30000;
                                $thisWeekArray[] = $incomeByDayThis;
                                $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
                            }

                            $thisWeekArrayJson = json_encode($thisWeekArray);

                            $startDateLastWeek = date('Y-m-d', strtotime($today . ' -13 days'));
                            $endDateLastWeek = date('Y-m-d', strtotime($today . ' -7 days'));

                            $lastWeekArray = [];
                            $currentDate = $startDateLastWeek;

                            // Use query builder to get the total patients per day
                            while($currentDate <= $endDateLastWeek){
                                $countByDayLast = $patientCount -> where('date', $currentDate)->sum('total_patients');
                                $incomeByDayLast = $countByDayLast * 30000;
                                $lastWeekArray[] = $incomeByDayLast;
                                $currentDate = date('Y-m-d', strtotime($currentDate . ' +1 day'));
                            }

                            $lastWeekArrayJson = json_encode($lastWeekArray);
                        @endphp


                        <p class="text-xl sm:text-2xl font-medium text-gray-800">{{ number_format($real_income_allDay) }}</p>
                    </div>

                    <div>
                      <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-teal-100 text-teal-800">
                        <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M12 5v14" />
                          <path d="m19 12-7 7-7-7" />
                        </svg>
                          @php
                            $todayIncomeRate = ($real_income_today/$real_income_allDay) * 100;
                          @endphp
                          {{ number_format($todayIncomeRate, 1) }}%
                      </span>
                    </div>
                </div>
                <div id="hs-line-chart"></div>
            </div>

            <!-- Card Visitor-->
            <div class="p-4 md:p-5 min-h-[410px] flex flex-col bg-white border shadow-sm rounded-xl">
                <!-- Header -->
                <div class="flex justify-between items-center">
                    <div>
                        <h2 class="text-sm text-gray-500">
                            Visitors
                        </h2>
                        <p class="text-xl sm:text-2xl font-medium text-gray-800">
                            {{ $appointmentCount }}
                        </p>
                    </div>

                    <div>
                      <span class="py-[5px] px-1.5 inline-flex items-center gap-x-1 text-xs font-medium rounded-md bg-red-100 text-red-800">
                        <svg class="inline-block size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                          <path d="M12 5v14" />
                          <path d="m19 12-7 7-7-7" />
                        </svg>
                          @php
                              $totalAppointments = \App\Models\Appointment::count();
                              $todayAppointments = \App\Models\Appointment::where('date', today())->count();
                              $todayAppointmentRate = $totalAppointments > 0 ? ($todayAppointments / $totalAppointments) * 100 : 0;
                          @endphp
                          @php
                              $today = date('Y-m-d');
                              $lastDays = date('Y-m-d', strtotime($today . '-6 days'));
                              $dataArray = array();

                              while ($lastDays <= $today){
                                  $userCounting = \App\Models\Appointment::where('date', $lastDays)->count();
                                  $dataArray[] = $userCounting;
                                  $lastDays = date('Y-m-d', strtotime($lastDays . '+1 days'));
                              }

                              $dataArrayJson = json_encode($dataArray);
                          @endphp
                          {{ number_format($todayAppointmentRate, 1) }}%
                      </span>
                    </div>
                </div>

                <div id="hs-single-area-chart"></div>
            </div>
        </div>

        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                        <!-- Header -->
                        <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                            <div>
                                <h2 class="text-xl font-semibold text-gray-800"> Doctor in Popular </h2>
                            </div>
                        </div>

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">#</span>
                                    </div>
                                </th>
                                <th scope="col" class="ps-8 lg:ps-6 xl:ps-0 pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Name</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-12 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Position</span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"></span>
                                    </div>
                                </th>
                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800">Patients</span>
                                    </div>
                                </th>
                            </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200">
                            @foreach($topDoctors as $index => $tt)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            <span class="block text-sm font-semibold text-gray-800">{{ $index + 1 }}.</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-8 lg:ps-6 xl:ps-0 pe-6 py-3">
                                            <div class="flex items-center gap-x-3">
                                                <div class="grow">
                                                    <span class="block text-sm font-semibold text-gray-800">{{ $tt->doctor_name }}</span>
                                                    <span class="block text-sm text-gray-500">{{ $tt->email }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="h-px w-72 whitespace-nowrap">
                                        <div class="px-12 py-3">
                                            <span class="block text-sm font-semibold text-gray-800">{{ $tt->role_name }} </span>
                                            <span class="block text-sm text-gray-500">{{ $tt->dept_name }} </span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            @if($index + 1 <= 3)
                                                <span class="inline-flex items-center gap-x-1 text-xs font-medium text-yellow-500">
                                                    @for($i = 0; $i < 5; $i++)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.396.198-.86-.149-.746-.592l.83-3.73-2.912-2.522c-.33-.286-.158-.888.283-.95l3.898-.35 1.506-3.513c.17-.396.73-.396.9 0l1.506 3.513 3.898.35c.441.04.612.664.283.95l-2.912 2.522.83 3.73c.114.443-.35.79-.746.592L8 13.187l-3.389 2.256z"/>
                                                        </svg>
                                                    @endfor
                                                </span>
                                            @elseif($index + 1 == 4 || $index + 1 == 5)
                                                <span class="inline-flex items-center gap-x-1 text-xs font-medium text-yellow-500">
                                                    @for($i = 0; $i < 4; $i++)
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-fill" viewBox="0 0 16 16">
                                                            <path d="M3.612 15.443c-.396.198-.86-.149-.746-.592l.83-3.73-2.912-2.522c-.33-.286-.158-.888.283-.95l3.898-.35 1.506-3.513c.17-.396.73-.396.9 0l1.506 3.513 3.898.35c.441.04.612.664.283.95l-2.912 2.522.83 3.73c.114.443-.35.79-.746.592L8 13.187l-3.389 2.256z"/>
                                                        </svg>
                                                    @endfor
                                                </span>
                                            @endif
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-3">
                                            {{ $tt->total_appointments }}
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Footer -->
                        <div class="ps-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                            <div>
                                <p class="text-sm text-gray-600">
                                    <span class="font-semibold text-gray-800">5</span> results
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Doctor List -->
<div id="doctor-list-section" class="w-full lg:ps-[270px] transition-all duration-300" >
    <div class="flex flex-col m-auto my-5 mr-5">
        <div class="-m-1.5 overflow-x-auto">
            <div class="p-1.5 min-w-full inline-block align-middle">
                <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden">
                    <!-- Header -->
                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200">
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800"> Doctor </h2>
                            <p class="text-xs"> Here is the list of doctors </p>
                        </div>
                        <div>
                            <div class="inline-flex gap-x-2">
                                <a class="py-1.5 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-gray-800 text-white hover:bg-gray-600 disabled:opacity-50 disabled:pointer-events-none" href="/adm_dashboard2/#create-doctor-section">
                                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M5 12h14" />
                                        <path d="M12 5v14" />
                                    </svg> Add Doctor
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Table -->
                    <table id="all-doctor" class="min-w-full divide-y divide-gray-200 table-fixed">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="w-[40%] px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Name </span>
                                </div>
                            </th>
                            <th scope="col" class="w-[30%] px-3 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Position </span>
                                </div>
                            </th>
                            <th scope="col" class="w-[15%] px-1.5 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800"> Status </span>
                                </div>
                            </th>
                            <th scope="col" class="w-[15%] px-6 py-3 text-start">
                                <div class="flex items-center gap-x-2">
                                    <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 "> Joined </span>
                                </div>
                            </th>
                        </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                        @foreach($doctors as $doctor)
                            @php
                                $is_on_duty = false;
                            @endphp
                            @foreach($schd as $ss)
                                @if($ss->doctor_id == $doctor->id)
                                    @php
                                        $shiftStart = date('H:i', strtotime(explode(' - ', $ss->shift)[0]));
                                        $shiftEnd = date('H:i', strtotime(explode(' - ', $ss->shift)[1]));

                                        $currentDay = Carbon::now('Asia/Yangon')->format('l');
                                        $timezone = new DateTimeZone('Asia/Yangon');
                                        $currentTime = (new DateTime('now', $timezone))->format('H:i');

                                        if ($currentTime >= $shiftStart && $currentTime <= $shiftEnd && $ss->day == $currentDay) {
                                            $is_on_duty = true;
                                        }
                                    @endphp
                                @endif
                            @endforeach
                            <tr>
                                <td class="w-[40%] whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <div class="flex items-center gap-x-3">
                                            <img class="inline-block w-10 h-10 rounded-full" src="{{ asset('storage/images/' . ($doctor->doctor_name[0] == 'U' ? 'doctor_male.jpg' : 'doctor_female.jpg')) }}" alt="Avatar">
                                            <div class="grow">
                                                <span class="block text-sm font-semibold text-gray-800"> {{ $doctor->doctor_name }}</span>
                                                <span class="block text-sm text-gray-500"> {{ $doctor->email }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="w-[30%] whitespace-nowrap">
                                    <div class="px-3 py-3">
                                        <span class="block text-sm font-semibold text-gray-800"> {{ $doctor->role_name }}</span>
                                        <span class="block text-sm text-gray-500"> {{ $doctor->dept_name }}</span>
                                    </div>
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    @if($is_on_duty)
                                        <span class="ml-0 py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-teal-100 text-teal-800 rounded-full">
                                            <svg class="w-4 h-4" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                            </svg>
                                            On Duty
                                        </span>
                                    @else
                                        <span class="ml-0 py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">
                                            <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 16 16">
                                                <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                                            </svg>
                                            Off Duty
                                        </span>
                                    @endif
                                </td>
                                <td class="w-[15%] whitespace-nowrap">
                                    <div class="px-6 py-3">
                                        <span class="text-sm text-gray-500"> {{ $doctor->created_at->format('d M Y') }}</span>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>

                    <!-- Footer -->
                    <div id="footer-table" class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200">
                        <div>
                            <p class="text-sm text-gray-600">
                                <span class="font-semibold text-gray-800">{{ $doctors->total() }}</span> results
                            </p>
                        </div>
                        <div>
                            <div class="inline-flex gap-x-2">
                                {{ $doctors->appends(['section' => 'doctor-list-section'])->links('vendor.pagination.custom') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Account -->
<div id="account-section" class="w-full h-[80%] lg:pl-72 py-5 pr-10 transition-all duration-300">
    <div class="w-full max-w-4xl mx-auto p-5 pb-5 gap-7 columns-2 space-y-5">
        <!-- Body Profile Info Section -->
        <div class="bg-white shadow rounded-lg p-6 flex flex-col items-center justify-center relative h-[330px]">
            <div class="relative border-1 border-gray-400">
                <img id="profileImage" src="{{ auth()->guard('admin')->user()->photo ? asset('storage/' . auth()->guard('admin')->user()->photo) : asset('storage/images/default_profile.jpg') }}" alt="Profile Picture" class="rounded-full border-2 border-gray-400 w-28 h-28 items-center ml-3 mb-2">

                <form method="POST" action="/photo_update" enctype="multipart/form-data" class="flex flex-col items-center">
                    @csrf
                    @method('PATCH')
                    <div class="absolute bottom-8 right-0 bg-white rounded-full border border-gray-800 mb-5 p-2 hover:bg-gray-100 hover:border-customGray">
                        <label for="photo" class="cursor-pointer text-customGray">
                            <img src="{{ Vite::asset('resources/images/upload_photo.svg') }}" class="w-[22px] h-[22px]" alt="logo">
                        </label>
                        <input type="file" name="photo" id="photo" class="hidden" accept="image/*" onchange="previewImage(event)">
                    </div>
                    <button type="submit" class="bg-gray-800 hover:bg-gray-700 font-semibold text-sm text-white py-2 px-6 rounded mt-4 font-trebuchet">
                        Update Photo
                    </button>
                </form>
            </div>

            <h3 class="text-xl font-bold mt-3"> {{ auth()->guard('admin')->user()->admin_name }}</h3>
            <p class="text-gray-600 text-sm mt-1">Joined on {{ auth()->guard('admin')->user()->created_at->format('Y F d') }}</p>

            @if (auth()->guard('admin')->user()->gender == 'male')
                <div class="text-gray-500 text-sm flex flex-row items-center mt-2">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a4 4 0 110 8 4 4 0 010-8zm0 9c5.523 0 10 4.477 10 10H0c0-5.523 4.477-10 10-10z"/></svg>
                    <p>He/Him</p>
                </div>
            @else
                <div class="text-gray-500 text-sm flex items-center mt-2">
                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a4 4 0 110 8 4 4 0 010-8zm0 9c5.523 0 10 4.477 10 10H0c0-5.523 4.477-10 10-10z"/></svg>
                    <p>She/Her</p>
                </div>
            @endif
        </div>

        <!-- Profile Information Section -->
        <div class="bg-white shadow rounded-lg px-6 py-6 h-[330px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Profile Information</h2>
            <p class="text-sm text-gray-600 mb-6">Update your display name and email address.</p>
            <form action="/account_update" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="admin_name" class="block text-sm font-medium text-gray-700">Name</label>
                    <input type="text" name='admin_name'  id="admin_name" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ auth() -> guard('admin') -> user() -> admin_name }}">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name='email' id="email"  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm" value="{{ auth() -> guard('admin') -> user() -> email }}">
                </div>
                <button id="edit_btn" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">Save</button>
            </form>
        </div>

        <!-- Update Password Section -->
        <div class="bg-white shadow rounded-lg p-6 h-[420px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Update Password</h2>
            <p class="text-sm text-gray-600 mb-6">Ensure your account is using a strong password to stay secure.</p>
            <form action="/password_update" method="post">
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

        <!-- Contact Info Section -->
        <div class="bg-white shadow rounded-lg mt-1 p-6 h-[240px]">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Contact Info</h2>
            <p class="text-sm text-gray-600 mb-6">Keep in touch with us by providing your contact</p>

            <form action="/account_update" method="post">
                @csrf
                @method('PATCH')
                <div class="mb-4">
                    <label for="phone" class="block text-sm font-medium text-gray-700"> Phone Number </label>
                    <input type="text"  name='phone' id="phone" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm sm:text-sm" value="{{ auth() -> guard('admin') -> user() -> phone }}">
                </div>

                <button id="edit_btn" type="submit" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700">Save</button>
            </form>
        </div>
    </div>
</div>

<!-- Create Doctor -->
<div id="create-doctor-section" class="w-full lg:ps-[250px] transition-all duration-300">
    <div id="dr-create-section" class="transition-all duration-1000 ease-in-out">
        <x-authentication.dr_registration />
    </div>
</div>

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

<!-- Apexcharts -->
<script src="https://cdn.jsdelivr.net/npm/lodash@4.17.21/lodash.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script src="https://preline.co/assets/js/hs-apexcharts-helpers.js"></script>

<script>
    window.addEventListener("load", () => {
        (function () {
            buildChart(
                "#hs-multiple-bar-charts",
                (mode) => ({
                    chart: {
                        type: "bar",
                        height: 300,
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false,
                        },
                    },
                    series: [
                        {
                            name: "Chosen Period",
                            data: [
                                200000, 750000, 580000, 1100000, 890000, 780000, 1500000
                            ],
                        },
                        {
                            name: "Last Period",
                            data: [
                                170000, 760000, 850000, 1010000, 980000, 870000, 1050000,
                            ],
                        },
                    ],
                    plotOptions: {
                        bar: {
                            horizontal: false,
                            columnWidth: "22px",
                            borderRadius: 0,
                        },
                    },
                    legend: {
                        show: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        show: true,
                        width: 8,
                        colors: ["transparent"],
                    },
                    xaxis: {
                        categories: [
                            "Sun",
                            "Mon",
                            "Tues",
                            "Wed",
                            "Thurs",
                            "Fri",
                            "Sat",
                        ],
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        crosshairs: {
                            show: false,
                        },
                        labels: {
                            style: {
                                colors: "#9ca3af",
                                fontSize: "13px",
                                fontFamily: "Inter, ui-sans-serif",
                                fontWeight: 400,
                            },
                            offsetX: -2,
                            formatter: (title) => title.slice(0, 3),
                        },
                    },
                    yaxis: {
                        labels: {
                            align: "left",
                            style: {
                                colors: "#9ca3af",
                                fontSize: "13px",
                                fontFamily: "Inter, ui-sans-serif",
                                fontWeight: 400,
                            },
                            formatter: (value) => {
                                if (value >= 100000) {
                                    return `${(value / 100000)} lakh`;
                                } else if (value >= 1000) {
                                    return `${(value / 1000)}k`;
                                }
                                return value;
                            },
                        },
                        tickAmount: 5,
                        min: 0,
                        max: 1000000,
                    },
                    states: {
                        hover: {
                            filter: {
                                type: "darken",
                                value: 0.9,
                            },
                        },
                    },
                    tooltip: {
                        y: {
                            formatter: (value) => {
                                if (value >= 100000) {
                                    return `${(value / 100000).toFixed(1)} lakh`;
                                } else if (value >= 1000) {
                                    return `${(value / 1000).toFixed(1)}k`;
                                }
                                return `${value}`;
                            },
                        },
                        custom: function (props) {
                            const { categories } = props.ctx.opts.xaxis;
                            const { dataPointIndex } = props;
                            const title = categories[dataPointIndex];
                            const newTitle = `${title}`;

                            return buildTooltip(props, {
                                title: newTitle,
                                mode,
                                hasTextLabel: true,
                                wrapperExtClasses: "min-w-28",
                                labelDivider: ":",
                                labelExtClasses: "ms-2",
                            });
                        },
                    },


                    responsive: [
                        {
                            breakpoint: 568,
                            options: {
                                chart: {
                                    height: 300,
                                },
                                plotOptions: {
                                    bar: {
                                        columnWidth: "14px",
                                    },
                                },
                                stroke: {
                                    width: 8,
                                },
                                labels: {
                                    style: {
                                        colors: "#9ca3af",
                                        fontSize: "11px",
                                        fontFamily: "Inter, ui-sans-serif",
                                        fontWeight: 400,
                                    },
                                    offsetX: -2,
                                    formatter: (title) => title.slice(0, 3),
                                },
                                yaxis: {
                                    labels: {
                                        align: "left",
                                        minWidth: 0,
                                        maxWidth: 140,
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "11px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        formatter: (value) => {
                                            if (value >= 100000) { return `${value / 100000} lakh`; }
                                            return value;
                                        },
                                    },
                                },
                            },
                        },
                    ],
                }),
                {
                    colors: ["#309b7d", "#d1d5db"],
                    grid: { borderColor: "#e5e7eb" },
                },
                {
                    colors: ["#6b7280", "#309b7d"],
                    grid: { borderColor: "#404040" },
                }
            );
        })();
    });
</script>
<script>
    window.addEventListener("load", () => {
        const thisWeekArray = @json($thisWeekArray);
        const lastWeekArray = @json($lastWeekArray);
        // const thisWeekArray = [120000, 750000, 580000, 1100000, 890000, 780000, 1500000];
        // const lastWeekArray = [130000, 760000, 850000, 1010000, 980000, 870000, 1050000];

        (function () {
            function getDateRange(startDate, endDate) {
                const dates = [];
                let currentDate = new Date(startDate);

                while (currentDate <= endDate) {
                    // Format date to 'Month' and 'Day'
                    const month = currentDate.toLocaleDateString('en-GB', { month: 'short' });
                    const day = currentDate.toLocaleDateString('en-GB', { day: '2-digit' });
                    dates.push(`${month} ${day}`);
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                return dates;
            }

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // Set the start date to 6 days before today
            const startDate = new Date(today);
            startDate.setDate(today.getDate() - 6);

            const dateRange = getDateRange(startDate, today);
            buildChart(
                "#hs-line-chart",
                (mode) => ({
                    chart: {
                        type: "line",
                        height: 300,
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false,
                        },
                    },
                    series: [
                        {
                            name: "Chosen Period",
                            data: thisWeekArray,
                        },
                        {
                            name: "Last Period",
                            data: lastWeekArray,
                        },
                    ],
                    stroke: {
                        curve: 'smooth',
                        width: 3
                    },
                    xaxis: {
                        categories: dateRange
                    },
                    yaxis: {
                        min: 0,
                        max: Math.max(...thisWeekArray, ...lastWeekArray),
                    },
                    tooltip: {
                        enabled: true,
                        theme: "light", // Ensures tooltip background is light
                        style: {
                            fontSize: '12px',
                            fontFamily: 'Helvetica, Arial, sans-serif',
                        },
                        onDatasetHover: {
                            highlightDataSeries: true,
                        },
                        x: {
                            show: true,
                        },
                        y: {
                            formatter: (value) => value.toFixed(2), // Customize value format if needed
                        },
                        marker: {
                            show: true, // Display marker on the tooltip
                        },
                        background: '#ffffff', // White background for the tooltip
                        borderColor: '#e5e7eb', // Optional: add border color
                        borderWidth: 1, // Optional: add border width
                    },
                }),
                {
                    colors: ["#2563eb", "#d1d5db"],
                    grid: { borderColor: "#e5e7eb" },
                },
                {
                    colors: ["#6b7280", "#2563eb"],
                    grid: { borderColor: "#404040" },
                }
            );
        })();
    });
</script>

<script>
    window.addEventListener("load", () => {
        (function () {
            function getDateRange(startDate, endDate) {
                const dates = [];
                let currentDate = new Date(startDate);

                while (currentDate <= endDate) {
                    // Format date to 'Month' and 'Day'
                    const month = currentDate.toLocaleDateString('en-GB', { month: 'short' });
                    const day = currentDate.toLocaleDateString('en-GB', { day: '2-digit' });
                    dates.push(`${month} ${day}`);
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                return dates;
            }

            const today = new Date();
            today.setHours(0, 0, 0, 0);

            // Set the start date to 6 days before today
            const startDate = new Date(today);
            startDate.setDate(today.getDate() - 6);

            const dateRange = getDateRange(startDate, today);
            const dataArray = @json($dataArray);
            buildChart(
                "#hs-single-area-chart",
                (mode) => ({
                    chart: {
                        height: 300,
                        type: "area",
                        toolbar: {
                            show: false,
                        },
                        zoom: {
                            enabled: false,
                        },
                    },
                    series: [
                        {
                            name: "Visitors",
                            data: dataArray,
                        },
                    ],
                    legend: {
                        show: false,
                    },
                    dataLabels: {
                        enabled: false,
                    },
                    stroke: {
                        curve: "straight",
                        width: 2,
                    },
                    grid: {
                        strokeDashArray: 2,
                    },
                    fill: {
                        type: "gradient",
                        gradient: {
                            type: "vertical",
                            shadeIntensity: 1,
                            opacityFrom: 0.1,
                            opacityTo: 0.8,
                        },
                    },
                    xaxis: {
                        type: "category",
                        tickPlacement: "on",
                        categories: dateRange,
                        axisBorder: {
                            show: false,
                        },
                        axisTicks: {
                            show: false,
                        },
                        crosshairs: {
                            stroke: {
                                dashArray: 0,
                            },
                            dropShadow: {
                                show: false,
                            },
                        },
                        tooltip: {
                            enabled: false,
                        },
                        labels: {
                            style: {
                                colors: "#9ca3af",
                                fontSize: "11px",
                                fontFamily: "Inter, ui-sans-serif",
                                fontWeight: 400,
                            },
                            formatter: (title) => {
                                let t = title;

                                if (t) {
                                    const newT = t.split(" ");
                                    t = `${newT[0]} ${newT[1].slice(0, 3)}`;
                                }

                                return t;
                            },
                        },
                    },
                    yaxis: {
                        labels: {
                            align: "left",
                            minWidth: 0,
                            maxWidth: 140,
                            style: {
                                colors: "#9ca3af",
                                fontSize: "13px",
                                fontFamily: "Inter, ui-sans-serif",
                                fontWeight: 400,
                            },
                            formatter: (value) => {
                                if (value >= 100000) {
                                    return `${value / 100000} lakh`;
                                }
                                return value;
                            },
                        },
                    },

                    tooltip: {
                        x: {
                            format: "MMMM yyyy",
                        },
                        y: {
                            formatter: (value) =>
                                `${value >= 1000 ? `${value / 1000}k` : value}`,
                        },
                        custom: function (props) {
                            const { categories } = props.ctx.opts.xaxis;
                            const { dataPointIndex } = props;
                            const title = categories[dataPointIndex].split(" ");
                            const newTitle = `${title[0]} ${title[1]}`;

                            return buildTooltip(props, {
                                title: newTitle,
                                mode,
                                valuePrefix: "",
                                hasTextLabel: true,
                                markerExtClasses: "!rounded-sm",
                                wrapperExtClasses: "min-w-28",
                            });
                        },
                    },
                    responsive: [
                        {
                            breakpoint: 568,
                            options: {
                                chart: {
                                    height: 300,
                                },
                                labels: {
                                    style: {
                                        colors: "#9ca3af",
                                        fontSize: "11px",
                                        fontFamily: "Inter, ui-sans-serif",
                                        fontWeight: 400,
                                    },
                                    offsetX: -2,
                                    formatter: (title) => title.slice(0, 3),
                                },
                                yaxis: {
                                    labels: {
                                        align: "left",
                                        minWidth: 0,
                                        maxWidth: 140,
                                        style: {
                                            colors: "#9ca3af",
                                            fontSize: "11px",
                                            fontFamily: "Inter, ui-sans-serif",
                                            fontWeight: 400,
                                        },
                                        formatter: (value) =>
                                            value >= 1000 ? `${value / 1000}k` : value,
                                    },
                                },
                            },
                        },
                    ],
                }),
                {
                    colors: ["#2563eb", "#9333ea"],
                    fill: {
                        gradient: {
                            stops: [0, 90, 100],
                        },
                    },
                    grid: {
                        borderColor: "#e5e7eb",
                    },
                },
                {
                    colors: ["#3b82f6", "#a855f7"],
                    fill: {
                        gradient: {
                            stops: [100, 90, 0],
                        },
                    },
                    grid: {
                        borderColor: "#404040",
                    },
                }
            );
        })();
    });
</script>

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

    function viewSchedule(){
        document.getElementById('dr-create-section').classList.add('hidden');
        document.getElementById('dr-schd-section').classList.remove('hidden');
    }
    function viewDrRegsForm(){
        document.getElementById('dr-create-section').classList.remove('hidden');
        document.getElementById('dr-schd-section').classList.add('hidden');
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
            alertBox.classList.remove('hidden', 'bg-green-200', 'text-green-800');
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
            alertBox.classList.add('bg-green-200', 'text-green-800');
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

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

        .form-section {
            display: none;
        }
        .form-section.current{
            display: inline;
        }
        .parsley-errors-list {
            color: red;
        }
        @layer components {
            .bg-custom-gray {
                background: #e8e8ed;
            }
            .text-custom-navy {
                color: #004A87;
            }
            .custom {
                color: #00b1ff;
            }
            .custom-font {
                font-family: "Hanken Grotesk", sans-serif;
            }
            .shadow-custom {
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            }
            .vertical-line {
                border-right: 1px solid #e0e0e0;
            }
            .form-container {
                position: relative;
            }
            .custom-gradient {
                background-image: conic-gradient(from 0deg, #A0DAA9, #34A853);
            }
            .nrc-grid {
                display: grid;
                grid-template-columns: repeat(4, 1fr);
                gap: 0.2rem;
            }
            .text-right-placeholder::placeholder {
                text-align: right;
            }
            input[type="number"] {
                text-align: right;
            }
            .button-container {
                display: flex;
                justify-content: flex-end;
                gap: 0.5rem;
                padding-top: 1rem;
            }
            .prefix {
                margin-right: 6px;
            }
        }
    </style>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <link rel="stylesheet" href="https://preline.co/assets/css/main.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
                <!-- End Search Input -->
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
                        <div class="flex items-center">
                            <span class="text-customGreen2 font-medium mr-2"> {{ auth() -> guard('admin') -> user() -> admin_name }} </span>
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
<!-- ========== END HEADER ========== -->

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
            <a class="rounded-xl text-xl flex flex-row items-center font-semibold focus:outline-none focus:opacity-80" href="#">
                <img src="{{ Vite::asset('resources/images/FitFinityLogo.svg') }}" class="w-[70px] h-[70px]" alt="logo">
                <h2 class="font-bold text-[24px]">FitFinity</h2>
            </a>
        </div>

        <!-- Buttons -->
        <div class="h-full overflow-y-auto [&::-webkit-scrollbar]:w-2 [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-100 [&::-webkit-scrollbar-thumb]:bg-gray-300">
            <nav class="hs-accordion-group p-3 w-full flex flex-col flex-wrap" data-hs-accordion-always-open>
                <ul class="flex flex-col space-y-1">
                    <li>
                        <a id='dashboard-btn' href='/adm_dashboard' onclick="showSection('dashboard')" class="hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="users-accordion-child">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg> <span class="-ml-1"> Dashboard </span>
                        </a>
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
                                                <a href="/adm_dashboard" id='finance-btn' class="hs-accordion-toggle w-full text-start flex items-center gap-x-4 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal">
                                                    Monthly Data
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li>
                        <a href="/adm_dashboard" type="button" onclick="showSection('doctor-list-section')" id='doctor-list-btn' class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
                            <i class="fa-solid fa-stethoscope"></i>
                            Doctor List
                        </a>
                    </li>

                    <li class="hs-accordion" id="account-accordion">
                        <a href="/adm_dashboard" type="button" class=" hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="account-accordion-child">
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
                            </svg>
                            Account
                        </a>
                    </li>

                    <li class="hs-accordion" id="projects-accordion">
                        <a href="/adm_dashboard" type="button" onclick="showSection('add-doctor')" id='add-doctor-btn' class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-customTeal" aria-expanded="true" aria-controls="projects-accordion-child">
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect width="20" height="14" x="2" y="7" rx="2" ry="2" />
                                <path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16" />
                            </svg> Add Doctor
                        </a>
                    </li>

                    <li class="absolute bottom-3">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="hs-accordion-toggle w-full text-start flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-800 rounded-lg hover:bg-gray-100 focus:outline-none focus:bg-gray-100" aria-expanded="true" aria-controls="projects-accordion-child">
                                <i class="fa-solid fa-chevron-left"></i> <span class="ml-1 text-red-500">Logout </span>
                            </button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</div>

<!-- Add Doctor -->
<div id="add-doctor-section" class="w-full lg:ps-[250px] transition-all duration-300 relative">
    <form action="/create_doctor" method="post" enctype="multipart/form-data">
        @csrf
        <div id="dr-create-section" class="transition-all duration-1000 ease-in-out">
            <x-authentication.dr_registration />
        </div>
        <div id="dr-schd-section" class="hidden transition-all duration-1000 ease-in-out">
            <x-authentication.doctor_schedule />
        </div>
    </form>
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
    function showSection(sectionId) {
        // Implement the logic to display the section with the given ID
        document.getElementById(sectionId).classList.remove('hidden');
    }
    function closeAlert() {
        document.getElementById('custom-alert').classList.add('hidden');
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
<!-- JS PLUGINS -->
<!-- Required plugins -->
<script src="https://cdn.jsdelivr.net/npm/preline/dist/preline.min.js"></script>

<!-- Show Section JS -->
<script>
    function showSection(section) {
        const sections = ['add-doctor'];
        const buttons = ['add-doctor-btn'];

        // Hide all sections
        sections.forEach(sec => {
            document.getElementById(sec + '-section').classList.add('hidden');
        });

        // Show the selected section
        document.getElementById(section + '-section').classList.remove('hidden');
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
</body>
</html>

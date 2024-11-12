<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="x-ua-compatible" content="ie=edge"/>
    <title>Fitfinity</title>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>

    <link rel="icon" href="{{ Vite::asset('assets/images/logo/logo.svg') }}"/>
    <link rel="stylesheet" href="{{ Vite::asset('assets/css/LineIcons.2.0.css') }}"/>


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
</head>

<body class="bg-white custom-font text-customGreen2">
<header id="home" class="header">
    <div class="header-wrapper">
        <div class="header-top bg-signatureGreen text-white py-2">
            <div class="container mx-auto px-4">
                <div class="flex flex-wrap items-center">
                    <div class="w-full md:w-2/3 text-center md:text-left">
                        <ul class="flex justify-center md:justify-start lg:justify-start space-x-6">
                            <li class="space-x-3"><a href="#" class="flex items-center space-x-1"><i class="lni lni-phone mr-1"></i> <span class="text-xs ml-2">+959985056890</span></a></li>
                            <li class="space-x-3"><a href="#" class="flex items-center space-x-1"><i class="lni lni-envelope mr-1"></i> <span class="text-xs ml-2">fitfinity@gmail.com</span></a></li>
                        </ul>
                    </div>
                    <div class="w-full md:w-1/3 text-center md:text-right">
                        <ul class="flex justify-center md:justify-end space-x-6">
                            <li><a href="#" class="text-white"><i class="lni lni-facebook-filled"></i></a></li>
                            <li><a href="#" class="text-white"><i class="lni lni-twitter-filled"></i></a></li>
                            <li><a href="#" class="text-white"><i class="lni lni-linkedin-original"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-area bg-white shadow-md">
            <div class="container mx-auto px-2">
                <nav class="navbar navbar-expand-lg flex items-center justify-between">
                    <a class="navbar-brand flex items-center" href="#">
                        <img class="w-10" src="{{ Vite::asset('../../../assets/images/logo/logo.svg') }}" alt="Logo" />
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

                    <button class="navbar-toggler lg:hidden" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                        <span class="toggler-icon"></span>
                    </button>

                    <div id="navbarSupportedContent" class="lg:flex lg:items-center lg:justify-center space-x-4">
                        <ul class="flex flex-col lg:flex-row items-center lg:space-x-6 my-6 lg:my-6">
                            <li><a class="text-gray-700 hover:text-teal-600" href="/">Home</a></li>
                            <li><a class="text-gray-700 hover:text-teal-600" href="/">About</a></li>
                            <li><a class="text-gray-700 hover:text-teal-600" href="/med_ai">Diagnosis</a></li>
                            <li><a class="text-gray-700 hover:text-teal-600 active" target="_blank" href="/user_profile">Profile</a></li>
                            <li><a class="text-gray-700 hover:text-teal-600" target="_blank" href="/doctor_search">Doctors</a></li>
                            <li class="relative">
                                <button id="profileButton" class="flex items-center p-2 rounded-full focus:outline-none">
                                    <img class="w-11 h-11 rounded-full" src="{{ auth()->guard('web')->user()->photo ? asset('storage/' . auth()->guard('web')->user()->photo) : asset('storage/images/default_profile.jpg') }}" alt="Profile Picture">
                                </button>
                                <ul id="dropdownMenu" class="dropdown-menu absolute z-10 right-0 mt-2 hidden bg-white border border-gray-200 rounded-md shadow-lg w-64">
                                    <li class="px-6 py-3">
                                        <div class="flex flex-col">
                                            <span class="text-sm font-semibold text-gray-700">Signed in as <span class="font-bold"> {{ auth() -> guard('web') -> user() -> username }}</span></span>
                                            <span class="text-xs text-gray-500">{{ auth() -> guard('web') -> user() -> email }}</span>
                                        </div>
                                    </li>
                                    <li><hr class="border-gray-200"></li>
                                    <li class="px-3 py-2">
                                        <a class="flex items-center text-gray-700 hover:text-teal-600" href="/logout">
                                            <i class="fas fa-sign-out-alt mr-2"></i> <span class="text-xs my-2">Logout</span>
                                        </a>
                                    </li>
                                </ul>
                                <script>
                                    document.addEventListener('DOMContentLoaded', function() {
                                        const profileButton = document.getElementById('profileButton');
                                        const dropdownMenu = document.getElementById('dropdownMenu');

                                        profileButton.addEventListener('click', function() {
                                            if (dropdownMenu.classList.contains('hidden')) {
                                                dropdownMenu.classList.remove('hidden');
                                                dropdownMenu.classList.add('show');
                                            } else {
                                                dropdownMenu.classList.remove('show');
                                                dropdownMenu.classList.add('hidden');
                                            }
                                        });

                                        document.addEventListener('click', function(event) {
                                            if (!profileButton.contains(event.target) && !dropdownMenu.contains(event.target)) {
                                                dropdownMenu.classList.remove('show');
                                                dropdownMenu.classList.add('hidden');
                                            }
                                        });
                                    });
                                </script>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<div>
    <main class="mt-10 mx-auto max-w-[886px] text-white">
        {{ $slot }}
    </main>
</div>
</body>
</html>

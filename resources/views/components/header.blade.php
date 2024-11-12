

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
                                <li class="nav-item active mt-2.5"><a class="page-scroll active" href="#home">Home</a></li>
                                <li class="nav-item mt-2.5"><a class="page-scroll" href="#about">About</a></li>
                                <li class="nav-item mt-2.5"><a class="" href="/med_ai">Diagnosis</a></li>
                                <li class="nav-item mt-2.5"><a target="_blank" class="" href="/user_profile">Profile</a></li>
                                <li class="nav-item mt-2.5 -mr-3"><a target="_blank" class="" href="/doctor_search"> Doctors </a></li>
                                <li class="nav-item mt-1">
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


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>FitFinity | Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk&display=swap" rel="stylesheet">
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css', 'resources/js/app.js']); ?>
    <style>
        @layer components {
            .custom-font {
                font-family: "Hanken Grotesk", sans-serif;
            }
        }

        /* Custom styles for the select box */
        select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
            background: url("data:image/svg+xml;charset=US-ASCII,%3csvg xmlns='http://www.w3.org/2000/svg' width='4' height='5' viewBox='0 0 4 5'%3e%3cpath fill='%23309b7d' d='M2 0L0 2h4zm0 5L0 3h4z'/%3e%3c/svg%3e") no-repeat right 0.75rem center/8px 10px;
            padding-right: 2rem;
        }
    </style>
</head>
<body class="custom-font">
<div class="mx-16 my-12">
    <div class="min-h-screen flex flex-col items-center justify-center py-6 px-4">
        <div class="grid md:grid-cols-2 items-center gap-0 max-w-6xl w-full">
            <div class="border-t-[6px] border-customGreen3 ml-4 rounded-lg p-6 max-w-md shadow-[0_2px_22px_-4px_rgba(93,96,127,0.2)] max-md:mx-auto">
                <form class="space-y-4" action="/login" method="post">
                    @csrf
                    <div class="mb-8">
                        <h1 class="text-customGreen2 text-3xl font-bold">Sign in <span class="text-sm text-customGreen3 pl-2">FITFINITY</span></h1>
                        <p class="text-gray-500 text-sm mt-3 leading-relaxed">Tell us who you are. Please provide your credentials.</p>
                    </div>

                    <div>
                        <label class="text-customGreen2 text-sm mb-2 block">Email</label>
                        <div class="relative flex items-center">
                            <input name="email" type="email" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Enter your email" />
                            <svg xmlns="http://www.w3.org/2000/svg" fill="#bbb" stroke="#bbb" class="w-[18px] h-[18px] absolute right-4" viewBox="0 0 24 24">
                                <circle cx="10" cy="7" r="6" data-original="#000000"></circle>
                                <path d="M14 15H6a5 5 0 0 0-5 5 3 3 0 0 0 3 3h12a3 3 0 0 0 3-3 5 5 0 0 0-5-5zm8-4h-2.59l.3-.29a1 1 0 0 0-1.42-1.42l-2 2a1 1 0 0 0 0 1.42l2 2a1 1 0 0 0 1.42 0 1 1 0 0 0 0-1.42l-.3-.29H22a1 1 0 0 0 0-2z" data-original="#000000"></path>
                            </svg>
                        </div>
                        <x-form-login-error name="email"></x-form-login-error>
                    </div>
                    <div>
                        <label class="text-customGreen2 text-sm mb-2 block">Password</label>
                        <div class="relative flex items-center">
                            <input name="password" type="password" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-blue-600" placeholder="Enter password" />
                        </div>
                    </div>

                    <!-- Select Role Section -->
                    <div>
                        <label class="text-customGreen2 text-sm mb-2 block">Role</label>
                        <select name="role" required class="w-full text-sm text-gray-800 border border-gray-300 px-4 py-3 rounded-lg outline-customGreen3">
                            <option value="" disabled selected>Select your role</option>
                            <option value="patient">Patient</option>
                            <option value="doctor">Doctor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>

                    <div class="flex flex-wrap items-center justify-between gap-4">
                        <div class="flex items-center">
                            <input id="remember-me" name="remember-me" type="checkbox" class="h-4 w-4 shrink-0 text-customGreen2 focus:ring-customGreen2 border-gray-300 rounded" />
                            <label for="remember-me" class="ml-3 block text-sm text-gray-800">
                                Remember me
                            </label>
                        </div>
                        <div class="text-sm">
                            <a href="/" class="text-customGreen3 hover:underline font-semibold">
                                Forgot your password?
                            </a>
                        </div>
                    </div>
                    <div class="!mt-8">
                        <button type="submit" class="w-full text-white bg-gradient-to-tr from-customGreen2 to-customGreen3 shadow-lg shadow-gray-300 hover:bg-gradient-to-bl focus:ring-2 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center mb-2 transform hover:-translate-y-[1.5px] transition-transform duration-500 ease-in-out">
                            Log in
                        </button>
                    </div>
                    <p class="text-sm !mt-8 text-center text-gray-800">Don't have an account <a href="/register" class="text-customGreen3 font-semibold hover:underline ml-1 whitespace-nowrap">Register here</a></p>
                </form>
            </div>
            <div class="lg:h-[400px] md:h-[300px] max-md:mt-8">
                <img src="{{ Vite::asset('resources/images/login-image.svg') }}" class="w-full h-full max-md:w-4/5 mx-auto block object-cover" alt="logo">
            </div>
        </div>
    </div>
</div>
</body>
</html>

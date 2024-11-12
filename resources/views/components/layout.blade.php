<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk&display=swap" rel="stylesheet">
    <style>
        @layer components{
            .customXS{
                font-size: 0.65rem;
            }
            .font-2xs{
                font-size: 0.64rem
            }
            .custom-font{
                font-family: "Hanken Grotesk", sans-serif;
            }
        }
    </style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body {{ $attributes->merge(['class' => 'bg-customGray custom-font']) }}>
<div>
    <nav {{ $attributes->merge(['class' => 'flex px-7 py-5 justify-between items-center text-white border-b border-white/10']) }}>
        <div>
            <a href="/">
                <img src="{{ Vite::asset('resources/images/logo.svg') }}" alt="logo">
            </a>
        </div>
        <div class="space-x-6 font-bold">
            <a href="/" class="hover:text-blue-700">Jobs</a>
            <a href="/" class="hover:text-blue-700">Career</a>
            <a href="/" class="hover:text-blue-700">Salary</a>
            <a href="/" class="hover:text-blue-700">Opportunities</a>
        </div>
        <div class="space-x-3">
                @if(Auth::guard('web')->check() || Auth::guard('admin')->check() || Auth::guard('doctor')->check())
                    <form method="POST" action="/logout" style="display: inline;">
                        @csrf
                        <button type="submit" class="hover:text-blue-700">Logout</button>
                    </form>
                @else
                    <a href="/login" class="hover:text-blue-700">Login</a>
                    <a href="/register" class="hover:text-blue-700">Register</a>
                @endif
        </div>
    </nav>

    <main class="mt-10 mx-auto max-w-[886px] text-white">
        {{ $slot }}
    </main>
</div>
</body>
</html>

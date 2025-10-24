<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css')

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite('resources/js/app.js')
</head>

<body
    class="mx-auto mt-10 max-w-2xl h-40 w-full bg-gradient-to-r from-indigo-100 from-[10%] via-sky-100 via-[30%] to-emerald-100 to-[90%] text-slate-700">
    <nav class="mb-8 flex justify-between text-lg font-medium ">
        <ul class="flex space-x-2 items-center">
            <li>
                <a href="{{ route('job.index') }}">Home</a>
            </li>
        </ul>

        <ul class="flex space-x-2 items-center">
            @auth
                <li>
                    <a href="{{ route('my-job-applications.index') }}">
                        {{ auth()->user()->name ?? 'Anynomus' }}: Applications
                    </a>
                </li>
                <li>
                    <a href="{{ route('my-jobs.index') }}">My Jobs</a>
                </li>
                <li>
                    <form action="{{ route('auth.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="cursor-pointer bg-red-500 text-white p-2 rounded-lg">Logout</button>
                    </form>
                </li>
            @else
                <a href="{{ route('login') }}">Sign in</a>
            @endauth
        </ul>
    </nav>

    @if (session('success'))
        <div role="alert"
            class="my-8 rounded-md border-l-4 border-green-300 bg-green-100 p-4 text-green-700 opacity-75">
            <p class="font-bold">Success!!!</p>
            <p>{{ session('success') }}</p>
        </div>
    @endif
    @if (session('error'))
        <div role="alert" class="my-8 rounded-md border-l-4 border-red-300 bg-red-100 p-4 text-red-700 opacity-75">
            <p class="font-bold">Error!!!</p>
            <p>{{ session('error') }}</p>
        </div>
    @endif

    {{ $slot }}
</body>

</html>

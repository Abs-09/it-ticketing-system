<!DOCTYPE html>
<html lang="en" class="notranslate" translate="no">

<head>
    <meta charset="UTF-8">
    <meta name="google" content="notranslate" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CMS</title>
    <link rel="icon" type="image/x-icon" href="/logo.svg">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v1.9.8/dist/alpine.js" defer></script>
</head>


<body class="font-sans antialiased dark:bg-neutral-900">

    @include('layouts.navigation')

    <div class="py-0 lg:pl-64">
        @auth
            <div class="flex justify-end px-14 gap-x-5 items-center">
                <a href="{{ route('profile.edit') }}"
                    class="dark:text-white hover:text-blue-600">{{ auth()->user()?->name }}</strong></a>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit"
                        class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                        logout
                    </button>
                </form>
            </div>
        @endauth

        <main>
            <div class="p-4 sm:px-8 lg:px-14 py-10">
                {{ $slot }}
            </div>
        </main>
    </div>

</body>

</html>

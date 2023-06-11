<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title ?? config('app.name') ?? 'Address Management System' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
<header class="w-full py-4 shadow">
    <x-misc.container>
        <a href="{{ route('home') }}">
            <img src="{{ asset('images/logo.png') }}" class="w-12 h-12" alt="Logo">
        </a>
    </x-misc.container>
</header>

<x-misc.container>
    <div class="w-full flex gap-4">
        <aside class="min-h-[85vh] p-4 aside_menu rounded-xl bg-gray-100 hidden xl:block">
            <div class="max-w-[250px] w-[250px] flex flex-col justify-between min-h-full">
                <x-address.select-form/>

                <a href="{{ route('address.create') }}" class="btn w-full text-center">
                    Add Address
                </a>
            </div>
        </aside>

        <main class="w-full overflow-x-auto relative px-4 xl:px-0 py-4 pt-8 xl:pt-4">
            {{ $slot }}

            <span class="absolute cursor-pointer xl:hidden top-0 left-0 menu_toggle">
                <img class="w-8 h-8" src="{{ asset('/burger-menu-left.svg') }}" alt="Menu toggle">
            </span>
        </main>
    </div>
</x-misc.container>

</body>
</html>

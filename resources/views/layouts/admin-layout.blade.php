<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')

</head>

<body>
    <main class="flex">
        <nav class="bg-gold basis-1/5 w-52 flex flex-col gap-5 sticky top-0 text-white h-screen p-5">
            <a href="/" class="logo text-2xl">OASIS</a>
            <hr>
            <div class="h-full flex flex-col justify-between">
                <div class="flex flex-col font-semibold gap-2 text-start">
                    <a class="hover:border-white p-2 rounded-md border-[1.5px] border-gold {{ request()->is('admin') ? 'border-white text-gold bg-white' : '' }}"
                        href="/admin">Dashboard</a>
                    <a class="hover:border-white p-2 rounded-md border-[1.5px] border-gold {{ request()->is('admin/add-room') ? 'border-white text-gold bg-white' : '' }}"
                        href="/admin/add-room">Tambah Kamar</a>
                </div>
                <form method="POST" action="{{ route('logout') }}" class="mb-2">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                                this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </div>

        </nav>
        <div class="p-5 flex flex-col gap-5 basis-4/5 grow">
            <div class="bg-gold rounded-lg w-full h-20"></div>
            @yield('content')
        </div>
    </main>
</body>

</html>

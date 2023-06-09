@extends('layouts.landing-layout')

@section('title', 'Kos Oasis | Home')
@section('content')
    <main class="max-w-screen-xl flex flex-col mx-auto">
        <section class="relative overflow-hidden w-full h-[40rem] flex items-center">
            <img src="/img/hero.webp" alt="hero background" class="absolute object-cover w-full brightness-[35%] -z-10">

            <div class="px-20 flex flex-col gap-5">
                <h1 class="text-5xl w-4/5 text-white font-bold">Selamat Datang di Website Kos Oasis</h1>
                <a href="#rooms-section"
                    class="bg-gold border-[1.5px] border-gold hover:text-gold hover:bg-transparent transition-all duration-150 w-fit font-semibold text-white px-5 py-2 rounded-md">Cari
                    Kamar</a>
            </div>
        </section>

        <section id="rooms-section" class="py-10 px-20 flex gap-10 flex-col items-center">
            <h2 class="font-bold text-3xl">Kamar Kami</h2>

            <div class="grid grid-cols-4 gap-5">
                @foreach ($rooms as $room)
                    <x-room-card type="{{ $room['type'] }}" description="{{ $room['description'] }}"
                        price="{{ $room['price'] }}" image="" />
                @endforeach

            </div>
        </section>

        <section class="h-72 mt-10 flex bg-gold">
            <img src="https://www.cekpremi.com/blog/wp-content/uploads/2021/04/bisnis-kos-kosan.jpeg" alt="kos"
                class="basis-1/2 object-cover
                ">

            <div class="flex text-white flex-col basis-1/2 w-full gap-5 items-center justify-center">
                <h3 class="font-bold text-3xl">Kenapa Kos Oasis?</h3>
                <ul class="font-medium flex flex-col gap-2">
                    <li class="flex gap-2">
                        <img class="w-5" src="/img/checkmark.svg" alt="check">
                        <span>3 lantai dengan total 40 kamar</span>
                    </li>
                    <li class="flex gap-2">
                        <img class="w-5" src="/img/checkmark.svg" alt="check"> <span>Fasilitas lengkap</span>
                    </li>
                    <li class="flex gap-2">
                        <img class="w-5" src="/img/checkmark.svg" alt="check"> <span>Bebas jam malam</span>
                    </li>
                    <li class="flex gap-2">
                        <img class="w-5" src="/img/checkmark.svg" alt="check"> <span>Lokasi strategis</span>
                    </li>
                </ul>
            </div>
        </section>

        <section id="review-section" class="flex flex-col mt-20 gap-10 px-20 items-center">
            <h2 class="font-bold text-3xl">REVIEW KLIEN</h2>

            <div class="grid grid-cols-3 gap-5 w-full">
                @foreach ($reviews as $review)
                    <x-review-card sender="{{ $review['sender'] }}" rating="{{ $review['rating'] }}"
                        text="{{ $review['message'] }}" image="{{ $review['image'] }}" />
                @endforeach
            </div>

            <button
                class="bg-gold text-white font-semibold px-5 py-2 rounded-md border-[1.5px] border-gold hover:bg-transparent hover:text-gold transition-all duration-150">Lihat
                Lebih Banyak</button>
        </section>

        <x-map />
    </main>
@endsection

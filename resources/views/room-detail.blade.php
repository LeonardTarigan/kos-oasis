@extends('layouts.landing-layout')

@section('title', 'Detail Kamar')

@section('content')
    <main class="px-20 pt-28">
        <div class="flex gap-4 text-sm bg-white p-5 shadow-lg rounded-xl
        ">
            <img class="basis-1/2 w-full rounded-md h-[25rem]" src="https://parboaboa.co/data/foto_berita/kamar-kost-kmd.webp"
                alt="Room picture">

            <div class="basis-1/2 flex flex-col justify-between">
                <div>
                    <h2 class="font-bold text-2xl">Tipe {{ $room['type'] }}</h2>
                    <p class="desc">{{ $room['description'] }}</p>
                </div>
                <div class="w-full flex flex-col">
                    <p class="{{ $remaining <= 2 ? 'text-rose-500' : 'text-emerald-500' }} font-medium">Sisa
                        {{ $remaining }}</p>
                    <p class="mb-5 font-bold text-xl">Rp {{ number_format($room['price'], 0, ',', '.') }} </p>
                    @if ($remaining > 0)
                        <a class="bg-gold text-center text-white rounded-md border-[1.5px] border-gold hover:bg-transparent hover:text-gold transition-all duration-150 font-semibold py-2"
                            target="_blank" href="https://wa.me/6281377471625?text={{ $message }}">
                            Pesan
                        </a>
                    @else
                        <div class="bg-gray-100 text-center text-gray-400 rounded-md cursor-not-allowed font-semibold py-2"
                            href="#">
                            Habis
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </main>
@endsection

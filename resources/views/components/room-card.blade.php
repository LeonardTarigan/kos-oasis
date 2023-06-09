<div class="overflow-hidden rounded-lg bg-white shadow-lg">
    <img src="https://parboaboa.co/data/foto_berita/kamar-kost-kmd.webp" alt="room picture">

    <div class="p-3 flex flex-col gap-5 text-sm">
        <div>
            <span class="{{ $remaining <= 2 ? 'text-rose-500' : 'text-emerald-500' }} font-medium">Sisa
                {{ $remaining }}</span>
            <h3 class="font-bold text-xl">Tipe {{ $type }}</h3>
            <p class="line-clamp-3 text-gray-400">{{ $description }}</p>
        </div>
        <div class="flex flex-col gap-2">
            <span class="font-bold text-xl">Rp {{ number_format($price, 0, ',', '.') }}</span>
            @if ($remaining > 0)
                <a class="text-center py-2 font-semibold text-white bg-gold border-[1.5px] border-gold hover:bg-transparent hover:text-gold rounded-md"
                    target="_blank" href="https://wa.me/6281377471625?text={{ $message }}">
                    Pesan
                </a>
            @else
                <div
                    class="bg-gray-100 border-[1.5px] border-gray-100 text-center py-2 font-semibold text-gray-400 rounded-md cursor-not-allowed">
                    Habis
                </div>
            @endif
            <a class="border-[1.5px] border-gold rounded-md text-center py-2 font-semibold text-gold hover:bg-gray-100 transition-all duration-150"
                href="/room/{{ $type }}">
                Lihat Detail
            </a>
        </div>
    </div>
</div>

@extends('layouts.admin-layout')

@section('title', 'Admin Dashboard')

@section('content')
    <div class="rounded-lg overflow-hidden">
        <table class="overflow-auto border-collapse table-fixed">
            <thead class="bg-gold ">
                <tr class="text-white">
                    <th class="p-5 border border-white border-l-gold">Nomor</th>
                    <th class="p-5 border border-white">Gambar</th>
                    <th class="p-5 border border-white">Tipe</th>
                    <th class="p-5 border border-white">Harga</th>
                    <th class="p-5 border border-white">Fasilitas</th>
                    </th>
                    <th class="p-5 border border-white">Nama</th>
                    <th class="p-5 border border-white">Hp</th>
                    <th class="p-5 border border-white border-r-gold">Action</th>
                </tr>
            </thead>
            <tbody class="whitespace-pre-line text-xs">
                @foreach ($rooms as $index => $room)
                    <tr class="{{ $index % 2 === 0 ? 'bg-white' : 'bg-gray-100' }}">
                        <td class="text-center border border-gold p-2">{{ $room['room_no'] }}</td>
                        <td class="border border-gold p-2">{{ $room['image'] }}</td>
                        <td class="border border-gold p-2">{{ $room['type'] }}</td>
                        <td class="border border-gold p-2">{{ $room['price'] }}</td>
                        <td class="border border-gold p-2">{{ $room['description'] }}</td>
                        @if ($room['name'] == null)
                            <td class="border border-gold p-2 italic text-gray-400">Kosong</td>
                            <td class="border border-gold p-2 italic text-gray-400">Kosong</td>
                        @else
                            <td class="border border-gold p-2">{{ $room['name'] }}</td>
                            <td class="border border-gold p-2">{{ $room['phone'] }}</td>
                        @endif
                        <td class="border border-gold p-2">
                            <a href="/admin/edit-room/{{ $room['room_no'] }}"><button
                                    class="bg-blue-500 border-[1.5px] font-medium border-blue-500 hover:text-blue-500 hover:bg-transparent transition-all duration-150 text-white py-2 w-full rounded">Edit</button></a>


                            <form class="-mt-11" action="/admin/delete/{{ $room['room_no'] }}" method="POST"
                                onsubmit="return confirm('Anda yakin ingin mengapus ruangan {{ $room['room_no'] }}?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-rose-500 border-[1.5px] font-medium border-rose-500 hover:text-rose-500 hover:bg-transparent transition-all duration-150  text-white py-2 w-full rounded">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if (session('success'))
        <script>
            alert("{{ session('success') }}");
        </script>
    @endif

    @if (session('error'))
        <script>
            alert("{{ session('error') }}");
        </script>
    @endif
@endsection

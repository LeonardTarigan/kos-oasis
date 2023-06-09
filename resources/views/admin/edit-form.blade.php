@extends('layouts.admin-layout')

@section('title', 'Form')

@section('content')
    <form action="/admin/update-customer" method="POST" onsubmit="return confirm('Anda yakin data sudah benar?')"
        class="bg-white flex flex-col gap-10 p-5 items-end rounded-xl shadow-md">
        @csrf
        <h2 class="font-semibold text-start w-full text-3xl">Penghuni Kamar Nomor {{ $room_no }}</h2>
        <div class="flex gap-5 w-full">
            <div class="basis-1/2 flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <label for="id">ID</label>
                    <input disabled value="{{ $id }}" class="rounded-md bg-gray-100 border-[1.5px] border-gray-300"
                        id="id" name="id" type="text">
                    <input type="hidden" name="id" value="{{ $id }}">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="name">Nama</label>
                    <input required value="{{ $name }}" class="rounded-md border-[1.5px] border-gray-300"
                        id="name" name="name" type="text">
                </div>

            </div>
            <div class="basis-1/2 flex flex-col justify-end gap-4">
                <div class="flex flex-col gap-1">
                    <label for="phone">No. HP</label>
                    <input required value="{{ $phone }}" class="rounded-md border-[1.5px] border-gray-300"
                        id="phone" name="phone" type="tel">
                </div>
            </div>
        </div>


        <button type="submit"
            class="bg-gold w-fit text-white border-[1.5px] border-gold font-semibold py-2 px-5 rounded-md hover:bg-transparent hover:text-gold transition-all duration-150">Submit</button>


    </form>



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

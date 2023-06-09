@extends('layouts.admin-layout')

@section('title', 'Form')

@section('content')
    <form action="/admin/create-room" method="POST" onsubmit="return confirm('Anda yakin ingin mengambahkan ruangan baru?')"
        class="bg-white flex flex-col items-end gap-10 p-5 rounded-xl shadow-md">
        @csrf
        <div class="flex gap-5 w-full">
            <div class="basis-1/2 flex flex-col gap-4">
                <div class="flex flex-col gap-1">
                    <label for="room-no">Nomor</label>
                    <input required class="rounded-md border-[1.5px] border-gray-300" id="room-no" name="room-no"
                        type="number">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="image-link">Gambar</label>
                    <input required class="rounded-md border-[1.5px] border-gray-300" id="image-link" name="image-link"
                        type="url">
                </div>
                <div class="flex flex-col gap-1">
                    <label for="type">Tipe</label>
                    <select name="type" id="type" class="rounded-md border-[1.5px] border-gray-300">
                        @foreach ($types as $type)
                            <option value={{ $type }}>{{ $type }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="basis-1/2 flex flex-col justify-between gap-4">
                <div class="flex grow h-full flex-col gap-2">
                    <label for="desc">Fasilitas</label>
                    <textarea required name="desc" id="desc" class="resize-y border-[1.5px] h-full border-gray-300 rounded-md"></textarea>
                </div>
                <div class="flex flex-col gap-1">
                    <label for="price">Harga</label>
                    <input required class="rounded-md border-[1.5px] border-gray-300" id="price" name="price"
                        type="number">
                </div>
            </div>
        </div>


        <button type="submit"
            class="bg-gold text-white border-[1.5px] border-gold font-semibold py-2 px-5 rounded-md hover:bg-transparent hover:text-gold transition-all duration-150">Submit</button>
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

    <script>
        const nameInput = document.getElementById('name');
        const phoneInput = document.getElementById('phone');
        const statusFilledRadio = document.getElementById('status-filled');
        const statusEmptyRadio = document.getElementById('status-empty');

        // Initially disable the name and phone inputs
        nameInput.disabled = true;
        phoneInput.disabled = true;

        // Add bg-gray-200 class to disabled inputs
        nameInput.classList.add('bg-gray-200');
        phoneInput.classList.add('bg-gray-200');

        // Add event listener to the status radios
        statusFilledRadio.addEventListener('change', () => {
            nameInput.disabled = false;
            phoneInput.disabled = false;
            nameInput.classList.remove('bg-gray-200');
            phoneInput.classList.remove('bg-gray-200');
        });

        statusEmptyRadio.addEventListener('change', () => {
            nameInput.disabled = true;
            phoneInput.disabled = true;
            nameInput.classList.add('bg-gray-200');
            phoneInput.classList.add('bg-gray-200');
        });
    </script>
@endsection

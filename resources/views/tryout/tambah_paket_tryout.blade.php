<x-layouts>
    <x-slot:title>
        Tambah Paket Tryout
    </x-slot>

    <div class="container p-1">
        <form method="post">
            @csrf
            <div class="flex flex-col mt-4">
                <label for="nama_paket_tryout">Nama Paket Tryout</label>
                <input id="nama_paket_tryout" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="nama_paket_tryout" placeholder="Paket Tryout 1" value="{{ old('nama_paket_tryout') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
        </form>
    </div>
</x-layouts>

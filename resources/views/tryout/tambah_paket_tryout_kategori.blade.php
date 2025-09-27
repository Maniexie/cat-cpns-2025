<x-layouts>
    <x-slot:title>
        Tambah Paket Tryout Kategori
    </x-slot>

    <div class="container p-1">
        <div class="form">
            <form method="post">
                @csrf
                <div class="flex flex-col mt-4">
                    <label for="paket_tryout_id">Paket Tryout</label>
                    <select name="paket_tryout_id" id="paket_tryout_id"
                        class="flex-grow h-8 px-2 border rounded border-grey-400">
                        @foreach ($paketTryout as $paket)
                            <option value="{{ $paket->id }}">{{ $paket->nama_paket_tryout }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mt-4">
                    <label for="kategori_soal_id">Kategori Soal</label>
                    <select name="kategori_soal_id" id="kategori_soal_id"
                        class="flex-grow h-8 px-2 border rounded border-grey-400">
                        @foreach ($kategoriSoal as $kategori)
                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex flex-col mt-4">
                    <label for="jumlah_soal">Jumlah Soal</label>
                    <select name="jumlah_soal" id="jumlah_soal"
                        class="flex-grow h-8 px-2 border rounded border-grey-400">
                        <option value="30">30</option>
                        <option value="35">35</option>
                        <option value="45">45</option>
                    </select>
                </div>

                <div class="flex flex-col mt-8">
                    <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                        Submit
                    </button>
                </div>
            </form>
        </div>

    </div>
</x-layouts>

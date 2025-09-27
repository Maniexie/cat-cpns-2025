<x-layouts>
    <x-slot:title>
        Buat Soal
    </x-slot>

    <div class="container p-1">
        <form class="form-horizontal w-3/4 mx-auto" method="post">
            @csrf

            <div class="flex flex-col mt-4">
                <select name="paket_tryout_id" id="paket_tryout_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2 h-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled selected class="">
                        Pilih
                        Paket Tryout</option>
                    @foreach ($paketTryout as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->nama_paket_tryout }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="flex flex-col mt-4">
                <select name="kategori_soal_id" id=""
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2 h-8 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="" disabled selected class="">
                        Pilih
                        Kategori Soal</option>
                    @foreach ($kategoriSoal as $value)
                        <option value="{{ $value->id }}">
                            {{ $value->nama }}
                        </option>
                    @endforeach
                </select>
            </div>


            <div class="flex flex-col mt-4">
                <textarea name="pertanyaan" id="pertanyaan" name="pertanyaan" cols="30" rows="10"
                    class="flex-grow  border rounded border-grey-400">Pertanyaan</textarea>
            </div>

            <div class="flex flex-col mt-4">
                <input id="opsi_a" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="opsi_a" placeholder="opsi_a" value="{{ old('opsi_a') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="opsi_b" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="opsi_b" placeholder="opsi_b" value="{{ old('opsi_b') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="opsi_c" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="opsi_c" placeholder="opsi_c" value="{{ old('opsi_c') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="opsi_d" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="opsi_d" placeholder="opsi_d" value="{{ old('opsi_d') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="opsi_e" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="opsi_e" placeholder="opsi_e" value="{{ old('opsi_e') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="jawaban_benar" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="jawaban_benar" placeholder="jawaban_benar" value="{{ old('jawaban_benar') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="pembahasan" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="pembahasan" placeholder="pembahasan" value="{{ old('pembahasan') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="bobot_opsi" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="bobot_opsi" placeholder="bobot_opsi" value="{{ old('bobot_opsi') }}">
            </div>
            <div class="flex flex-col mt-8">
                <button type="submit"
                    class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded">
                    Submit
                </button>
            </div>

        </form>

    </div>
</x-layouts>

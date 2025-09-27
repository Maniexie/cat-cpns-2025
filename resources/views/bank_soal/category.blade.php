<x-layouts>
    <x-slot:title>
        Kategori Soal
    </x-slot>

    <div class="container p-1">
        <form method="post">
            @csrf
            <div class="flex flex-col mt-4">
                <label for="nama">Nama Kategori Soal</label>
                <input id="nama" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="nama" placeholder="TWK / TIU / TKP" value="{{ old('nama') }}">
            </div>
            <div class="flex flex-col mt-4">
                <label for="passing_grade">Passing Grade</label>
                <input id="passing_grade" type="number" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="passing_grade" placeholder="Passing Grade" value="{{ old('passing_grade') }}">
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

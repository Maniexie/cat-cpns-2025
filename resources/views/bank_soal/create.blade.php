<x-layouts>
    <x-slot:title>
        Buat Soal
    </x-slot>

    <div class="container p-1">
        <form class="form-horizontal w-3/4 mx-auto" method="post">
            @csrf
            <div class="flex flex-col mt-4">
                <input id="soal" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="soal" placeholder="soal" value="{{ old('soal') }}">
            </div>
            <div class="flex flex-col mt-4">
                <input id="jawaban" type="text" class="flex-grow h-8 px-2 border rounded border-grey-400"
                    name="jawaban" placeholder="jawaban" value="{{ old('jawaban') }}">
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

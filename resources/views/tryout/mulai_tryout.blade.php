<x-layouts>
    <x-slot:title>
        Mulai Tryout
    </x-slot>

    <div class="container p-1">




        <div class="container">
            <h1>Halaman Mulai Tryout</h1>
            <div class="flex border justify-between">
                @foreach ($bankSoal as $value)
                    <div class="flex-col">
                        <h3> {{ $value->pertanyaan }} </h3>
                        <p>A</p>
                    </div>
                    <div class="flex-col">
                        <h3>Nomor Soal</h3>
                        <p>A</p>

                    </div>
                @endforeach

            </div>
        </div>
    </div>
    </div>
</x-layouts>

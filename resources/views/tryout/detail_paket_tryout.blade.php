<x-layouts>

    <x-slot:title>
        Detail Paket Tryout - {{ $detailPaketTryout->nama_paket_tryout }}
    </x-slot>
    <div class="container p-1">
        {{-- @foreach ($detailPaketTryout as $d) --}}
        <h1>id : {{ $detailPaketTryout->id }} </h1>
        <h1>nama paket : {{ $detailPaketTryout->nama_paket_tryout }} </h1>
        {{-- @endforeach --}}

        {{-- <a href='/tryout/paket-tryout/mulai/{{ $detailPaketTryout->id }}' class="btn bg-blue-500">Mulai Tryout!</a> --}}
        <a href='/tryout/paket-tryout/{{ $detailPaketTryout->id }}/mulai' class="btn bg-blue-500">Mulai Tryout!</a>

    </div>
</x-layouts>

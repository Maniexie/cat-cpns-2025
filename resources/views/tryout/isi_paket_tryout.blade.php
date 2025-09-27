<x-layouts>
    <x-slot:title>
        Isi paket Tryout
    </x-slot>

    <div class="container p-1">
        <h1>Isi paket Tryout</h1>

        <table>
            <tr>
                <th>No</th>
                <th>Kategori Soal</th>
                <th>Soal</th>
                <th>Jawaban A</th>
                <th>Jawaban B</th>
                <th>Jawaban C</th>
                <th>Jawaban D</th>
                <th>Jawaban E</th>
                <th>Jawaban Benar</th>
                <th>Pembahasan</th>
                <th>Bobot Opsi</th>
            </tr>
            @foreach ($bankSoal as $soal)
                <tr>
                    {{-- <td>{{ $soal }}</td> --}}
                    <td>{{ $soal->id }}</td>
                    <td>{{ $soal->kategori_soal_id }}</td>
                    <td>{{ $soal->pertanyaan }}</td>
                    <td>{{ $soal->opsi_a }}</td>
                    <td>{{ $soal->opsi_b }}</td>
                    <td>{{ $soal->opsi_c }}</td>
                    <td>{{ $soal->opsi_d }}</td>
                    <td>{{ $soal->opsi_e }}</td>
                    <td>{{ $soal->jawaban_benar }}</td>
                    <td>{{ $soal->pembahasan }}</td>
                    <td>{{ $soal->bobot_opsi }}</td>
                </tr>
            @endforeach
        </table>

    </div>
</x-layouts>

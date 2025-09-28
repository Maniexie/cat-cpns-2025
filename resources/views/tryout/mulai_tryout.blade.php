<x-layouts>
    <x-slot:title>Mulai Tryout</x-slot:title>

    <div class="container-sm px-4 mx-auto">
        <div class="flex justify-between mb-4">
            <div id="timer" class="text-xl font-bold text-red-500"></div>
            <div>
                <button id="prevBtn" class="btn bg-gray-200 p-2">Sebelumnya</button>
                <button id="nextBtn" class="btn bg-gray-200 p-2">Berikutnya</button>
                <button id="finishBtn" class="btn bg-green-500 p-2 text-white" style="display:none;">Selesai</button>
            </div>
        </div>

        <div class="flex gap-4">
            <!-- Kolom Pertanyaan -->
            <div class="flex-10 border p-4">
                @foreach ($bankSoal as $index => $soal)
                    <div id="soal-{{ $index + 1 }}" class="soal" style="display:none;">
                        <div class="text-lg font-semibold mb-4">Soal {{ $index + 1 }}</div>
                        <p class="mb-4">{{ $soal->pertanyaan }}</p>
                        <div class="flex flex-col gap-2">
                            <label><input type="radio" name="soal{{ $index + 1 }}" value="A">
                                {{ $soal->opsi_a }}</label>
                            <label><input type="radio" name="soal{{ $index + 1 }}" value="B">
                                {{ $soal->opsi_b }}</label>
                            <label><input type="radio" name="soal{{ $index + 1 }}" value="C">
                                {{ $soal->opsi_c }}</label>
                            <label><input type="radio" name="soal{{ $index + 1 }}" value="D">
                                {{ $soal->opsi_d }}</label>
                            <label><input type="radio" name="soal{{ $index + 1 }}" value="E">
                                {{ $soal->opsi_e }}</label>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Kolom Navigasi -->
            <div class="flex-2 border p-4">
                <div class="text-lg font-semibold mb-4">Navigasi</div>
                @foreach ($bankSoal as $index => $nav)
                    <button class="btn bg-gray-200 p-2" data-navigasi-soal="{{ $index + 1 }}">
                        {{ $index + 1 }}
                    </button>
                @endforeach
            </div>
        </div>
    </div>

    <div class="container-sm px-4 mx-auto">
        <div class="flex justify-between mb-4">
            <p>jawaban_benar :{{ $bankSoal[0]->jawaban_benar }} </p>
            <p>Skor {{ $bankSoal[0]->bobot_opsi }}</p>
            <p class="total_skor">0</p>
        </div>

        {{-- <div class="container-sm px-4 mx-auto">
            <div class="flex justify-between mb-4">
                <div>
                    <button id="prevBtn" class="btn bg-gray-200 p-2">Sebelumnya</button>
                    <button id="nextBtn" class="btn bg-gray-200 p-2">Berikutnya</button>
                </div>
            </div>
        </div> --}}
        <button id="finishBtn" class="btn bg-green-500 p-2 text-white" style="display:none;">Selesai</button>

        {{-- <script src="js/jquery-3.7.1.min.js"></script> --}}
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                let totalSoal = {{ count($bankSoal) }}; // jumlah soal dari Laravel
                let currentSoal = 1; // soal aktif
                let answers = JSON.parse(localStorage.getItem('answers')) || {};

                // ====== TIMER 90 MENIT (tidak reset kalau refresh) ======
                let duration = 5400; // 90 menit = 5400 detik
                let endTime = localStorage.getItem("endTime");

                if (!endTime) {
                    endTime = Date.now() + duration * 1000;
                    localStorage.setItem("endTime", endTime);
                }

                function updateTimer() {
                    let now = Date.now();
                    let distance = Math.floor((endTime - now) / 1000);

                    if (distance <= 0) {
                        clearInterval(timerInterval);
                        alert("Waktu habis! Anda akan diarahkan ke dashboard.");
                        window.location.href = "/dashboard";
                    } else {
                        let m = Math.floor(distance / 60);
                        let s = distance % 60;
                        $("#timer").text(m + "m " + s + "s");
                    }
                }
                let timerInterval = setInterval(updateTimer, 1000);
                updateTimer();

                // ====== FUNGSI TAMPIL SOAL ======
                function showSoal(no) {
                    $(".soal").hide();
                    $("#soal-" + no).show();
                    currentSoal = no;

                    // toggle tombol prev/next
                    $("#prevBtn").toggle(no > 1);
                    $("#nextBtn").toggle(no < totalSoal);
                    $("#finishBtn").toggle(no === totalSoal);

                    // restore jawaban
                    if (answers["soal" + no]) {
                        $("input[name='soal" + no + "'][value='" + answers["soal" + no] + "']").prop("checked", true);
                    }
                }

                // ====== SIMPAN JAWABAN ======
                $(document).on("change", "input[type=radio]", function() {
                    let soal = $(this).attr("name"); // contoh: soal1
                    let jawaban = $(this).val();
                    answers[soal] = jawaban;
                    console.log(answers);
                    localStorage.setItem("answers", JSON.stringify(answers));
                });

                // ====== NAVIGASI ======
                $(".btn[data-navigasi-soal]").on("click", function() {
                    let no = $(this).data("navigasi-soal");
                    showSoal(no);
                });

                $("#prevBtn").on("click", function() {
                    if (currentSoal > 1) showSoal(currentSoal - 1);
                });

                $("#nextBtn").on("click", function() {
                    if (currentSoal < totalSoal) showSoal(currentSoal + 1);
                });

                // ====== SELESAI ======
                $("#finishBtn").on("click", function() {
                    $.ajax({
                        url: "/tryout/simpan-hasil",
                        method: "POST",
                        data: {
                            _token: "{{ csrf_token() }}",
                            answers: answers // object { soal1: "A", soal2: "B", ... }
                        },
                        // success: function(res) {
                        //     alert("Skor kamu: " + res.skor);
                        //     window.location.href = "/tryout";
                        // }
                    });
                    // contoh: hitung skor sederhana (kunci jawaban ambil dari server nanti)
                    let skor = 0;
                    let kunci =
                        @json($kunciJawaban ?? []); // misalnya bentuknya {soal1: "A", soal2: "B", ...}

                    for (let key in kunci) {
                        if (answers[key] === kunci[key]) {
                            skor++;
                        }
                    }

                    alert("Jawaban tersimpan. Skor kamu: " + skor);
                    localStorage.removeItem("answers");
                    localStorage.removeItem("endTime");
                    window.location.href = "/tryout";
                });

                // ====== MULAI ======
                showSoal(1);
            });
        </script>



</x-layouts>

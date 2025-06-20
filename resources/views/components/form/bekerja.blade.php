
<div id="additional-questions" class="hidden">
    <x-form.radio name="pekerjaan_6_bulan"
        label="Apakah anda telah mendapatkan pekerjaan <= 6 bulan / termasuk bekerja sebelum lulus?"
        :options="['ya' => 'Ya', 'tidak' => 'Tidak']" required="true" />

    <!-- Jika memilih "Ya" -->
    <div id="pertanyaan-ya" class="mt-6 hidden">
        <x-form.textbox name="bulan_mendapatkan_pekerjaan"
            label="Dalam berapa bulan anda mendapatkan pekerjaan?"
            type="number" />
    </div>

    <!-- Jika memilih "Tidak" -->
    <div id="pertanyaan-tidak" class="mt-6 hidden">
        <x-form.textbox name="bulan_waktu_dapat_pekerjaan"
            label="Berapa bulan waktu untuk mendapatkan pekerjaan pertama?"
            type="number" />
    </div>


    <x-form.textbox name="pendapatan"
        label="Berapa rata-rata pendapatan Anda per bulan? (take home pay)"
        required="true" />

    <x-form.radio name="lokasi" label="Dimana lokasi tempat Anda bekerja?"
        :options="['provinsi' => 'Provinsi', 'kabupaten' => 'Kab/Kota']" required="true" />

    <x-form.radio name="jenis_perusahaan"
        label="Apa jenis perusahaan/instansi tempat Anda bekerja sekarang?"
        :options="[
            'instansi_pemerintah' => 'Instansi pemerintah',
            'bumn' => 'BUMN/BUMD',
            'non_profit' => 'Organisasi non-profit',
            'perusahaan_swasta' => 'Perusahaan swasta',
            'wiraswasta' => 'Wiraswasta/perusahaan sendiri',
        ]" required="true" onChange="showTextbox()" />

    <x-form.textbox name="nama_perusahaan"
        label="Apa nama perusahaan/kantor tempat Anda bekerja?"
        required="true" />

    <x-form.radio name="hubungan_bidang_studi"
        label="Seberapa erat hubungan antara bidang studi dengan pekerjaan anda?"
        :options="[
            'Sangat Erat' => 'Sangat Erat',
            'Erat' => 'Erat',
            'Cukup Erat' => 'Cukup Erat',
            'Kurang Erat' => 'Kurang Erat',
            'Tidak Sama Sekali' => 'Tidak Sama Sekali',
        ]" required="true" />

    <x-form.radio name="tingkat_pendidikan"
        label="Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan anda saat ini?"
        :options="[
            'Setingkat Lebih Tinggi' => 'Setingkat Lebih Tinggi',
            'Tingkat yang Sama' => 'Tingkat yang Sama',
            'Setingkat Lebih Rendah' => 'Setingkat Lebih Rendah',
            'Tidak Perlu Pendidikan Tinggi' =>
                'Tidak Perlu Pendidikan Tinggi',
        ]" />


    <!-- Textbox untuk pilihan "Lainnya" -->
    <div id="lainnyaTextbox" class="my-4 hidden">
        <input type="text" id="jenis_perusahaan_lainnya"
            name="jenis_perusahaan_lainnya"
            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
    </div>

    <div class="mb-4">
        <label for="nama_perusahaan" class="block font-medium text-gray-700 mb-4">Pada saat ini, pada tingkat mana
            kompetensi di bawah ini diperlukan dalam pekerjaan?
        </label>
        <x-form.worker-tab nama="1" />
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            console.log("JavaScript Loaded!");

            const statusDropdown = document.getElementById("status");
            const additionalQuestions = document.getElementById("additional-questions");
            const pertanyaanYa = document.getElementById('pertanyaan-ya');
            const pertanyaanTidak = document.getElementById('pertanyaan-tidak');
            const inputBulanMendapatPekerjaan = document.getElementById("bulan_mendapatkan_pekerjaan");
            const inputBulanWaktuDapatPekerjaan = document.getElementById("bulan_waktu_dapat_pekerjaan");

            document.querySelectorAll('input[name="pekerjaan_6_bulan"]').forEach((radio) => {
                radio.addEventListener('change', function() {
                    if (this.value === 'ya') {
                        pertanyaanYa.classList.remove('hidden');
                        pertanyaanTidak.classList.add('hidden');
                        inputBulanMendapatPekerjaan.setAttribute('required', 'true');
                        inputBulanWaktuDapatPekerjaan.removeAttribute('required');
                    } else if (this.value === 'tidak') {
                        pertanyaanTidak.classList.remove('hidden');
                        pertanyaanYa.classList.add('hidden');
                        inputBulanWaktuDapatPekerjaan.setAttribute('required', 'true');
                        inputBulanMendapatPekerjaan.removeAttribute('required');
                    }
                });
            });
        });
    </script>
</div>

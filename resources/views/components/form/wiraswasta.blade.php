<div class="wiraswasta-question">

    <x-form.radio name="posisi_wiraswasta" label="Bila berwiraswasta, apa posisi/jabatan Anda saat ini?" :options="[
        'founder' => 'Founder',
        'co-founder' => 'Co-Founder',
        'staff' => 'Staff',
        'freelance' => 'Freelance/Kerja Lepas',
    ]"
        required="true" />

    <x-form.radio name="tingkat_tempat_kerja" label="Apa tingkat tempat kerja Anda?" :options="[
        'lokal' => 'Lokal/wilayah/wiraswasta tidak berbadan hukum',
        'nasional' => 'Nasional/wiraswasta berbadan hukum',
        'multinasional' => 'Multinasional/internasional',
    ]" required="true" />

    <x-form.radio name="hubungan_bidang_studi" label="Seberapa erat hubungan antara bidang studi dengan pekerjaan Anda?"
        :options="[
            'sangat_erat' => 'Sangat Erat',
            'erat' => 'Erat',
            'cukup_erat' => 'Cukup Erat',
            'kurang_erat' => 'Kurang Erat',
            'tidak_sama_sekali' => 'Tidak Sama Sekali',
        ]" required="true" />

    <x-form.radio name="tingkat_pendidikan"
        label="Tingkat pendidikan apa yang paling tepat/sesuai untuk pekerjaan Anda saat ini?" :options="[
            'setingkat_lebih_tinggi' => 'Setingkat Lebih Tinggi',
            'tingkat_yang_sama' => 'Tingkat yang Sama',
            'setingkat_lebih_rendah' => 'Setingkat Lebih Rendah',
            'tidak_perlu' => 'Tidak Perlu Pendidikan Tinggi',
        ]"
        required="true" />

    <div class="mb-4">
        <label for="nama_perusahaan" class="block font-medium text-gray-700 mb-4">Pada saat ini, pada tingkat mana
            kompetensi di bawah ini diperlukan dalam pekerjaan?
        </label>
        <x-form.worker-tab nama="1" />
    </div>

    <x-form.checkbox name="reasons_for_job" :options="[
        'pekerjaan_sesuai_pendidikan' =>
            'Pertanyaan tidak sesuai, pekerjaan saya saat ini sudah sesuai dengan pendidikan saya',
        'belum_mendapat_pekerjaan_sesuai' =>
            'Saya belum mendapatkan pekerjaan yang lebih sesuai dengan pendidikan saya',
        'prospek_karir' =>
            'Di pekerjaan ini saya memperoleh prospek karir yang baik',
        'pekerjaan_tidak_sesuai' =>
            'Saya lebih suka bekerja di area pekerjaan yang tidak ada hubungannya dengan pendidikan saya',
        'dipromosikan' =>
            'Saya dipromosikan ke posisi yang kurang berhubungan dengan pendidikan saya dibanding posisi sebelumnya',
        'pendapatan_lebih_tinggi' =>
            'Saya dapat memperoleh pendapatan yang lebih tinggi di pekerjaan ini',
        'pekerjaan_aman' =>
            'Pekerjaan saya saat ini lebih aman/terjamin/secure',
        'pekerjaan_menarik' => 'Pekerjaan saya saat ini lebih menarik',
        'pekerjaan_fleksibel' =>
            'Pekerjaan saya saat ini lebih memungkinkan saya mengambil pekerjaan tambahan/jadwal yang fleksibel, dll',
        'pekerjaan_dekat' =>
            'Pekerjaan saya saat ini lokasinya lebih dekat dari rumah saya',
        'pekerjaan_menjamin_kebutuhan' =>
            'Pekerjaan saya saat ini dapat lebih menjamin kebutuhan keluarga saya',
        'harus_terima_pekerjaan' =>
            'Pada awal meniti karir ini, saya harus menerima pekerjaan yang tidak berhubungan dengan pendidikan saya',
    ]"
        :selected="old('reasons_for_job', [])" >
        Mengapa Anda mengambil pekerjaan ini meskipun tidak sesuai dengan
        pendidikan Anda?
    </x-form.checkbox>
</div>

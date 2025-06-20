<div class="collage-questions">
    <x-form.radio name="sumber_biaya" label="Sumber Biaya:" :options="[
        'biaya_sendiri' => 'Biaya Sendiri',
        'beasiswa' => 'Beasiswa',
    ]" required="true" />
    
    <!-- Perguruan Tinggi -->
    <x-form.textbox name="perguruan_tinggi" label="Perguruan Tinggi:" required="true" />
    
    <!-- Program Studi -->
    <x-form.textbox name="program_studi" label="Program Studi:" required="true" />
    
    <!-- Tanggal Masuk -->
    <x-form.textbox name="tanggal_masuk" label="Tanggal Masuk:" type="date" required="true" />
</div>

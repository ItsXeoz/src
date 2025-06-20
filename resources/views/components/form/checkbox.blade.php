@props([
    'name', // Nama input checkbox
    'options' => [], // Daftar opsi checkbox [value => label]
    'selected' => [], // Nilai-nilai yang dicentang (array)
    'extraInput' => false, // Apakah ada input tambahan (contoh "Lainnya")
])

@php
    $selected = (array) $selected; // Pastikan selalu array untuk menghindari error
    $lainnyaTercentang = in_array('Lainnya', $selected);
    $lainnyaValue = old("{$name}_lainnya", $lainnyaTercentang ? ($selected['lainnya_value'] ?? '') : '');
@endphp

<div class="mb-4">
    <label class="block font-medium text-gray-700">{{ $slot }}</label>
    <div class="mt-2 space-y-2">
        @foreach ($options as $value => $label)
            <label class="block">
                <input type="checkbox" name="{{ $name }}[]" value="{{ $value }}"
                    class="form-checkbox text-indigo-600" @if (in_array($value, $selected)) checked @endif>
                <span class="ml-2">{{ $label }}</span>
            </label>
        @endforeach

        @if ($extraInput)
            <div class="mt-2">
                <label class="inline-flex items-center">
                    <input type="checkbox" id="{{ $name }}-lainnya-checkbox" name="{{ $name }}[]" value="Lainnya"
                        class="form-checkbox text-indigo-600" @if ($lainnyaTercentang) checked @endif>
                    <span class="ml-2">Lainnya:</span>
                </label>
                <input 
                    id="{{ $name }}-lainnya-input"
                    name="{{ $name }}_lainnya" 
                    aria-label="lainnya"
                    class="appearance-none border border-gray-300 rounded-sm p-2 w-full text-gray-700 leading-tight focus:outline-none focus:ring mt-2"
                    type="text" 
                    value="{{ $lainnyaValue }}"
                    @if (!$lainnyaTercentang) disabled @endif
                />
            </div>
        @endif
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const lainnyaCheckbox = document.getElementById('{{ $name }}-lainnya-checkbox');
        const lainnyaInput = document.getElementById('{{ $name }}-lainnya-input');

        if (lainnyaCheckbox && lainnyaInput) {
            lainnyaCheckbox.addEventListener('change', function () {
                lainnyaInput.disabled = !this.checked;
                if (!this.checked) {
                    lainnyaInput.value = ''; // Kosongkan input jika tidak dicentang
                }
            });
        }
    });
</script>

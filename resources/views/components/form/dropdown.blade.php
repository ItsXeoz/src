@props([
    'id',
    'name',
    'label',
    'options' => [],
    'required' => false,
    'placeholder' => 'Pilih opsi',
    'selected' => null // Default value agar tidak undefined
])

<div class="mb-6">
    <label for="{{ $id }}" class="block font-medium text-gray-700">
        {{ $label }}
    </label>
    <select 
        id="{{ $id }}" 
        name="{{ $name }}" 
        class="mt-1 block w-full border-gray-300 rounded-sm shadow-sm focus:ring-gray-500 focus:border-gray-500" 
        {{ $required ? 'required' : '' }}
    >
        <option value="" disabled {{ $selected === null ? 'selected' : '' }}>
            {{ $placeholder }}
        </option>
        @foreach ($options as $value => $text)
            <option value="{{ $value }}" {{ ($selected == $value) ? 'selected' : '' }}>
                {{ $text }}
            </option>
        @endforeach
    </select>
</div>

@props([
    'name',
    'label',
    'required' => false,
    'type' => 'text', // Default type adalah text
    'placeholder' => '', // Tambahan placeholder opsional
])

<div class="mb-4">
    <label for="{{ $name }}" class="block font-medium text-gray-700">{{ $label }}</label>
    <input 
        type="{{ $type }}" 
        name="{{ $name }}" 
        id="{{ $name }}"
        value="{{ old($name, $attributes->get('value', '')) }}"
        class="mt-1 block w-full rounded-sm shadow-sm border-gray-300 focus:ring-gray-500 focus:border-gray-500"
        placeholder="{{ $placeholder }}"
        {{ $required ? 'required' : '' }}
    />
</div>

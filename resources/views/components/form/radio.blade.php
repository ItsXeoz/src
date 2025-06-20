@props(['name', 'label', 'options' => [], 'selected' => null])

<div class="mb-4">
    <label class="block font-medium text-md text-gray-700 mb-2">{{ $label }}</label>
    <div class="space-y-2">
        @foreach ($options as $key => $value)
            <label class="inline-flex items-center">
                <input
                    type="radio"
                    name="{{ $name }}"
                    value="{{ $key }}"
                    @checked($selected == $key)
                    class="form-radio text-indigo-600"
                >
                <span class="ml-2">{{ $value }}</span>
            </label><br>
        @endforeach
    </div>
</div>

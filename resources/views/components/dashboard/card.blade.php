<div class="flex items-center p-4 bg-white rounded-lg shadow-xs">
    <div class="p-3 mr-4  rounded-full">
        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
            {!! $icon !!}
        </svg>
    </div>
    <div>
        <p class="mb-2 text-sm font-medium text-black opacity-80">
            {{ $title }}
        </p>
        <p class="text-lg font-semibold text-black opacity-80">
            {{ $value }}
        </p>
    </div>
</div>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/theme.css">
    <script src="/js/app.js"></script>
    <script src="/js/iconify-icon.min.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/js/overlay.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <title>Tracer Study</title>
</head>

<body class="bg-surface">
    <main>
        <div id="main-wrapper" class="flex p-5 xl:pr-0">
            <x-dashboard.sidebar />
            <div class="w-full page-wrapper xl:px-6 px-0">
                <main class="h-full max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">

                        <x-dashboard.navbar name="Survey" />

                        <div class="lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                            <div class="col-span-2">
                                <div class="card h-full">
                                    <div class="card-body">

                                        <!-- FORM -->
                                        <form action="{{ url()->secure('/store') }}" method="POST">
                                            @csrf

                                            {{-- Dropdown Status --}}
                                            @if (isset($questions['Universal']))
                                                <div class="category-section universal-section">

                                                    @foreach ($questions['Universal'] as $question)
                                                        @if ($question->type == 'Textbox')
                                                            <x-form.textbox name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" type="text" />
                                                        @elseif ($question->type == 'Radio')
                                                            <x-form.radio name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" :options="is_string($question->choices)
                                                                    ? json_decode($question->choices, true)
                                                                    : $question->choices" />
                                                        @elseif ($question->type == 'Checkbox')
                                                            <x-form.checkbox name="answers[{{ $question->id }}]"
                                                                :options="is_string($question->choices)
                                                                    ? json_decode($question->choices, true)
                                                                    : $question->choices">
                                                                {{ $question->question }}
                                                            </x-form.checkbox>
                                                        @elseif ($question->type == 'Dropdown')
                                                            @php
                                                                $options = is_string($question->choices)
                                                                    ? json_decode($question->choices, true)
                                                                    : $question->choices;

                                                                // pastikan selalu associative: ['Bekerja' => 'Bekerja']
                                                                $options = collect($options)
                                                                    ->values()
                                                                    ->mapWithKeys(fn($item) => [$item => $item])
                                                                    ->toArray();
                                                            @endphp

                                                            <x-form.dropdown id="answers_{{ $question->id }}"
                                                                name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" :options="$options" />
                                                        @elseif ($question->type == 'Scale Table')
                                                            <x-form.worker-tab :question="$question" />
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif

                                            {{-- Looping Pertanyaan Berdasarkan Kategori --}}
                                            @foreach ($questions as $category => $categoryQuestions)
                                                <div class="category-section hidden"
                                                    data-category="{{ strtolower(Str::slug($category, '-')) }}">

                                                    @foreach ($categoryQuestions as $question)
                                                        @if ($question->type == 'Textbox')
                                                            <x-form.textbox name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" type="text" />
                                                        @elseif ($question->type == 'Radio')
                                                            <x-form.radio name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" :options="is_string($question->choices)
                                                                    ? json_decode($question->choices, true)
                                                                    : $question->choices" />
                                                        @elseif ($question->type == 'Checkbox')
                                                            <x-form.checkbox name="answers[{{ $question->id }}]"
                                                                :options="is_string($question->choices)
                                                                    ? json_decode($question->choices, true)
                                                                    : $question->choices">
                                                                {{ $question->question }}
                                                            </x-form.checkbox>
                                                        @elseif ($question->type == 'Dropdown')
                                                            <x-form.dropdown id="answers_{{ $question->id }}"
                                                                name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" :options="json_decode($question->choices, true)" />
                                                        @elseif ($question->type == 'Scale Table')
                                                            <x-form.worker-tab :question="$question" />
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endforeach


                                            <button type="submit"
                                                class="px-4 py-2 bg-blue-600 text-white rounded-lg">Kirim</button>
                                        </form>

                                        {{-- JavaScript untuk Menampilkan Pertanyaan Berdasarkan Status --}}
                                        <script>
                                            document.addEventListener("DOMContentLoaded", function() {
                                                const statusDropdown = document.getElementById("answers_1");
                                                const categorySections = document.querySelectorAll(".category-section");

                                                if (!statusDropdown) {
                                                    console.warn("Status dropdown not found!");
                                                    return;
                                                }

                                                function slugify(text) {
                                                    return text.toLowerCase().replace(/\s+/g, '-');
                                                }

                                                function updateQuestions() {
                                                    const selectedStatus = slugify(statusDropdown.value);

                                                    categorySections.forEach(section => {
                                                        if (!section.classList.contains("universal-section")) {
                                                            section.classList.add("hidden");
                                                        }
                                                    });

                                                    const selectedSection = document.querySelector(`[data-category="${selectedStatus}"]`);
                                                    if (selectedSection) {
                                                        selectedSection.classList.remove("hidden");
                                                    }
                                                }

                                                statusDropdown.addEventListener("change", updateQuestions);
                                                updateQuestions();
                                            });
                                        </script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
</body>

</html>

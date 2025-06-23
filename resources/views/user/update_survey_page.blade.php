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
    <title>Edit Survey</title>
</head>

<body class="bg-surface">
    <main>
        <div id="main-wrapper" class="flex p-5 xl:pr-0">
            <x-dashboard.sidebar />
            <div class="w-full page-wrapper xl:px-6 px-0">
                <main class="h-full max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <x-dashboard.navbar name="Edit Survey" />

                        <div class="lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                            <div class="col-span-2">
                                <div class="card h-full">
                                    <div class="card-body">
                                        <!-- FORM -->
                                        <form action="{{ url()->secure('survey.update') }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            {{-- Universal Questions --}}
                                            @if (isset($questions['Universal']))
                                                <div class="category-section universal-section">
                                                    @foreach ($questions['Universal'] as $question)
                                                        @php
                                                            $oldAnswer = old(
                                                                'answers.' . $question->id,
                                                                $userAnswers[$question->id] ?? null,
                                                            );
                                                            $choices = is_string($question->choices)
                                                                ? json_decode($question->choices, true)
                                                                : $question->choices;
                                                        @endphp

                                                        @if ($question->type == 'Textbox')
                                                            <x-form.textbox name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" type="text"
                                                                value="{{ $oldAnswer }}" />
                                                        @elseif ($question->type == 'Radio')
                                                            <x-form.radio name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" :options="$choices"
                                                                :selected="$oldAnswer" />
                                                        @elseif ($question->type == 'Checkbox')
                                                            <x-form.checkbox name="answers[{{ $question->id }}][]"
                                                                :options="$choices"
                                                                :checked="is_array($oldAnswer)
                                                                    ? $oldAnswer
                                                                    : json_decode($oldAnswer, true)">{{ $question->question }}</x-form.checkbox>
                                                        @elseif ($question->type == 'Dropdown')
                                                            @php
                                                                $options = collect($choices)
                                                                    ->values()
                                                                    ->mapWithKeys(fn($item) => [$item => $item])
                                                                    ->toArray();
                                                            @endphp
                                                            <x-form.dropdown id="answers_{{ $question->id }}"
                                                                name="answers[{{ $question->id }}]"
                                                                label="{{ $question->question }}" :options="$options"
                                                                :selected="$oldAnswer" />
                                                        @elseif ($question->type == 'Scale Table')
                                                            <x-form.worker-tab :question="$question" :answer="$oldAnswer" />
                                                        @endif
                                                    @endforeach
                                                </div>
                                            @endif

                                            {{-- Category-Specific Questions --}}
                                            @foreach ($questions as $category => $categoryQuestions)
                                                @if ($category !== 'Universal')
                                                    <div class="category-section hidden"
                                                        data-category="{{ strtolower(Str::slug($category, '-')) }}">
                                                        @foreach ($categoryQuestions as $question)
                                                            @php
                                                                $oldAnswer = old(
                                                                    'answers.' . $question->id,
                                                                    $userAnswers[$question->id] ?? null,
                                                                );
                                                                $choices = is_string($question->choices)
                                                                    ? json_decode($question->choices, true)
                                                                    : $question->choices;
                                                            @endphp

                                                            @if ($question->type == 'Textbox')
                                                                <x-form.textbox name="answers[{{ $question->id }}]"
                                                                    label="{{ $question->question }}" type="text"
                                                                    value="{{ $oldAnswer }}" />
                                                            @elseif ($question->type == 'Radio')
                                                                <x-form.radio name="answers[{{ $question->id }}]"
                                                                    label="{{ $question->question }}" :options="$choices"
                                                                    :selected="$oldAnswer" />
                                                            @elseif ($question->type == 'Checkbox')
                                                                <x-form.checkbox name="answers[{{ $question->id }}][]"
                                                                    :options="$choices"
                                                                    :checked="is_array($oldAnswer)
                                                                        ? $oldAnswer
                                                                        : json_decode($oldAnswer, true)">{{ $question->question }}</x-form.checkbox>
                                                            @elseif ($question->type == 'Dropdown')
                                                                @php
                                                                    $options = collect($choices)
                                                                        ->values()
                                                                        ->mapWithKeys(fn($item) => [$item => $item])
                                                                        ->toArray();
                                                                @endphp
                                                                <x-form.dropdown id="answers_{{ $question->id }}"
                                                                    name="answers[{{ $question->id }}]"
                                                                    label="{{ $question->question }}"
                                                                    :options="$options" :selected="$oldAnswer" />
                                                            @elseif ($question->type == 'Scale Table')
                                                                <x-form.worker-tab name="answers[{{ $question->id }}]"
                                                                    label="{{ $question->question }}"
                                                                    :question="$question" :answer="$oldAnswer" />
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                @endif
                                            @endforeach

                                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg">
                                                Perbarui Jawaban
                                            </button>
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
                                                        const inputs = section.querySelectorAll("input, select, textarea");

                                                        if (!section.classList.contains("universal-section")) {
                                                            section.classList.add("hidden");
                                                            inputs.forEach(input => input.disabled = true);
                                                        } else {
                                                            inputs.forEach(input => input.disabled = false);
                                                        }
                                                    });

                                                    const selectedSection = document.querySelector(`[data-category="${selectedStatus}"]`);
                                                    if (selectedSection) {
                                                        selectedSection.classList.remove("hidden");
                                                        const inputs = selectedSection.querySelectorAll("input, select, textarea");
                                                        inputs.forEach(input => input.disabled = false);
                                                    }
                                                }

                                                // Pastikan fungsi ini dijalankan setelah halaman termuat
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

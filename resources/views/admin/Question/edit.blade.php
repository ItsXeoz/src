<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/css/theme.css">
    <script src="/js/app.js"></script>
    <script src="/js/iconify-icon.min.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/js/overlay.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">
    <title>Tracer Study</title>
</head>

<body class="bg-surface">
    <div id="main-wrapper" class="flex p-5 xl:pr-0">
        <x-dashboard.sidebar />
        <div class="w-full page-wrapper xl:px-6 px-0">
            <main class="h-full max-w-full">
                <div class="container full-container p-0 flex flex-col gap-6">
                    <x-dashboard.navbar name="Forms" />
                    <div class="lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">
                    </div>
                    <div class="bg-white rounded-lg shadow-md p-6" x-data="{
                        type: '{{ isset($question->type) ? $question->type : '' }}',
                        choices: {{ isset($question->choices) ? (is_string($question->choices) ? json_encode(json_decode($question->choices)) : json_encode($question->choices)) : '[]' }},
                        scaleQuestions: {{ isset($question->scale_questions) ? json_encode($question->scale_questions) : '[]' }},
                        scale_min: {{ isset($question->scale_min) ? $question->scale_min : 1 }},
                        scale_max: {{ isset($question->scale_max) ? $question->scale_max : 5 }},
                        scaleLabels: {{ isset($question->scale_labels) ? json_encode($question->scale_labels) : '[]' }}
                    }">

                        <h2 class="text-xl font-bold mb-4">Edit</h2>
                        <form action="{{ route('questions.update', $question->id) }}" method="POST">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label class="block text-gray-700">Pertanyaan</label>
                                <input type="text" name="question" value="{{ $question->question }}"
                                    class="w-full p-2 border rounded-lg">
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">Tipe</label>
                                <select name="type" required class="w-full p-2 border rounded-lg" x-model="type">
                                    <option disabled value="">Pilih</option>
                                    <option value="Dropdown" {{ $question->type == 'Dropdown' ? 'selected' : '' }}>Dropdown</option>
                                    <option value="Checkbox" {{ $question->type == 'Checkbox' ? 'selected' : '' }}>Checkbox</option>
                                    <option value="Radio" {{ $question->type == 'Radio' ? 'selected' : '' }}>Radio</option>
                                    <option value="Textbox" {{ $question->type == 'Textbox' ? 'selected' : '' }}>Textbox</option>
                                    <option value="Scale Table" {{ $question->type == 'Scale Table' ? 'selected' : '' }}>Scale Table</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">Jenis Pertanyaan</label>
                                <select required name="category" class="w-full p-2 border rounded-lg">
                                    <option disabled value="">Pilih</option>
                                    <option value="Universal" {{ $question->category == 'Universal' ? 'selected' : '' }}>Universal</option>
                                    <option value="Bekerja" {{ $question->category == 'Bekerja' ? 'selected' : '' }}>Kategori Bekerja</option>
                                    <option value="Wiraswasta" {{ $question->category == 'Wiraswasta' ? 'selected' : '' }}>Kategori Wiraswasta</option>
                                    <option value="Melanjutkan Pendidikan" {{ $question->category == 'Melanjutkan Pendidikan' ? 'selected' : '' }}>Kategori Pendidikan</option>
                                    <option value="Tidak Bekerja" {{ $question->category == 'Tidak Bekerja' ? 'selected' : '' }}>Kategori Tidak Bekerja</option>
                                    <option value="Mencari Pekerjaan" {{ $question->category == 'Mencari Pekerjaan' ? 'selected' : '' }}>Kategori Mencari Pekerjaan</option>
                                </select>
                            </div>

                            <div class="mb-4" x-show="!(type === 'Textbox')">
                                <label class="block text-gray-700">Choices</label>
                                <template x-for="(choice, index) in choices" :key="index">
                                    <div class="flex space-x-2 mb-2">
                                        <input type="text" :name="'choices[' + index + ']'" x-model="choices[index]"
                                            class="w-full p-2 border rounded-lg">
                                        <button type="button" class="bg-red-500 text-white px-3 py-1 rounded-lg"
                                            @click="choices.splice(index, 1)" x-show="choices.length > 1">-</button>
                                    </div>
                                </template>
                                <button type="button" class="bg-blue-600 text-white px-3 py-1 rounded-lg"
                                    @click="choices.push('')">+</button>
                            </div>

                            <div class="mt-4" x-show="type === 'Scale Table'">
                                <label class="block text-gray-700">Scale Range</label>
                                <div class="flex space-x-2">
                                    <input type="number" x-model="scale_min" name="scale_min"
                                        class="w-1/3 p-2 border rounded-lg" min="1" placeholder="Min">
                                    <input type="number" x-model="scale_max" name="scale_max"
                                        class="w-1/3 p-2 border rounded-lg" min="1" placeholder="Max">
                                </div>
                            </div>

                            <div class="mt-4">
                                <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded-lg">Perbarui</button>
                            </div>
                        </form>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

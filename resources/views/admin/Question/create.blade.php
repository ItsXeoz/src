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
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
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
                        type: '',
                        choices: [''],
                        scaleQuestions: [''],
                        scale_min: 1,
                        scale_max: 5,
                        scaleLabels: []
                    }">

                        <h2 class="text-xl font-bold mb-4">Tambah Pertanyaan</h2>
                        <form action="{{ url()->secure('/questions/store') }}" method="POST">
                            @csrf

                            <!-- Question -->
                            <div class="mb-4">
                                <label class="block text-gray-700">Question</label>
                                <input type="text" name="question" class="w-full p-2 border rounded-lg">
                            </div>

                            <!-- Type -->
                            <div class="mb-4">
                                <label class="block text-gray-700">Type</label>
                                <select name="type" required class="w-full p-2 border rounded-lg" x-model="type">
                                    <option disabled value="">Pilih</option>
                                    <option value="Dropdown">Dropdown</option>
                                    <option value="Checkbox">Checkbox</option>
                                    <option value="Radio">Radio</option>
                                    <option value="Textbox">Textbox</option>
                                    <option value="Scale Table">Scale Table</option>
                                </select>
                            </div>

                            <div class="mb-4">
                                <label class="block text-gray-700">Jenis Pertanyaan</label>
                                <select required name="category" class="w-full p-2 border rounded-lg"
                                    x-model="category">
                                    <option disabled value="">Pilih</option>
                                    <option value="Universal">Universal</option>
                                    <option value="Bekerja">Kategori Bekerja</option>
                                    <option value="Wiraswasta">Kategori Wiraswasta</option>
                                    <option value="Melanjutkan Pendidikan">Kategori Melanjutkan Pendidikan</option>
                                    <option value="Tidak Bekerja">Kategori Tidak Bekerja</option>
                                    <option value="Mencari Pekerjaan">Kategori Sedang Mencari Pekerjaan</option>
                                </select>
                            </div>


                            <!-- Choices (Hidden for Textbox & Scale Table) -->
                            <div class="mb-4" x-show="!(type === 'Textbox' )">
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

                            <!-- Scale Table Configuration -->
                            <div class="mb-4" x-show="type === 'Scale Table'">

                                <!-- Scale Range -->
                                <div class="mt-4">
                                    <label class="block text-gray-700">Scale Range</label>
                                    <div class="flex space-x-2">
                                        <input type="number" x-model="scale_min" name="scale_min"
                                            class="w-1/3 p-2 border rounded-lg" min="1" placeholder="Min">
                                        <input type="number" x-model="scale_max" name="scale_max"
                                            class="w-1/3 p-2 border rounded-lg" min="1" placeholder="Max">
                                    </div>
                                </div>
                            </div>

                            <!-- Submit Button -->
                            <div class="mt-4">
                                <button type="submit"
                                    class="bg-green-500 text-white px-4 py-2 rounded-lg">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>
        </main>
    </div>
    </div>
</body>

</html>

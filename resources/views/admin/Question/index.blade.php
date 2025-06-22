<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="/css/theme.css">
    <script src="/js/app.js"></script>
    <script src="/js/iconify-icon.min.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/js/overlay.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">
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
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <div class="flex justify-between items-center mb-4">
                                <h2 class="text-lg font-semibold">Daftar Pertanyaan</h2>
                                <a href="{{ route('questions.create') }}"
                                    class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow ">Tambah Pertanyaan</a>
                            </div>

                            <div x-data="{
                                sortCategory: '{{ request('category') ?? '' }}',
                                updateURL() {
                                    window.location.href = '{{ route('questions.index') }}' + (this.sortCategory ? '?category=' + this.sortCategory : '');
                                }
                            }">

                                <!-- Dropdown Sorting -->
                                <div class="mb-4 flex items-center">
                                    <label class="mr-2 text-gray-700">Sort by Category:</label>
                                    <select x-model="sortCategory" x-on:change="updateURL()"
                                        class="border px-3 py-2 rounded-lg">
                                        <option value="">All</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category }}"
                                                {{ request('category') == $category ? 'selected' : '' }}>
                                                {{ ucfirst($category) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <!-- Table -->
                                <div class="overflow-x-auto">
                                    <table class="w-full text-sm pl-5 text-left border-spacing-2 text-gray-500">
                                        <thead class="bg-gray-200">
                                            <tr>
                                                <th class="px-6 py-3 border-b text-left">No</th>
                                                <th class="px-6 py-3 border-b text-left">Question</th>
                                                <th class="px-6 py-3 border-b text-left">Tipe</th>
                                                <th class="px-6 py-3 border-b text-left">Kategori</th>
                                                <th class="px-6 py-3 border-b text-left">Created At</th>
                                                <th class="px-6 py-3 border-b text-left">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($questions as $index => $question)
                                                <tr class="border-b hover:bg-gray-50">
                                                    <td class="px-6 py-4">{{ $questions->firstItem() + $index }}</td>
                                                    <td class="px-6 py-4">{{ $question->question }}</td>
                                                    <td class="px-6 py-4">{{ $question->type }}</td>
                                                    <td class="px-6 py-4">{{ ucfirst($question->category) }}</td>
                                                    <td class="px-6 py-4">{{ $question->created_at->format('d-m-Y') }}
                                                    </td>
                                                    <td class="px-6 py-4 flex space-x-2">
                                                        <a href="{{ route('questions.edit', $question->id) }}"
                                                            class="bg-yellow-500 text-white px-4 py-2 rounded-lg shadow hover:bg-yellow-600">Edit</a>
                                                        <form action="{{ route('questions.destroy', $question->id) }}"
                                                            method="POST"
                                                            onsubmit="return confirm('Apakah Anda yakin?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button
                                                                class="bg-red-500 text-white px-4 py-2 rounded-lg shadow hover:bg-red-600">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <!-- Pagination -->
                                <div class="mt-4">
                                    {{ $questions->appends(['category' => request('category')])->links() }}
                                </div>

                            </div>



                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
</body>

</html>

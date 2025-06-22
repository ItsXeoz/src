<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
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
    <!-- Core Css -->
    <title>Tracer Study</title>
</head>

<body class=" bg-surface">
    <main>
        <!--start the project-->
        <div id="main-wrapper" class=" flex p-5 xl:pr-0">
            <x-dashboard.sidebar />
            <div class=" w-full page-wrapper xl:px-6 px-0">
                <main class="h-full  max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <x-dashboard.navbar name="Users" />
                        <div class="lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6 ">
                            <div class="col-span-2">
                                <div class="card h-full">
                                    <div class="bg-white rounded-lg shadow-md p-6 flex-col  w-full">
                                        <div class="flex justify-end px-6">
                                            <a href="{{ url('/export-answers') }}"
                                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-md transition duration-150">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2"
                                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        stroke-width="2" d="M4 4v16h16V4H4zm4 4h8m-8 4h8m-8 4h8" />
                                                </svg>
                                                Export Excel
                                            </a>
                                        </div>
                                        <table class="w-full text-sm text-left border-spacing-2 text-gray-500">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        No
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Nama
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        NIM
                                                    </th>
                                                    <th scope="col" class="px-6 py-3">
                                                        Status
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($users as $index => $user)
    @if ($user->role === 'user')
        <tr class="bg-white border-b hover:bg-gray-50">
            <th scope="row"
                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                {{ $index +1}}
            </th>
            <td class="px-6 py-4">
                {{ $user->name }}
            </td>
            <td class="px-6 py-4">
                {{ $user->nim }}
            </td>
            <td class="px-6 py-4">
                {{ $user->answers->isNotEmpty() ? 'Sudah Mengisi' : 'Belum Mengisi' }}
            </td>
        </tr>
    @endif
@empty
    <tr>
        <td colspan="5" class="text-center py-4">Tidak ada data.</td>
    </tr>
@endforelse

                                            </tbody>

                                        </table>

                                    </div>
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

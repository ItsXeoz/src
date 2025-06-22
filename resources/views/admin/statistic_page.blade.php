<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Tracer Study</title>

    <!-- Flowbite and Tailwind -->
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" rel="stylesheet">

    <!-- Fonts and Icons -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@2.44.0/tabler-icons.min.css">

    <!-- Chart Library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Vite Assets -->
    <link rel="stylesheet" href="/css/theme.css">
    <script src="/js/app.js"></script>
    <script src="/js/iconify-icon.min.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/js/overlay.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
</head>

<body class="bg-surface">
    <main>
        <div id="main-wrapper" class="flex p-5 xl:pr-0">
            <x-dashboard.sidebar />
            <div class="w-full page-wrapper xl:px-6 px-0">
                <main class="h-full max-w-full">
                    <div class="container full-container p-0 flex flex-col gap-6">
                        <x-dashboard.navbar name="Statistic" />
                        <div class="lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6">

                            <div class="bg-white rounded-lg shadow-md p-6 w-full">
                                <h1 class="text-2xl font-bold mb-4">Survey Statistics</h1>

                                <div x-data="{
                                    status: '{{ $selectedStatus }}',
                                    updateURL() {
                                        const param = this.status ? '?status=' + encodeURIComponent(this.status) : '';
                                        window.location.href = '{{ route('/admin/statistic') }}' + param;
                                    }
                                }">
                                    <div class="mb-6 p-6 bg-white rounded shadow">
                                        <label class="mr-2 font-medium text-gray-700">Filter Status Alumni:</label>
                                        <select x-model="status" @change="updateURL"
                                            class="border px-3 py-2 rounded-lg">
                                            <option value="">Semua</option>
                                            @foreach ($statuses as $status)
                                                <option value="{{ $status }}">{{ ucfirst($status) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    @foreach ($charts as $i => $chart)
                                        <div class="bg-white p-6 rounded-lg shadow mb-6">
                                            <h2 class="text-lg font-semibold mb-4">{{ $chart['question'] }}</h2>
                                            <div id="chart-{{ $i }}" style="height: 350px;"></div>
                                        </div>

                                        <script>
                                            new ApexCharts(document.querySelector("#chart-{{ $i }}"), {
                                                chart: {
                                                    type: 'pie',
                                                    height: 350
                                                },
                                                labels: {!! json_encode($chart['labels']) !!},
                                                series: {!! json_encode($chart['series']) !!},
                                                colors: ['#3b82f6', '#10b981', '#f97316', '#ef4444', '#a855f7'],
                                                legend: {
                                                    position: 'bottom'
                                                },
                                            }).render();
                                        </script>
                                    @endforeach
                                </div>
                                <!-- Tambahkan ApexCharts CDN -->
                                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>



                                {{-- @php
                                    $jawabanWaktuKerja = DB::table('answers')
                                        ->where('question_id', 11)
                                        ->pluck('answer');
                                    $jawabanYa = $jawabanWaktuKerja->filter(fn($a) => strtolower($a) === 'ya')->count();
                                    $jawabanTidak = $jawabanWaktuKerja
                                        ->filter(fn($a) => strtolower($a) === 'tidak')
                                        ->count();
                                @endphp

                                <!-- Pie Chart: Mendapatkan Pekerjaan <= 6 Bulan -->
                                <div class="bg-white p-6 rounded-lg shadow-md mb-6">
                                    <h2 class="text-lg font-semibold mb-4">Apakah anda telah mendapatkan pekerjaan <= 6
                                            bulan / termasuk bekerja sebelum lulus?</h2>
                                            <div id="piechart-ya-tidak"></div>
                                </div>

                                <script>
                                    const piechartYaTidak = new ApexCharts(document.querySelector("#piechart-ya-tidak"), {
                                        chart: {
                                            type: 'pie',
                                            height: 350
                                        },
                                        labels: ['Ya', 'Tidak'],
                                        series: [{{ $jawabanYa }}, {{ $jawabanTidak }}],
                                        colors: ['#22c55e', '#ef4444'],
                                        legend: {
                                            position: 'bottom'
                                        },
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 300
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                    });
                                    piechartYaTidak.render();
                                </script>

                                <!-- Pie Chart: Lokasi Kerja -->
                                @php
                                    $lokasiKerja = DB::table('answers')
                                        ->where('question_id', 13)
                                        ->select('answer', DB::raw('count(*) as total'))
                                        ->groupBy('answer')
                                        ->get();

                                    $labels = $lokasiKerja->pluck('answer');
                                    $series = $lokasiKerja->pluck('total');
                                @endphp

                                <div class="bg-white p-6 rounded-lg shadow-md">
                                    <h2 class="text-lg font-semibold mb-4">Dimana lokasi tempat Anda bekerja?</h2>
                                    <div id="lokasi-chart"></div>
                                </div>

                                <script>
                                    const lokasiChart = new ApexCharts(document.querySelector("#lokasi-chart"), {
                                        chart: {
                                            type: 'pie',
                                            height: 350
                                        },
                                        labels: {!! json_encode($labels) !!},
                                        series: {!! json_encode($series) !!},
                                        legend: {
                                            position: 'bottom'
                                        },
                                        colors: ['#6366F1', '#22C55E', '#FACC15', '#EC4899', '#3B82F6', '#F97316', '#14B8A6'],
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 300
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                    });
                                    lokasiChart.render();
                                </script>

                                <!-- Pie Chart: Jenis Perusahaan -->
                                @php
                                    $jenisPerusahaan = DB::table('answers')
                                        ->where('question_id', 14)
                                        ->select('answer', DB::raw('count(*) as total'))
                                        ->groupBy('answer')
                                        ->get();

                                    $labels = $jenisPerusahaan->pluck('answer');
                                    $series = $jenisPerusahaan->pluck('total');
                                @endphp

                                <div class="bg-white p-6 rounded-lg shadow-md mt-6">
                                    <h2 class="text-lg font-semibold mb-4">Apa jenis perusahaan/instansi/institusi
                                        tempat anda bekerja sekarang?</h2>
                                    <div id="jenis-perusahaan-chart"></div>
                                </div>

                                <script>
                                    const jenisPerusahaanChart = new ApexCharts(document.querySelector("#jenis-perusahaan-chart"), {
                                        chart: {
                                            type: 'pie',
                                            height: 350
                                        },
                                        labels: {!! json_encode($labels) !!},
                                        series: {!! json_encode($series) !!},
                                        legend: {
                                            position: 'bottom'
                                        },
                                        colors: ['#1E3A8A', '#F59E0B', '#10B981', '#EF4444', '#8B5CF6', '#EC4899'],
                                        responsive: [{
                                            breakpoint: 480,
                                            options: {
                                                chart: {
                                                    width: 300
                                                },
                                                legend: {
                                                    position: 'bottom'
                                                }
                                            }
                                        }]
                                    });
                                    jenisPerusahaanChart.render();
                                </script> --}}

                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
    </main>
</body>

</html>

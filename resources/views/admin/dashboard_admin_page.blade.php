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
    @vite(['resources/css/theme.css', 'resources/js/app.js', 'resources/js/iconify-icon.min.js', 'resources/js/sidebarmenu.js', 'resources/js/overlay.js', 'resources/js/index.js', 'resources/js/jquery.min.js', 'resources/js/simplebar.min.js'])
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
                        <x-dashboard.navbar name="Dashboard" />
                        <div class="lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6 ">
                            <div class="col-span-2">
                                @php
                                    $employmentAnswers = DB::table('answers')
                                        ->join('questions', 'answers.question_id', '=', 'questions.id')
                                        ->where('questions.category', 'Universal') // Atau sesuaikan
                                        ->where('questions.question', 'Jelaskan status Anda saat ini?') // Sesuaikan jika perlu
                                        ->pluck('answers.answer');

                                    $employmentCounts = [
                                        'Bekerja' => 0,
                                        'Wiraswasta' => 0,
                                        'Melanjutkan Pendidikan' => 0,
                                        'Mencari Pekerjaan' => 0,
                                        'Tidak Bekerja' => 0,
                                    ];

                                    foreach ($employmentAnswers as $answer) {
                                        if (isset($employmentCounts[$answer])) {
                                            $employmentCounts[$answer]++;
                                        }
                                    }
                                @endphp




                                <div
                                    class="relative flex flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-md m-10">
                                    <div
                                        class="relative mx-4 mt-4 flex flex-col gap-4 overflow-hidden rounded-none bg-transparent bg-clip-border text-gray-700 shadow-none md:flex-row md:items-center">

                                    </div>
                                    <div class="pt-6 px-2 pb-0">
                                        <div id="employment-chart"></div>
                                    </div>
                                </div>

                                <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
                                <div class="grid gap-6 mb-8 xl:grid-cols-3 md:grid-cols-2 ">
                                    <x-dashboard.card title="Total" value="{{ $totalBekerja }}" :icon="'<path d=\'M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z\'></path>'" />
                                    <x-dashboard.card title="Bekerja" value="{{ $totalBekerja }}" :icon="'<path d=\'M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z\'></path>'" />
                                    <x-dashboard.card title="Wiraswasta" value="{{ $totalWiraswasta }}" :icon="'<path d=\'M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z\'></path>'" />
                                    <x-dashboard.card title="Melanjutkan Pendidikan" value="{{ $totalPendidikan }}" :icon="'<path d=\'M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z\'></path>'" />
                                    <x-dashboard.card title="Sedang mencari kerja " value="{{ $totalMencari }}" :icon="'<path d=\'M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z\'></path>'" />
                                    <x-dashboard.card title="Belum Memungkinkan Bekerja" value="0"
                                        :icon="'<path d=\'M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3zM6 8a2 2 0 11-4 0 2 2 0zM16 18v-3a5.972 5.972 0 00-.75-2.906A3.005 3.005 0 0119 15v3h-3zM4.75 12.094A5.973 5.973 0 004 15v3H1v-3a3 3 0 013.75-2.906z\'></path>'" />
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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const employmentChartConfig = {
            series: [{
                name: "Total Individu",
                data: {!! json_encode(array_values($employmentCounts)) !!},
            }],
            chart: {
                type: "bar",
                height: 280,
                toolbar: {
                    show: false,
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: "50%",
                    borderRadius: 5,
                },
            },
            colors: ["#4A90E2"],
            dataLabels: {
                enabled: false,
            },
            xaxis: {
                categories: {!! json_encode(array_keys($employmentCounts)) !!},
                labels: {
                    style: {
                        colors: "#4B5563",
                        fontSize: "12px",
                    },
                },
            },
            yaxis: {
                labels: {
                    style: {
                        colors: "#4B5563",
                        fontSize: "12px",
                    },
                },
                title: {
                    text: "Jumlah Individu",
                    style: {
                        color: "#4B5563",
                        fontSize: "14px",
                    },
                },
            },
            grid: {
                borderColor: "#E5E7EB",
                strokeDashArray: 4,
            },
            tooltip: {
                theme: "light",
            },
        };

        const employmentChart = new ApexCharts(
            document.querySelector("#employment-chart"),
            employmentChartConfig
        );

        employmentChart.render();
    });
</script>

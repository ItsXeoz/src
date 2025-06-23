<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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
                        <div class="lg:gap-x-6 gap-x-0 lg:gap-y-0 gap-y-6 z">
                            <div class="col-span-2">
                                <div class="card h-full">
                                    <div class="bg-white rounded-lg shadow-md p-6 flex space-x-6 w-full">
                                        <img alt="Profile picture of Abidzar Giffari"
                                            class="w-32 h-40 rounded-md flex object-cover"
                                            src="{{ Auth::user()->photo_url }}" />
                                        <div class="flex-1 ">
                                            <div class="flex justify-between items-center">
                                                <div>
                                                    <h2 class="text-lg font-semibold text-gray-800">
                                                        {{ Auth::user()->name }}</h2>
                                                    <p class="text-sm text-gray-500">{{ Auth::user()->nim }}</p>
                                                </div>
                                                <div
                                                    class=" text-gray-700 rounded p-2 text-xs shadow-md border border-black">
                                                    2022
                                                </div>
                                            </div>
                                            <div class="mt-4 space-y-2">
                                                
                                                <div class="flex items-center text-sm">
                                                    <svg class="h-5 w-5 text-black opacity-60" width="24"
                                                        height="24" viewBox="0 0 24 24" stroke-width="2"
                                                        stroke="currentColor" fill="none" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" />
                                                        <path
                                                            d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                                                        <line x1="13" y1="7" x2="13"
                                                            y2="7.01" />
                                                        <line x1="17" y1="7" x2="17"
                                                            y2="7.01" />
                                                        <line x1="17" y1="11" x2="17"
                                                            y2="11.01" />
                                                        <line x1="17" y1="15" x2="17"
                                                            y2="15.01" />
                                                    </svg>
                                                    <span class="pl-2">Sains Dan Teknologi</span>
                                                </div>
                                                <div class="justify-between flex">

                                                    <div class="flex items-center text-sm">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="w-5 h-5 opacity-60" width="24" height="24"
                                                            viewBox="0 0 48 48">
                                                            <g fill="none" stroke="currentColor"
                                                                stroke-linejoin="round" stroke-width="4">
                                                                <path d="M2 17.4L23.022 9l21.022 8.4l-21.022 8.4z" />
                                                                <path stroke-linecap="round"
                                                                    d="M44.044 17.51v9.223m-32.488-4.908v12.442S16.366 39 23.022 39c6.657 0 11.467-4.733 11.467-4.733V21.825" />
                                                            </g>
                                                        </svg>
                                                        <span class="pl-2 ">Teknik Informatika</span>
                                                    </div>

                                                </div>
                                                <div class="justify-end flex">
                                                    @php
                                                        $user_id = Auth::user()->id;
                                                        $survey = DB::table('answers')
                                                            ->where('user_id', $user_id)
                                                            ->first();
                                                    @endphp
                                                    <a
                                                        href="{{ $survey ? route('/user/update') : route('/user/survey') }}">
                                                        <button
                                                            class="bg-yellow-500 text-white rounded-md px-4 py-2 text-sm font-semibold hover:bg-yellow-600">
                                                            {{ $survey ? 'Edit Survey' : 'Isi Survey' }}
                                                        </button>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Tombol -->
                                    </div>
                                    @php
                                        $employmentAnswers = DB::table('answers')
                                            ->join('questions', 'answers.question_id', '=', 'questions.id')
                                            ->where('questions.category', 'Universal') // Atau sesuaikan
                                            ->where('questions.question',  'Jelaskan status Anda saat ini?') // Sesuaikan jika perlu
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
    const employmentChartConfig = {
        series: [{
            name: "Total Individuals",
            data: {!! json_encode(array_values($employmentCounts)) !!}, // nilai-nilai
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
            categories: {!! json_encode(array_keys($employmentCounts)) !!}, // label
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
</script>

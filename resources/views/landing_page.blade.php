<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/vendor/glightbox/css/glightbox.min.css">
    <link rel="stylesheet" href="/vendor/swiper/swiper-bundle.min.css">
    <script src="/js/app.js"></script>
    <script src="/js/iconify-icon.min.js"></script>
    <script src="/js/sidebarmenu.js"></script>
    <script src="/js/overlay.js"></script>
    <script src="/js/index.js"></script>
    <script src="/js/jquery.min.js"></script>
    <script src="/js/simplebar.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/php-email-form/validate.js"></script>
    <script src="/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
    <script src="/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="/js/main.js"></script>

    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/purecounterjs@1.5.0/dist/purecounter_vanilla.js"></script>
    <script>
        new PureCounter();
    </script>

    <!-- Vendor CSS Files -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <!-- Main CSS File -->
</head>

<body class="index-page">
    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl justify-between position-relative d-flex align-items-center">
            <div class="flex">
                <img alt="Logo" class="h-12 w-12 object-cover mr-3"
                    src="https://media.githubusercontent.com/media/ItsXeoz/src/main/public/images/logo%20if.png" />
                <div>
                    <h1 class="text-lg md:text-xl font-bold">Tracer Study</h1>
                    <p class="text-sm">Teknik Informatika</p>
                </div>
            </div>
            @auth
                <div class="relative">
                    <button id="avatarButton"
                        class="relative z-10 w-12 h-12 rounded-full overflow-hidden border-4 border-yellow-300 hover:border-yellow-200 focus:outline-none">
                        <img src="{{ Auth::user()->photo_url }}" alt="User Avatar"
                            class="w-full h-full object-cover rounded-full">
                    </button>
                    <div id="avatarDropdown"
                        class="absolute right-0 mt-2 w-32 bg-white rounded-lg shadow-lg py-2 hidden transition duration-200 z-50">
                        <a href="" class="block px-4 py-2 text-black hover:bg-yellow-200">Profile</a>
                        <a href="" class="block px-4 py-2 text-black hover:bg-yellow-200">Settings</a>
                        <a href="{{ route('logout') }}" class="block px-4 py-2 text-black hover:bg-yellow-200"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a class="btn-getstarted" href="{{ url()->secure('/auth/login') }}">Login</a>
            @endauth
        </div>
    </header>

    <main class="main">
        <!-- Hero Section -->
        <section id="hero" class="hero section">
            <img src="https://media.githubusercontent.com/media/ItsXeoz/src/main/public/images/graduate.png"
                alt="" data-aos="fade-in" class="">
            <div class="container justify-content-center">
                <div class="row justify-content-center" data-aos="zoom-out">
                    <div class="col-xl-7 col-lg-9 text-center">
                        <h1>Tracer Study</h1>
                        <p>Teknik Informatika UIN Sunan Gunung Djati</p>
                    </div>
                </div>
                <div class="text-center" data-aos="zoom-out" data-aos-delay="100">
                    <a href="#about" class="btn-get-started">Get Started</a>
                </div>
                <div class="container mx-auto px-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 justify-center text-center mt-5">
                        <div class="icon-box p-6 bg-white shadow-lg rounded-lg" data-aos="zoom-out"
                            data-aos-delay="100">
                            <h4 class="title"><a href="">Perbaikan
                                </a></h4>
                            <p class="description">Sebagai bahan masukan bagi Prodi dalam melakukan perbaikan kurikulum
                            </p>
                        </div>

                        <div class="icon-box p-6 bg-white shadow-lg rounded-lg" data-aos="zoom-out"
                            data-aos-delay="300">

                            <h4 class="title"><a href="">Indikator Kinerja Utama
                                </a></h4>
                            <p class="description">Indikator pencapaian instansi pendidikan pada lulusan mendapatkan
                                pekerjaan yang layak</p>
                        </div>
                        <div class="icon-box p-6 bg-white shadow-lg rounded-lg" data-aos="zoom-out"
                            data-aos-delay="400">
                            <h4 class="title"><a href="">Kerja Sama</a></h4>
                            <p class="description">Sebagai pintu masuk bagi program studi untuk menjalin kerjasama
                                dengan perusahaan terkait alumninya</p>
                        </div>
                    </div>
                </div>
            </div>
        </section><!-- /Hero Section -->

        <!-- Stats Section -->
        <section id="stats" class=" bg-gray-200">
            <div class="container mx-auto px-4 py-10" data-aos="fade-up" data-aos-delay="100">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Item 1 -->
                    <div class=" rounded-xl  p-6 text-center">
                        <span class="text-5xl font-bold text-yellow-300 purecounter" data-purecounter-start="0"
                            data-purecounter-end="{{ $totalBekerja ?? 0 }}"
                            data-purecounter-duration="1">{{ $totalBekerja ?? 0 }}
                        </span>
                        <p class="mt-2 text-gray-700 font-normal">Bekerja</p>
                    </div>

                    <!-- Item 2 -->
                    <div class=" rounded-xl p-6 text-center">
                        <span class="text-5xl font-bold text-yellow-300 purecounter" data-purecounter-start="0"
                            data-purecounter-end="{{ $totalWiraswasta ?? 0 }}"
                            data-purecounter-duration="1">{{ $totalWiraswasta ?? 0 }}
                        </span>
                        <p class="mt-2 text-gray-700 font-semibold">Wiraswasta</p>
                    </div>

                    <!-- Item 3 -->
                    <div class=" rounded-xl  p-6 text-center">
                        <span class="text-5xl font-bold text-yellow-300 purecounter" data-purecounter-start="0"
                            data-purecounter-end="{{ $totalPendidikan ?? 0 }}"
                            data-purecounter-duration="1">{{ $totalPendidikan ?? 0 }}
                        </span>
                        <p class="mt-2 text-gray-700 font-semibold">Melanjutkan Pendidikan</p>
                    </div>
                </div>
            </div>
        </section>
        <div class="flex flex-col md:flex-row justify-between mx-auto px-16 py-16 bg-blue-400 ">
            <div class="col-lg-5 pl-6 position-relative " data-aos="fade-up" data-aos-delay="100">
                <img src="https://media.githubusercontent.com/media/ItsXeoz/src/main/public/images/university.jpg"
                    alt="" data-aos="fade-in" class="">
            </div>
            <div class="col-lg-6 py-5 content" data-aos="fade-up" data-aos-delay="200">
                <h2 class="text-3xl font-bold text-yellow-400 mb-4">Tracer Study Teknik Informatika</h2>
                <p class="mb-6 text-gray-700">
                    Tracer Study merupakan kegiatan pendataan yang ditujukan kepada mahasiswa yang telah lulus.
                    Dalam
                    kegiatan ini, alumni diminta memberikan informasi mengenai aktivitas atau kegiatan yang mereka
                    lakukan setelah menyelesaikan pendidikan di perguruan tinggi.
                </p>
            </div>
        </div>

        <div class="flex flex-row flex-wrap justify-center gap-6 my-5">
            <div class="bg-white rounded-2xl shadow-lg px-6 py-4 w-full max-w-md">
                <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">Mendapat Kerja Kurang Dari 6 Bulan
                </h2>
                <div id="chart" class="w-full"></div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg px-6 py-4 w-full max-w-md">
                <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">Sebaran Lokasi Pekerjaan Lulusan</h2>
                <div id="chart2" class="w-full"></div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg px-6 py-4 w-full max-w-md">
                <h2 class="text-xl font-semibold text-center text-gray-800 mb-4">Jenis Instansi Tempat Bekerja</h2>
                <div id="chart3" class="w-full"></div>
            </div>
        </div>
        @php
            $data = DB::table('answers')
                ->join('questions', 'answers.question_id', '=', 'questions.id')
                ->where('questions.question', 'ILIKE', '%pekerjaan kurang dari 6 bulan%')
                ->select('answers.answer', DB::raw('count(*) as total'))
                ->groupBy('answers.answer')
                ->get();

            $data2 = DB::table('answers')
                ->join('questions', 'answers.question_id', '=', 'questions.id')
                ->where('questions.question', 'ILIKE', '%lokasi tempat Anda bekerja%')
                ->select('answers.answer', DB::raw('count(*) as total'))
                ->groupBy('answers.answer')
                ->get();

            $data3 = DB::table('answers')
                ->join('questions', 'answers.question_id', '=', 'questions.id')
                ->where('questions.question', 'ILIKE', '%jenis perusahaan/instansi%')
                ->select('answers.answer', DB::raw('count(*) as total'))
                ->groupBy('answers.answer')
                ->get();

            $labels = $data->pluck('answer');
            $series = $data->pluck('total');

            $labels2 = $data2->pluck('answer');
            $series2 = $data2->pluck('total');

            $labels3 = $data3->pluck('answer');
            $series3 = $data3->pluck('total');
        @endphp
        <script>
            const options = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: {!! json_encode($labels) !!},
                series: {!! json_encode($series) !!},
                colors: ['#22c55e', '#f97316', '#ef4444'],
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        const total = opts.w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                        const value = opts.w.globals.series[opts.seriesIndex];
                        return `${value} (${val.toFixed(1)}%)`;
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#ffffff']
                }
            };

            const options2 = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: {!! json_encode($labels2) !!},
                series: {!! json_encode($series2) !!},
                colors: ['#3b82f6', '#f59e0b', '#10b981'],
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        const total = opts.w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                        const value = opts.w.globals.series[opts.seriesIndex];
                        return `${value} (${val.toFixed(1)}%)`;
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#ffffff']
                }
            };

            const options3 = {
                chart: {
                    type: 'pie',
                    height: 350
                },
                labels: {!! json_encode($labels3) !!},
                series: {!! json_encode($series3) !!},
                colors: ['#3b82f6', '#f59e0b', '#10b981'],
                legend: {
                    position: 'bottom'
                },
                dataLabels: {
                    enabled: true,
                    formatter: function(val, opts) {
                        const total = opts.w.globals.seriesTotals.reduce((a, b) => a + b, 0);
                        const value = opts.w.globals.series[opts.seriesIndex];
                        return `${value} (${val.toFixed(1)}%)`;
                    }
                },
                stroke: {
                    show: true,
                    width: 1,
                    colors: ['#ffffff']
                }
            };

            const chart = new ApexCharts(document.querySelector("#chart"), options);
            const chart2 = new ApexCharts(document.querySelector("#chart2"), options2); // gunakan options2 untuk chart kedua
            const chart3 = new ApexCharts(document.querySelector("#chart3"), options3); // gunakan options2 untuk chart kedua


            chart.render();
            chart2.render();
            chart3.render(); // jangan lupa render chart kedua
        </script>

    </main>

    <x-footer />

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->

    <!-- Main JS File -->

</body>

</html>

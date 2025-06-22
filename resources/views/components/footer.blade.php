<!-- resources/views/components/footer.blade.php -->
@vite(['resources/css/app.css', 'resources/js/app.js'])
<footer class="w-full py-8 bg-yellow-400 text-gray-800 ">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-3 ">
            <!-- Left Section -->
            <div class="flex flex-col md:w-1/2">
                <div class="flex items-center mb-4">
                    <img alt="Logo of UIN Sunan Gunung Djati" class="h-12 mr-4" src="https://media.githubusercontent.com/media/ItsXeoz/src/main/public/images/blu.png" />
                    <img alt="Logo of Teknik Informatika" class="h-12" height="48" src="https://media.githubusercontent.com/media/ItsXeoz/src/main/public/images/logo%20if.png" width="48" />
                </div>
                <p class="text-sm font-bold mb-1">Teknik Informatika</p>
                <p class="text-sm">
                    Universitas Islam Negeri Sunan Gunung Djati<br />
                    Jalan A.H Nasution No. 105, Cipadung, Cibiru, Kota Bandung, Jawa Barat 40614
                </p>
            </div>

            <!-- Middle Section -->
            <div class="flex flex-col md:w-1/2 border-l-2 border-gray-600 border-opacity-60 pl-4">
                <p class="font-bold mb-3">Layanan Akademik</p>
                <ul class="space-y-2">
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">Sistem Informasi Layanan Akademik (SALAM)</a></li>
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">Learning Management Sistem (LMS)</a></li>
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">E-Library UIN Sunan Gunung Djati</a></li>
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">E-Library Teknik Informatika</a></li>
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">Jurnal Online Informatika</a></li>
                </ul>
            </div>

            <!-- Right Section -->
            <div class="flex flex-col md:w-1/2 border-l-2 border-gray-600 border-opacity-60 pl-4">
                <p class="font-bold mb-3">Akses Cepat</p>
                <ul class="space-y-2">
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">Fakultas Sains Dan Teknologi</a></li>
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">UIN Sunan Gunung Djati</a></li>
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">SINTA Dikti Kemdikbud RI</a></li>
                    <li><a class="text-sm text-gray-800 hover:underline" href="#">Pangkalan Data DIKTI Kemdikbud RI</a></li>
                </ul>
            </div>
        </div>
        <hr class="my-4 border-gray-600" />
        <div class="text-center">
            <p class="text-sm">
                © Copyrights. All rights reserved.
                <a class="text-gray-800 hover:underline" href="#">Created by Abidzar</a>
            </p>
        </div>
    </div>
</footer>

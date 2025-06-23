<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tracer Study Teknik Informatika</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>

<body class="bg-yellow-50 flex items-center justify-center min-h-screen">
    <div class="bg-white rounded-lg shadow-lg flex flex-col md:flex-row w-full max-w-4xl">
        <!-- Login Form Section -->

        <div
            class="w-full md:w-1/2 bg-gradient-to-bl from-yellow-400 to-yellow-50 rounded-b-lg md:rounded-r-lg md:rounded-bl-none flex items-center justify-center relative p-10">
            <img alt="Logo" class="absolute top-4 left-4 w-12 h-12" src="https://media.githubusercontent.com/media/ItsXeoz/src/main/public/images/logo%20if.png" />
            <img alt="Illustration of a hand interacting with a web interface" class="w-3/4"
                src="https://media.githubusercontent.com/media/ItsXeoz/src/main/public/images/login.png" />
        </div>

        <div class="w-full md:w-1/2 p-10 mt-11 md:p-10">
            <div class="text-center">
                <h1 class="text-2xl font-bold mb-2">LOGIN</h1>
                <p class="text-gray-600 mb-8">Tracer Study Teknik Informatika</p>
            </div>
            <form action="{{ url()->secure('login') }}" method="POST" autocomplete="on">
                @csrf
                <div class="mb-4">
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <i class="fas fa-user text-gray-400 mr-3"></i>
                        <input name="nim" aria-label="NIM" value="{{ old('nim') }}" autocomplete="username"
                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            placeholder="NIM" type="text" />
                    </div>
                    @error('nim')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-6">
                    <div class="flex items-center border-b border-gray-300 py-2">
                        <i class="fas fa-lock text-gray-400 mr-3"></i>
                        <input name="password" aria-label="Password" id="password" autocomplete="current-password"
                            class="appearance-none bg-transparent border-none w-full text-gray-700 mr-3 py-1 px-2 leading-tight focus:outline-none"
                            placeholder="Password" type="password" />
                    </div>
                    @error('password')
                        <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
                    @enderror
                </div>
                <div class="text-center mb-11">
                    <button
                        class="bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-2 px-4 rounded-full shadow-lg focus:outline-none focus:shadow-outline"
                        type="submit">
                        Login
                    </button>
                </div>
            </form>
        </div>


        <!-- Illustration Section -->
    </div>
</body>

</html>
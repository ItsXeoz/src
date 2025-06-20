<header class="bg-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto flex justify-between items-center py-4 px-6">
        <!-- Sidebar Toggle Button -->
    
        <div class="flex items-center">
            <button id="sidebarToggle" class="text-yellow-500 focus:outline-none mr-4">
                <i class="fas fa-bars text-2xl"></i>
            </button>
            <img alt="Logo" class="h-12 w-12 object-cover mr-3" src="{{ asset('images/logo if.png') }}" />
            <div>
                <h1 class="text-lg md:text-xl font-bold">Tracer Study</h1>
                <p class="text-sm">Teknik Informatika</p>
            </div>
        </div>
    

        <!-- Authenticated User or Login -->
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
            <a href="{{ route('/auth/login') }}"
                class="bg-yellow-400 text-black py-2 px-4 rounded shadow-md hover:bg-yellow-500 transition">
                Login
            </a>
        @endauth
    </div>
</header>


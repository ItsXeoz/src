@props([
    'name' // Nama input checkbox
])

<header class=" bg-white shadow-md rounded-md w-full text-sm py-4 px-6">
    <nav class=" w-ful flex items-center justify-between" aria-label="Global">
        <div class="relative flex ">
            <a class="text-xl pr-3 xl:hidden icon-hover cursor-pointer text-heading" id="headerCollapse"
                data-hs-overlay="#application-sidebar-brand"
                aria-controls="application-sidebar-brand" aria-label="Toggle navigation"
                href="javascript:void(0)">
                <i class="ti ti-menu-2 relative z-1"></i>
            </a>
            <p class="text-lg font-bold text-black">{{$name}}</p>
        </div>
        <div class="flex items-center gap-4">
            <div
                class="hs-dropdown relative inline-flex [--placement:bottom-right] sm:[--trigger:hover]">
                <a class="relative hs-dropdown-toggle cursor-pointer align-middle rounded-full">
                    <img class="object-cover w-9 h-9 rounded-full"
                        src="{{ Auth::user()->photo_url ?? 'https://t4.ftcdn.net/jpg/02/27/45/09/360_F_227450952_KQCMShHPOPebUXklULsKsROk5AvN6H1H.jpg' }}" alt=""
                        aria-hidden="true">
                </a>
                <div class="card hs-dropdown-menu transition-[opacity,margin] rounded-md duration hs-dropdown-open:opacity-100 opacity-0 mt-2 min-w-max  w-[200px] hidden z-[12]"
                    aria-labelledby="hs-dropdown-custom-icon-trigger">
                    <div class="card-body p-0 py-2">
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-user  text-xl "></i>
                            <p class="text-sm ">My Profile</p>
                        </a>
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-mail  text-xl"></i>
                            <p class="text-sm ">My Account</p>
                        </a>
                        <a href="javscript:void(0)"
                            class="flex gap-2 items-center font-medium px-4 py-1.5 hover:bg-gray-200 text-gray-400">
                            <i class="ti ti-list-check  text-xl "></i>
                            <p class="text-sm ">My Task</p>
                        </a>
                        <div class="px-4 mt-[7px] grid">
                            <a href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                                class="btn-outline-primary font-medium text-[15px] w-full hover:bg-blue-600 hover:text-white">Logout
                                <form id="logout-form" action="{{ url()->secure('logout') }}"
                                    method="POST" class="hidden">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</header>
<div id="sidebar">
    <aside id="application-sidebar-brand"
        class="hs-overlay hs-overlay-open:translate-x-0 -translate-x-full transform hidden xl:block xl:translate-x-0 xl:end-auto xl:bottom-0 fixed xl:top-5 xl:left-auto top-0 left-0 with-vertical h-screen z-[999] shrink-0 w-[270px] shadow-md xl:rounded-md rounded-none bg-white left-sidebar transition-all duration-300">
        <div class="flex items-center p-5">
            <img alt="Logo" class="h-12 w-12 object-cover mr-3" src="{{ asset('images/logo if.png') }}" />
            <div>
                <h1 class="text-lg md:text-xl font-bold">Tracer Study</h1>
                <p class="text-sm">Teknik Informatika</p>
            </div>
        </div>
        <div class="scroll-sidebar" data-simplebar="">
            <nav class="w-full flex flex-col sidebar-nav px-4 mt-5">
                <ul id="sidebarnav" class="text-gray-600 text-sm">
                    <li class="text-xs font-bold pb-[5px]">
                        <i class="ti ti-dots nav-small-cap-icon text-lg hidden text-center"></i>
                        <span class="text-xs text-gray-400 font-semibold">HOME</span>
                    </li>
                    @if (Auth::user()->role == 'user')
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                href="{{ route('user') }}">
                                <i class="ti ti-layout-dashboard ps-2 text-2xl"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                href="{{ DB::table('answers')->where('user_id', Auth::user()->id)->first() ? route('/user/update') : route('/user/survey') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    class="ps-2 text-2xl" viewBox="0 0 24 24">
                                    <path fill="currentColor"
                                        d="M4 10.5c-.83 0-1.5.67-1.5 1.5s.67 1.5 1.5 1.5s1.5-.67 1.5-1.5s-.67-1.5-1.5-1.5m0-6c-.83 0-1.5.67-1.5 1.5S3.17 7.5 4 7.5S5.5 6.83 5.5 6S4.83 4.5 4 4.5m0 12c-.83 0-1.5.68-1.5 1.5s.68 1.5 1.5 1.5s1.5-.68 1.5-1.5s-.67-1.5-1.5-1.5M8 19h12c.55 0 1-.45 1-1s-.45-1-1-1H8c-.55 0-1 .45-1 1s.45 1 1 1m0-6h12c.55 0 1-.45 1-1s-.45-1-1-1H8c-.55 0-1 .45-1 1s.45 1 1 1M7 6c0 .55.45 1 1 1h12c.55 0 1-.45 1-1s-.45-1-1-1H8c-.55 0-1 .45-1 1" />
                                </svg>
                                <span>Survey</span>
                            </a>
                        </li>
                    @else
                        <li class="sidebar-item">
                            <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                href="{{ route('admin') }}">
                                <i class="ti ti-layout-dashboard ps-2 text-2xl"></i>
                                <span>Dashboard</span>
                            </a>
                            <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                href="{{ route('/admin/statistic') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round"
                                    class="icon icon-tabler ps-2 text-2xl icons-tabler-outline icon-tabler-file-analytics">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                    <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                                    <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                                    <path d="M9 17l0 -5" />
                                    <path d="M12 17l0 -1" />
                                    <path d="M15 17l0 -3" />
                                </svg>
                                <span>Statistic</span>
                            </a>
                            <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                href="{{ route('questions.index') }}">
                                <img width="30" height="30" src="https://img.icons8.com/ios/50/form.png"
                                    alt="form"  class="icon icon-tabler ps-2 text-2xl icons-tabler-outline icon-tabler-file-analytics" />
                                <span>Forms</span>
                            </a>
                            <a class="sidebar-link gap-3 py-2.5 my-1 text-base flex items-center relative rounded-md text-gray-500 w-full"
                                href="{{ route('/admin/userDetail') }}">
                                <img width="30" height="30" src="https://img.icons8.com/ios-glyphs/30/user--v1.png" alt="user--v1"class="icon icon-tabler ps-2 text-2xl icons-tabler-outline icon-tabler-file-analytics"/>
                                <span>Users</span>
                            </a>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
    </aside>
</div>

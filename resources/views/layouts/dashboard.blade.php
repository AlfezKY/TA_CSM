<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif

    <style>
        body {
            font-family: 'Instrument Sans', ui-sans-serif, system-ui, sans-serif;
        }
        
        /* Mobile Sidebar (PUSH) */
        :root {
            --mobile-sidebar-width: 18rem; /* 288px (w-72) */
        }

        #mobile-sidebar {
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.2s ease-in-out;
        }

        #mobile-sidebar.is-open {
            opacity: 1;
            pointer-events: auto;
        }

        #mobile-sidebar .backdrop {
            opacity: 0;
            transition: opacity 0.2s ease-in-out;
        }

        #mobile-sidebar.is-open .backdrop {
            opacity: 1;
        }

        #mobile-sidebar .sidebar-panel {
            transform: translateX(-100%);
            transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
        }

        #mobile-sidebar.is-open .sidebar-panel {
            transform: translateX(0);
        }

        /* Prevent body scroll when sidebar is open */
        body.sidebar-open {
            overflow: hidden;
        }

        /* Push main content to the right (so sidebar doesn't cover it) */
        @media (max-width: 1023px) {
            .main-content-wrapper {
                transition: transform 0.25s cubic-bezier(0.4, 0, 0.2, 1);
                will-change: transform;
            }

            body.sidebar-open .main-content-wrapper {
                transform: translateX(var(--mobile-sidebar-width));
            }
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside class="hidden lg:flex lg:shrink-0">
            <div class="flex flex-col w-64 bg-white/90 backdrop-blur border-r border-gray-200">
                <!-- Logo/Brand -->
                <div class="flex items-center h-16 px-6 border-b border-gray-200 bg-white">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-600 tracking-tight">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                </div>

                <!-- Navigation -->
                <nav class="flex-1 px-4 py-6 overflow-y-auto" aria-label="Sidebar">
                    @php
                        $itemBase = 'flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium transition-all duration-200 mb-2';
                        $itemActive = 'bg-blue-50 text-blue-700 ring-1 ring-blue-100 shadow-sm';
                        $itemIdle = 'text-gray-700 hover:bg-gray-50 hover:text-gray-900';
                    @endphp

                    <!-- Dashboard Section -->
                    <div class="mb-6">
                        <a href="{{ route('dashboard') }}"
                           aria-current="{{ request()->routeIs('dashboard') ? 'page' : 'false' }}"
                           class="{{ $itemBase }} {{ request()->routeIs('dashboard') ? $itemActive : $itemIdle }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                            </svg>
                            <span>Dashboard</span>
                        </a>
                    </div>

                    <!-- Menu Section -->
                    <div class="mb-2">
                        <div class="px-4 mb-3">
                            <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Menu Utama</p>
                        </div>
                        
                        <a href="{{ route('pelanggan.index') }}"
                           aria-current="{{ request()->routeIs('pelanggan.*') ? 'page' : 'false' }}"
                           class="{{ $itemBase }} {{ request()->routeIs('pelanggan.*') ? $itemActive : $itemIdle }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('pelanggan.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                            </svg>
                            <span>Pelanggan</span>
                        </a>

                        <a href="{{ route('paket.index') }}"
                           aria-current="{{ request()->routeIs('paket.*') ? 'page' : 'false' }}"
                           class="{{ $itemBase }} {{ request()->routeIs('paket.*') ? $itemActive : $itemIdle }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('paket.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                            </svg>
                            <span>Paket</span>
                        </a>

                        <a href="{{ route('tagihan.index') }}"
                           aria-current="{{ request()->routeIs('tagihan.*') ? 'page' : 'false' }}"
                           class="{{ $itemBase }} {{ request()->routeIs('tagihan.*') ? $itemActive : $itemIdle }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('tagihan.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Tagihan</span>
                        </a>

                        <a href="{{ route('laporan.index') }}"
                           aria-current="{{ request()->routeIs('laporan.*') ? 'page' : 'false' }}"
                           class="{{ $itemBase }} {{ request()->routeIs('laporan.*') ? $itemActive : $itemIdle }}">
                            <svg class="w-5 h-5 {{ request()->routeIs('laporan.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4V7M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                            <span>Laporan</span>
                        </a>
                    </div>
                </nav>

                <!-- Footer Sidebar -->
                <div class="px-4 py-4 border-t border-gray-200">
                    @auth
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                                <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                </svg>
                                <span>Keluar</span>
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50 transition">
                            <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                            </svg>
                            <span>Masuk</span>
                        </a>
                    @endauth
                </div>
            </div>
        </aside>

        <!-- Main Content Area -->
        <div class="main-content-wrapper flex flex-col flex-1 overflow-hidden">
            <!-- Top Header (Mobile) -->
            <header class="lg:hidden bg-white shadow-sm border-b border-gray-200 transition-all duration-300">
                <div class="flex items-center justify-between px-4 py-3">
                    <a href="{{ route('dashboard') }}" class="text-xl font-bold text-blue-600 tracking-tight">
                        {{ config('app.name', 'Laravel') }}
                    </a>
                    <button id="mobile-menu-button"
                            aria-label="Buka menu"
                            aria-expanded="false"
                            class="p-2 rounded-md text-gray-600 hover:bg-gray-100 active:scale-95 transition">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
            </header>

            <!-- Mobile Sidebar (push) -->
            <div id="mobile-sidebar" class="lg:hidden fixed inset-0 z-50">
                <div class="backdrop fixed inset-0 bg-gray-900/30" onclick="closeMobileSidebar()"></div>
                <div class="sidebar-panel fixed inset-y-0 left-0 w-72 max-w-[85vw] bg-white shadow-2xl">
                    <div class="flex flex-col h-full">
                        <div class="flex items-center justify-between h-16 px-6 border-b border-gray-200">
                            <span class="text-xl font-bold text-blue-600 tracking-tight">{{ config('app.name', 'Laravel') }}</span>
                            <button onclick="closeMobileSidebar()"
                                    aria-label="Tutup menu"
                                    class="p-2 rounded-md text-gray-600 hover:bg-gray-100 active:scale-95 transition">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </div>
                        <nav class="flex-1 px-4 py-6 overflow-y-auto">
                            <!-- Dashboard Section -->
                            <div class="mb-6">
                                <a href="{{ route('dashboard') }}" onclick="closeMobileSidebar()" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-2 transition-all duration-200 {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 ring-1 ring-blue-100 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                                    <svg class="w-5 h-5 {{ request()->routeIs('dashboard') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                                    </svg>
                                    <span>Dashboard</span>
                                </a>
                            </div>

                            <!-- Menu Section -->
                            <div class="mb-2">
                                <div class="px-4 mb-3">
                                    <p class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Menu Utama</p>
                                </div>
                                
                                <a href="{{ route('pelanggan.index') }}" onclick="closeMobileSidebar()" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-2 transition-all duration-200 {{ request()->routeIs('pelanggan.*') ? 'bg-blue-50 text-blue-700 ring-1 ring-blue-100 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                                    <svg class="w-5 h-5 {{ request()->routeIs('pelanggan.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                                    </svg>
                                    <span>Pelanggan</span>
                                </a>
                                <a href="{{ route('paket.index') }}" onclick="closeMobileSidebar()" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-2 transition-all duration-200 {{ request()->routeIs('paket.*') ? 'bg-blue-50 text-blue-700 ring-1 ring-blue-100 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                                    <svg class="w-5 h-5 {{ request()->routeIs('paket.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"></path>
                                    </svg>
                                    <span>Paket</span>
                                </a>
                                <a href="{{ route('tagihan.index') }}" onclick="closeMobileSidebar()" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-2 transition-all duration-200 {{ request()->routeIs('tagihan.*') ? 'bg-blue-50 text-blue-700 ring-1 ring-blue-100 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                                    <svg class="w-5 h-5 {{ request()->routeIs('tagihan.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                    </svg>
                                    <span>Tagihan</span>
                                </a>

                                <a href="{{ route('laporan.index') }}" onclick="closeMobileSidebar()" class="flex items-center gap-3 px-4 py-3 rounded-lg text-sm font-medium mb-2 transition-all duration-200 {{ request()->routeIs('laporan.*') ? 'bg-blue-50 text-blue-700 ring-1 ring-blue-100 shadow-sm' : 'text-gray-700 hover:bg-gray-50' }}">
                                    <svg class="w-5 h-5 {{ request()->routeIs('laporan.*') ? 'text-blue-600' : 'text-gray-500' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17v-2m3 2v-4m3 4V7M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                    <span>Laporan</span>
                                </a>
                            </div>
                        </nav>
                        <div class="px-4 py-4 border-t border-gray-200">
                            @auth
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex items-center gap-3 w-full px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                                        <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                                        </svg>
                                        <span>Keluar</span>
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-gray-700 hover:bg-gray-50">
                                    <svg class="w-5 h-5 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"></path>
                                    </svg>
                                    <span>Masuk</span>
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content -->
            <main class="main-content flex-1 overflow-y-auto bg-gray-50">
                <div class="container mx-auto px-4 py-6 lg:px-8">
                    <div class="mb-6">
                        <h1 class="text-3xl font-bold text-gray-900 mb-1">
                            @yield('page_title')
                        </h1>
                        @hasSection('page_subtitle')
                            <p class="text-gray-600">@yield('page_subtitle')</p>
                        @endif
                    </div>

                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script>
        // Mobile sidebar functions
        function openMobileSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const button = document.getElementById('mobile-menu-button');
            const body = document.body;
            
            sidebar.classList.add('is-open');
            button.setAttribute('aria-expanded', 'true');
            body.classList.add('sidebar-open');
        }
        
        function closeMobileSidebar() {
            const sidebar = document.getElementById('mobile-sidebar');
            const button = document.getElementById('mobile-menu-button');
            const body = document.body;
            
            sidebar.classList.remove('is-open');
            button.setAttribute('aria-expanded', 'false');
            body.classList.remove('sidebar-open');
        }
        
        // Mobile menu toggle
        document.getElementById('mobile-menu-button')?.addEventListener('click', function() {
            const sidebar = document.getElementById('mobile-sidebar');
            if (!sidebar.classList.contains('is-open')) {
                openMobileSidebar();
            } else {
                closeMobileSidebar();
            }
        });
        
        // Close sidebar on escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const sidebar = document.getElementById('mobile-sidebar');
                if (!sidebar.classList.contains('hidden')) {
                    closeMobileSidebar();
                }
            }
        });
        
        // Close sidebar when clicking outside (on backdrop)
        document.getElementById('mobile-sidebar')?.addEventListener('click', function(e) {
            if (e.target === this || e.target.classList.contains('backdrop')) {
                closeMobileSidebar();
            }
        });

        // Ensure closed on first load
        closeMobileSidebar();
    </script>
</body>
</html>


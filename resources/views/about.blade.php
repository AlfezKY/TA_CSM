<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - CSM.TV</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                    colors: {
                        brand: {
                            50: '#eef2ff',
                            100: '#e0e7ff',
                            600: '#4f46e5', // Indigo utama
                            700: '#4338ca',
                            900: '#312e81',
                        }
                    },
                    // --- KONFIGURASI ANIMASI CAROUSEL ---
                    animation: {
                        'scroll-right': 'scrollRight 25s linear infinite',
                    },
                    keyframes: {
                        scrollRight: {
                            '0%': { transform: 'translateX(-100%)' },
                            '100%': { transform: 'translateX(0)' },
                        }
                    }
                    // ------------------------------------
                }
            }
        }
    </script>

    <style>
        /* Custom Utilities */
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased selection:bg-brand-600 selection:text-white">

    <nav class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-slate-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tighter text-slate-900">
                CSM<span class="text-brand-600">.TV</span>
            </a>

            <div class="hidden md:flex items-center gap-10">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-slate-500 hover:text-brand-600 transition-colors">Beranda</a>
                <a href="{{ route('about') }}" class="text-sm font-semibold text-brand-600">Tentang</a>
                <a href="{{ route('home') }}#paket" class="text-sm font-semibold text-slate-500 hover:text-brand-600 transition-colors">Paket Layanan</a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 text-sm font-semibold text-white bg-slate-900 rounded-full hover:bg-slate-800 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-900 hover:text-brand-600">Masuk</a>
                        <a href="{{ route('register') }}" class="px-6 py-2.5 text-sm font-semibold text-white bg-brand-600 rounded-full hover:bg-brand-700 transition shadow-lg shadow-brand-600/20">Daftar</a>
                    @endauth
                @endif
            </div>

            <button class="md:hidden p-2 text-slate-900" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden absolute top-20 left-0 w-full bg-white border-b border-slate-100 p-6 flex flex-col gap-4 shadow-xl md:hidden">
            <a href="{{ route('home') }}" class="block py-2 text-base font-medium text-slate-600">Beranda</a>
            <a href="{{ route('about') }}" class="block py-2 text-base font-medium text-brand-600">Tentang</a>
            <a href="{{ route('home') }}#paket" class="block py-2 text-base font-medium text-slate-600">Paket Layanan</a>
            <hr class="border-slate-100">
            @guest
                <a href="{{ route('login') }}" class="block w-full py-3 text-center border border-slate-200 rounded-lg font-bold text-slate-700">Masuk</a>
                <a href="{{ route('register') }}" class="block w-full py-3 text-center bg-brand-600 text-white rounded-lg font-bold">Daftar Sekarang</a>
            @endguest
        </div>
    </nav>

    <main class="pt-20">
        
        <section class="py-20 lg:py-28 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                    
                    <div class="relative order-2 lg:order-1">
                        <div class="relative z-10 rounded-2xl overflow-hidden shadow-2xl shadow-slate-200">
                            <img src="{{ asset('assets/dummy-card.jpg') }}" alt="Tim CSM TV" class="w-full h-auto object-cover transform hover:scale-105 transition duration-700">
                        </div>
                        <div class="absolute -bottom-6 -right-6 w-2/3 h-2/3 bg-brand-50 rounded-2xl -z-10"></div>
                        <div class="absolute bottom-8 left-8 z-20 bg-white p-4 rounded-xl shadow-xl border border-slate-100 flex items-center gap-3 animate-bounce-slow">
                            <div class="w-10 h-10 rounded-full bg-green-100 flex items-center justify-center text-green-600">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <p class="text-xs text-slate-500 font-semibold uppercase">Status Jaringan</p>
                                <p class="text-sm font-bold text-slate-900">99.9% Stabil</p>
                            </div>
                        </div>
                    </div>

                    <div class="order-1 lg:order-2">
                        <span class="text-brand-600 font-bold tracking-wider uppercase text-sm mb-2 block">Tentang Kami</span>
                        <h1 class="text-4xl lg:text-5xl font-extrabold text-slate-900 leading-[1.15] mb-6">
                            Koneksi Internet Terbaik <br>
                            Untuk <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-600 to-purple-600">Gaya Hidup Digital.</span>
                        </h1>
                        <p class="text-lg text-slate-500 mb-8 leading-relaxed">
                            CSM.TV (PT. Citra Sarana Media) adalah penyedia layanan internet (ISP) yang berkomitmen menghadirkan infrastruktur fiber optic modern. Kami hadir untuk memenuhi kebutuhan digital keluarga dan bisnis Anda dengan kecepatan nyata.
                        </p>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-y-4 gap-x-8 mb-10">
                            @foreach(['Support Prioritas 24/7', 'Full Fiber Optic', 'Koneksi Stabil & Cepat', 'Harga Terjangkau', 'Pelayanan Responsif', 'Tanpa Hidden Fees'] as $item)
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-5 h-5 rounded-full bg-brand-600 flex items-center justify-center text-white">
                                    <svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/></svg>
                                </div>
                                <span class="text-slate-700 font-medium text-sm lg:text-base">{{ $item }}</span>
                            </div>
                            @endforeach
                        </div>

                        <div class="flex flex-wrap gap-4">
                            <a href="https://wa.me/6281234567890" class="inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-brand-600 border-2 border-brand-600 rounded-full hover:bg-brand-600 hover:text-white transition-all duration-300">
                                Hubungi Kami
                                <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-12 border-y border-slate-100 bg-slate-50/50 overflow-hidden">
            <div class="w-full">
                <p class="text-center text-sm font-bold text-slate-400 uppercase tracking-widest mb-8">Dipercaya Oleh Mitra Terbaik</p>
                
                <div class="flex gap-8 lg:gap-16 w-full">
                    
                    <div class="flex flex-shrink-0 gap-8 lg:gap-16 items-center justify-around min-w-full animate-scroll-right">
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/ICON-PLUS.webp" class="default gs-logo--img" alt="" title="ICON+"></div>
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/INDOSAT.webp" class="default gs-logo--img" alt="" title="INDOSAT"></div>
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/LINTASARTA.webp" class="default gs-logo--img" alt="" title="LINTASARTA"></div>             
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/TELKOM.webp" class="default gs-logo--img" alt="" title="TELKOM INDONESIA"></div>
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/XL-AXIATA.webp" class="default gs-logo--img" alt="" title="XL AXIATA"></div>
                    </div>

                    <div class="flex flex-shrink-0 gap-8 lg:gap-16 items-center justify-around min-w-full animate-scroll-right">
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/ICON-PLUS.webp" class="default gs-logo--img" alt="" title="ICON+"></div>
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/INDOSAT.webp" class="default gs-logo--img" alt="" title="INDOSAT"></div>
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/LINTASARTA.webp" class="default gs-logo--img" alt="" title="LINTASARTA"></div>             
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/TELKOM.webp" class="default gs-logo--img" alt="" title="TELKOM INDONESIA"></div>
                        <div class="gs_logo_single--inner"><img loading="lazy" decoding="async" width="140" height="52" src="https://flashnetid.com/wp-content/uploads/2025/08/XL-AXIATA.webp" class="default gs-logo--img" alt="" title="XL AXIATA"></div>
                    </div>

                </div>
            </div>
        </section>

        <section class="py-20 lg:py-28">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16 items-center">
                    
                    <div>
                        <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 mb-6">
                            Infrastruktur Modern <br>
                            Tanpa Kompromi.
                        </h2>
                        <div class="space-y-6 text-slate-600 text-lg leading-relaxed">
                            <p>
                                Di dunia yang serba terhubung, internet bukan lagi sekadar pelengkap. Kami berinvestasi besar pada jaringan backbone dan perangkat <em>Last Mile</em> terbaru untuk memastikan Anda mendapatkan bandwidth murni.
                            </p>
                            <p>
                                Tim Network Operation Center (NOC) kami memantau trafik 24 jam sehari untuk memastikan pengalaman streaming 4K, gaming kompetitif, dan video conference Anda berjalan mulus.
                            </p>
                        </div>
                        
                        <div class="mt-8 pt-8 border-t border-slate-100">
                            <div class="flex gap-12">
                                <div>
                                    <span class="block text-3xl font-extrabold text-brand-600">100%</span>
                                    <span class="text-sm text-slate-500 font-medium">Fiber Optic</span>
                                </div>
                                <div>
                                    <span class="block text-3xl font-extrabold text-brand-600">24/7</span>
                                    <span class="text-sm text-slate-500 font-medium">Monitoring</span>
                                </div>
                                <div>
                                    <span class="block text-3xl font-extrabold text-brand-600">1Gbps</span>
                                    <span class="text-sm text-slate-500 font-medium">Max Speed</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="relative">
                        <div class="absolute inset-0 bg-slate-100 rounded-2xl transform rotate-3 scale-95 origin-bottom-right -z-10"></div>
                        <img src="{{ asset('assets/dummy-card.jpg') }}" alt="Server Room" class="rounded-2xl shadow-xl w-full object-cover aspect-video lg:aspect-square">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-16 bg-slate-900">
            <div class="max-w-7xl mx-auto px-6 text-center">
                <h2 class="text-3xl font-bold text-white mb-6">Siap untuk koneksi yang lebih baik?</h2>
                <p class="text-slate-400 mb-8 max-w-2xl mx-auto">Bergabunglah dengan ribuan pelanggan yang telah beralih ke layanan internet fiber optic modern kami.</p>
                <div class="flex justify-center gap-4">
                    <a href="{{ route('home') }}#paket" class="px-8 py-3 bg-white text-slate-900 font-bold rounded-full hover:bg-brand-50 transition">Lihat Paket</a>
                    <a href="https://wa.me/6281234567890" class="px-8 py-3 border border-slate-600 text-white font-bold rounded-full hover:bg-slate-800 transition">Konsultasi Gratis</a>
                </div>
            </div>
        </section>

    </main>
    <footer class="bg-slate-900 text-slate-300 py-16 border-t border-slate-800">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12 mb-12">
                <div class="space-y-4">
                    <a href="#" class="text-2xl font-extrabold tracking-tighter text-white">
                        CSM<span class="text-brand-600">.TV</span>
                    </a>
                    <p class="text-sm leading-relaxed text-slate-400">
                        Penyedia layanan internet fiber optic ultra cepat untuk kebutuhan rumah dan bisnis Anda.
                    </p>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6">Perusahaan</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="{{ route('about') }}" class="hover:text-brand-500 transition">Tentang Kami</a></li>
                        <li><a href="#" class="hover:text-brand-500 transition">Karir</a></li>
                        <li><a href="#" class="hover:text-brand-500 transition">Blog</a></li>
                        <li><a href="#" class="hover:text-brand-500 transition">Partner</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6">Dukungan</h4>
                    <ul class="space-y-3 text-sm">
                        <li><a href="#" class="hover:text-brand-500 transition">Pusat Bantuan</a></li>
                        <li><a href="#" class="hover:text-brand-500 transition">Cek Jangkauan</a></li>
                        <li><a href="#" class="hover:text-brand-500 transition">Info Tagihan</a></li>
                        <li><a href="#" class="hover:text-brand-500 transition">Laporkan Gangguan</a></li>
                    </ul>
                </div>

                <div>
                    <h4 class="text-white font-bold mb-6">Hubungi Kami</h4>
                    <ul class="space-y-4 text-sm">
                        <li class="flex items-start gap-3">
                            <svg class="w-5 h-5 text-brand-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            <span>Jl. Teknologi No. 123,<br>Jakarta Selatan, Indonesia</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            <span>(021) 555-0123</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg class="w-5 h-5 text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            <span>support@csm.tv</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-800 pt-8 flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">
                <p>&copy; {{ date('Y') }} CSM.TV. All rights reserved.</p>
                <div class="flex gap-6">
                    <a href="#" class="hover:text-white transition">Kebijakan Privasi</a>
                    <a href="#" class="hover:text-white transition">Syarat & Ketentuan</a>
                </div>
                <div class="flex gap-4">
    <a href="#" class="text-slate-400 hover:text-brand-600 transition">
        <span class="sr-only">Kembali ke atas</span>
        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18" />
        </svg>
    </a>
</div>
            </div>
            
        </div>
    </footer>
</body>
</html>
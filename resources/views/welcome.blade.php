<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSM.TV - Internet Service Provider Terpercaya</title>

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
                            200: '#c7d2fe',
                            300: '#a5b4fc',
                            400: '#818cf8',
                            500: '#6366f1',
                            600: '#4f46e5', // Indigo utama
                            700: '#4338ca',
                            800: '#3730a3',
                            900: '#312e81',
                        }
                    }
                }
            }
        }
    </script>

    <style>
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
        
        .faq-content {
            transition: grid-template-rows 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-white text-slate-800 antialiased selection:bg-brand-600 selection:text-white" id="top">

    <nav class="fixed w-full top-0 z-50 bg-white/95 backdrop-blur-sm border-b border-slate-100 transition-all duration-300">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="text-2xl font-extrabold tracking-tighter text-slate-900">
                CSM<span class="text-brand-600">.TV</span>
            </a>

            <div class="hidden md:flex items-center gap-10">
                <a href="{{ route('home') }}" class="text-sm font-semibold text-brand-600">Beranda</a>
                <a href="{{ route('about') }}" class="text-sm font-semibold text-slate-500 hover:text-brand-600 transition-colors">Tentang</a>
                <a href="#paket" class="text-sm font-semibold text-slate-500 hover:text-brand-600 transition-colors">Paket Layanan</a>
            </div>

            <div class="hidden md:flex items-center gap-4">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="px-6 py-2.5 text-sm font-semibold text-white bg-slate-900 rounded-full hover:bg-slate-800 transition">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-slate-900 hover:text-brand-600">Masuk</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-6 py-2.5 text-sm font-semibold text-white bg-brand-600 rounded-full hover:bg-brand-700 transition shadow-lg shadow-brand-600/20">Daftar</a>
                        @endif
                    @endauth
                @endif
            </div>

            <button class="md:hidden p-2 text-slate-900" onclick="document.getElementById('mobile-menu').classList.toggle('hidden')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/></svg>
            </button>
        </div>

        <div id="mobile-menu" class="hidden absolute top-20 left-0 w-full bg-white border-b border-slate-100 p-6 flex flex-col gap-4 shadow-xl md:hidden">
            <a href="{{ route('home') }}" class="block py-2 text-base font-medium text-brand-600">Beranda</a>
            <a href="{{ route('about') }}" class="block py-2 text-base font-medium text-slate-600">Tentang</a>
            <a href="#paket" class="block py-2 text-base font-medium text-slate-600">Paket Layanan</a>
            <hr class="border-slate-100">
            @guest
                <a href="{{ route('login') }}" class="block w-full py-3 text-center border border-slate-200 rounded-lg font-bold text-slate-700">Masuk</a>
                <a href="{{ route('register') }}" class="block w-full py-3 text-center bg-brand-600 text-white rounded-lg font-bold">Daftar Sekarang</a>
            @endguest
        </div>
    </nav>

    <main class="pt-20">
        
        <section id="home" class="py-20 lg:py-32 overflow-hidden">
            <div class="max-w-7xl mx-auto px-6">
                <div class="grid lg:grid-cols-2 gap-16 lg:gap-24 items-center">
                    <div class="order-2 lg:order-1">
                        <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-slate-100 border border-slate-200 text-slate-700 text-xs font-bold uppercase tracking-wider mb-6">
                            <span class="w-2 h-2 rounded-full bg-green-500 animate-pulse"></span>
                            Promo Spesial
                        </div>
                        <h1 class="text-4xl lg:text-6xl font-extrabold text-slate-900 leading-[1.1] mb-6 tracking-tight">
                            Internet Rumah <br>
                            <span class="text-brand-600">Cepat & Stabil.</span>
                        </h1>
                        <p class="text-lg text-slate-500 mb-8 leading-relaxed max-w-lg">
                            Nikmati streaming tanpa buffering, gaming tanpa lag, dan download super cepat dengan infrastruktur fiber optic terbaru kami.
                        </p>

                        <div class="flex flex-col sm:flex-row gap-4">
                            <a href="#paket" class="inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-white bg-slate-900 rounded-full hover:bg-slate-800 transition">
                                Mulai Berlangganan
                            </a>
                            <a href="https://wa.me/6281234567890" target="_blank" class="inline-flex items-center justify-center px-8 py-4 text-sm font-bold text-slate-700 border border-slate-200 rounded-full hover:border-slate-900 transition bg-white">
                                WhatsApp Kami
                            </a>
                        </div>
                    </div>

                    <div class="relative order-1 lg:order-2">
                         <div class="absolute -inset-4 bg-gradient-to-tr from-brand-100 to-purple-50 rounded-full blur-3xl opacity-60 -z-10"></div>
                        <img src="{{ asset('assets/dummy-card.jpg') }}" alt="Internet Cepat" class="relative w-full rounded-2xl shadow-2xl shadow-slate-200 transform hover:-translate-y-2 transition duration-500">
                    </div>
                </div>
            </div>
        </section>

        <section id="paket" class="py-24 bg-white relative">
            <div class="max-w-7xl mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl lg:text-4xl font-extrabold text-slate-900 mb-4 tracking-tight">
                        Pilihan Paket
                    </h2>
                    <p class="text-slate-500 text-lg max-w-2xl mx-auto">
                        Harga transparan, sudah termasuk pajak, tanpa biaya tersembunyi.
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6 items-start">
                    @foreach($packets as $packet)
                        @php
                            // Cek Best Seller
                            $isBestSeller = str_contains(strtolower($packet->Nama_Produk), 'senyum');
                        @endphp

                        <div class="relative flex flex-col h-full rounded-2xl p-8 transition-all duration-300 overflow-hidden group
                            {{ $isBestSeller 
                                ? 'bg-slate-900 text-white shadow-xl shadow-slate-900/20 scale-105 z-10 hover:scale-110 hover:shadow-2xl hover:shadow-slate-900/40' 
                                : 'bg-white text-slate-900 border border-slate-200 hover:border-brand-600 hover:shadow-xl hover:-translate-y-2' 
                            }}">

                            @if($isBestSeller)
                                <div class="absolute top-0 right-0 w-32 h-32 overflow-hidden pointer-events-none">
                                    <div class="absolute top-[20px] -right-[40px] w-[150px] transform rotate-45 bg-brand-600 text-slate-900 font-extrabold text-[10px] uppercase tracking-widest py-1.5 text-center shadow-sm">
                                        Terlaris
                                    </div>
                                </div>
                            @endif

                            <div class="mb-6">
                                <h3 class="text-lg font-bold mb-4 {{ $isBestSeller ? 'text-white' : 'text-slate-900 group-hover:text-brand-600 transition-colors' }}">
                                    {{ $packet->Nama_Produk }}
                                </h3>
                                <div class="flex items-baseline gap-1">
                                    <span class="text-4xl font-black tracking-tight {{ $isBestSeller ? 'text-white' : 'text-slate-900' }}">
                                        {{ str_replace(['Rp.', 'Rp'], '', $packet->Harga_Produk) }}
                                    </span>
                                    <span class="text-xs font-bold uppercase {{ $isBestSeller ? 'text-slate-400' : 'text-slate-400' }}">/bln</span>
                                </div>
                            </div>

                            <div class="text-3xl font-black mb-6 flex items-baseline gap-1 {{ $isBestSeller ? 'text-brand-400' : 'text-brand-600' }}">
                                {{ trim(str_ireplace('Mbps', '', $packet->Jenis_Produk)) }}
                                <span class="text-sm font-bold {{ $isBestSeller ? 'text-slate-400' : 'text-slate-500' }}">Mbps</span>
                            </div>

                            <div class="space-y-6 mb-8 flex-grow">
                                <p class="text-sm leading-relaxed {{ $isBestSeller ? 'text-slate-300' : 'text-slate-500' }}">
                                    {{ $packet->Deskripsi_Produk }}
                                </p>

                                <ul class="space-y-3">
                                    <li class="flex items-center gap-3 text-sm font-medium {{ $isBestSeller ? 'text-slate-200' : 'text-slate-600' }}">
                                        <svg class="w-5 h-5 {{ $isBestSeller ? 'text-brand-400' : 'text-brand-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Unlimited Tanpa FUP
                                    </li>
                                    <li class="flex items-center gap-3 text-sm font-medium {{ $isBestSeller ? 'text-slate-200' : 'text-slate-600' }}">
                                        <svg class="w-5 h-5 {{ $isBestSeller ? 'text-brand-400' : 'text-brand-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Fiber Optic 100%
                                    </li>
                                    <li class="flex items-center gap-3 text-sm font-medium {{ $isBestSeller ? 'text-slate-200' : 'text-slate-600' }}">
                                        <svg class="w-5 h-5 {{ $isBestSeller ? 'text-brand-400' : 'text-brand-600' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/></svg>
                                        Support Prioritas
                                    </li>
                                </ul>
                            </div>

                            <div class="mt-auto">
                                <a href="https://wa.me/6281234567890?text=Halo, saya mau paket {{ $packet->Nama_Produk }}" 
                                   class="w-full block py-3.5 px-6 rounded-xl font-bold text-center text-sm transition-all duration-300
                                   {{ $isBestSeller 
                                        ? 'bg-brand-600 text-white shadow-lg hover:bg-brand-500 hover:shadow-brand-600/40' 
                                        : 'bg-white border-2 border-slate-200 text-slate-700 group-hover:border-brand-600 group-hover:bg-brand-600 group-hover:text-white' 
                                   }}">
                                    Pilih Paket
                                </a>
                            </div>

                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="py-24 bg-white relative overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
                <div class="absolute -top-[20%] -right-[10%] w-[500px] h-[500px] bg-brand-50 rounded-full blur-3xl opacity-60"></div>
                <div class="absolute top-[60%] -left-[10%] w-[400px] h-[400px] bg-purple-50 rounded-full blur-3xl opacity-60"></div>
            </div>

            <div class="max-w-7xl mx-auto px-6 relative z-10">
                <div class="text-center mb-16">
                    <h2 class="text-3xl font-extrabold text-slate-900">Kenapa Memilih Kami?</h2>
                    <p class="text-slate-500 mt-4 max-w-2xl mx-auto">Kami berkomitmen memberikan pengalaman internet terbaik untuk mendukung produktivitas digital Anda.</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                    @foreach([
                        ['icon' => 'M13 10V3L4 14h7v7l9-11h-7z', 'title' => 'Internet Stabil', 'desc' => 'Koneksi fiber optik anti putus dengan latensi rendah.', 'color' => 'bg-blue-50 text-blue-600'],
                        ['icon' => 'M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2', 'title' => 'Harga Flat', 'desc' => 'Bayar sesuai paket. Tanpa biaya tersembunyi.', 'color' => 'bg-green-50 text-green-600'],
                        ['icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z', 'title' => 'Support 24/7', 'desc' => 'Tim teknis siap membantu kendala Anda kapanpun.', 'color' => 'bg-purple-50 text-purple-600'],
                        ['icon' => 'M9 12l2 2 4-4', 'title' => 'Teknisi Ahli', 'desc' => 'Pemasangan cepat, rapi, dan profesional.', 'color' => 'bg-orange-50 text-orange-600']
                    ] as $item)
                    <div class="group p-8 rounded-2xl bg-white border border-slate-100 shadow-xl shadow-slate-200/40 hover:shadow-2xl hover:shadow-slate-200/60 hover:-translate-y-1 transition-all duration-300">
                        <div class="w-14 h-14 {{ $item['color'] }} rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $item['icon'] }}"/></svg>
                        </div>
                        <h3 class="text-xl font-bold text-slate-900 mb-3">{{ $item['title'] }}</h3>
                        <p class="text-slate-500 text-sm leading-relaxed">{{ $item['desc'] }}</p>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section id="faq" class="py-24 bg-white">
            <div class="max-w-3xl mx-auto px-6">
                <div class="text-center mb-12">
                    <h2 class="text-2xl font-bold text-slate-900">Pertanyaan Umum</h2>
                </div>

                <div class="space-y-4" id="faq-container">
                    @php
                        $faqs = [
                            ['q' => 'Bagaimana cara mendaftar?', 'a' => 'Cukup klik tombol Daftar atau hubungi WhatsApp kami.'],
                            ['q' => 'Berapa lama proses pemasangan?', 'a' => 'Estimasi pemasangan adalah 1-3 hari kerja.'],
                            ['q' => 'Apakah ada biaya tersembunyi?', 'a' => 'Tidak ada. Harga paket sudah termasuk PPN 11%.'],
                        ];
                    @endphp

                    @foreach($faqs as $index => $faq)
                    <div class="border-b border-slate-100">
                        <button class="w-full py-4 text-left flex justify-between items-center focus:outline-none group" onclick="toggleFaq(this)">
                            <span class="font-medium text-slate-900 group-hover:text-brand-600 transition">{{ $faq['q'] }}</span>
                            <svg class="w-5 h-5 text-slate-400 transform transition-transform duration-300 group-hover:text-brand-600" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                        </button>
                        <div class="grid grid-rows-[0fr] transition-[grid-template-rows] duration-300 ease-out faq-content overflow-hidden">
                            <div class="min-h-[0px]">
                                <div class="pb-4 text-slate-500 text-sm">
                                    {{ $faq['a'] }}
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                    <a href="#" class="text-slate-400 hover:text-brand-600 transition" aria-label="Kembali ke atas">
                        <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18"></path>
                        </svg>
                    </a>
                </div>
                
            </div>
            
        </div>
    </footer>

    <script>
        function toggleFaq(button) {
            const content = button.nextElementSibling;
            const icon = button.querySelector('svg');
            const isOpen = content.style.gridTemplateRows === '1fr';

            document.querySelectorAll('.faq-content').forEach(el => el.style.gridTemplateRows = '0fr');
            document.querySelectorAll('.faq-container svg').forEach(el => el.classList.remove('rotate-180'));

            if (!isOpen) {
                content.style.gridTemplateRows = '1fr';
                icon.classList.add('rotate-180');
            }
        }
    </script>
</body>
</html>
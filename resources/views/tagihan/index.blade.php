@extends('layouts.dashboard')

@section('title', config('app.name', 'Laravel') . ' - Tagihan')
@section('page_title', 'Tagihan')
@section('page_subtitle', 'Daftar pelanggan dengan tagihan jatuh tempo')

@section('content')
    <div class="bg-white rounded-lg shadow-md p-6">
        <div class="flex items-center justify-between gap-4 mb-6">
            <div>
                <h2 class="text-xl font-semibold text-gray-900">Daftar Tagihan</h2>
                <p class="text-sm text-gray-600">Menampilkan pelanggan dengan status <strong>"Belum Lunas"</strong> dan tanggal jatuh tempo <strong>≥ hari ini</strong></p>
            </div>
        </div>

        @if (session('success'))
            <div class="mb-4 px-4 py-2 rounded-lg bg-green-100 text-green-800 text-sm">
                {{ session('success') }}
            </div>
        @endif

        @if($pelanggan->count() > 0)
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Lengkap</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nomor Telepon</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Paket</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Jatuh Tempo</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach($pelanggan as $p)
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $p->nama_lengkap }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $p->nomor_telepon }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    <span class="px-2 py-1 text-xs font-semibold rounded-full bg-blue-100 text-blue-800">
                                        {{ $p->paket }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($p->jatuh_tempo)->format('d M Y') }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($p->status_pembayaran)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium
                                            @if($p->status_pembayaran === 'Lunas')
                                                bg-green-100 text-green-800
                                            @elseif($p->status_pembayaran === 'Belum Lunas')
                                                bg-amber-100 text-amber-800
                                            @else
                                                bg-gray-100 text-gray-800
                                            @endif">
                                            {{ $p->status_pembayaran }}
                                        </span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-gray-100 text-gray-800">
                                            Belum Lunas
                                        </span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button 
                                        type="button" 
                                        class="btn-tandai-lunas inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-green-600 hover:bg-green-700 text-white text-sm font-medium transition-all duration-200 shadow-sm hover:shadow-md focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2"
                                        data-id="{{ $p->id }}"
                                        data-nama="{{ $p->nama_lengkap }}"
                                        data-jatuh-tempo="{{ $p->jatuh_tempo->format('Y-m-d') }}"
                                        data-jatuh-tempo-display="{{ $p->jatuh_tempo->format('d M Y') }}"
                                    >
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Tandai Lunas
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="border border-dashed border-gray-200 rounded-lg p-12 text-center">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">Tidak ada tagihan</h3>
                <p class="mt-1 text-sm text-gray-500">Tidak ada pelanggan dengan status "Belum Lunas" dan tanggal jatuh tempo ≥ hari ini.</p>
            </div>
        @endif
    </div>

    <!-- Modal Dialog untuk Input Bulan -->
    <div id="bulanModal" class="hidden fixed inset-0 z-[9999] overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" id="modalBackdrop"></div>

        <!-- Modal wrapper -->
        <div class="flex min-h-full items-center justify-center p-4">
            <!-- Modal panel -->
            <div class="relative bg-white rounded-lg shadow-xl w-full max-w-lg transform transition-all">
                <form id="bulanForm" method="POST" action="">
                    @csrf
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-green-100 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                <h3 class="text-lg leading-6 font-medium text-gray-900" id="modal-title">
                                    Tandai Lunas
                                </h3>
                                <div class="mt-4">
                                    <p class="text-sm text-gray-500 mb-2">
                                        Pelanggan: <strong id="modal-nama"></strong>
                                    </p>
                                    <p class="text-sm text-gray-500 mb-4">
                                        Jatuh Tempo Saat Ini: <strong id="modal-jatuh-tempo"></strong>
                                    </p>
                                    <label for="bulan" class="block text-sm font-medium text-gray-700 mb-2">
                                        Pilih Jumlah Bulan (1-12)
                                    </label>
                                    <input 
                                        type="number" 
                                        name="bulan" 
                                        id="bulan" 
                                        min="1" 
                                        max="12" 
                                        value="1" 
                                        required
                                        class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 text-sm"
                                    >
                                    <p class="mt-2 text-xs text-gray-500">
                                        <span id="preview-text">1 bulan = +30 hari dari jatuh tempo terakhir</span>
                                    </p>
                                    <p class="mt-1 text-xs text-gray-400">
                                        Jatuh Tempo Baru: <strong id="preview-tanggal" class="text-green-600"></strong>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button 
                            type="submit" 
                            class="w-full inline-flex justify-center rounded-lg border border-transparent shadow-sm px-4 py-2 bg-green-600 text-base font-medium text-white hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors"
                        >
                            Konfirmasi
                        </button>
                        <button 
                            type="button" 
                            id="btnBatal"
                            class="mt-3 w-full inline-flex justify-center rounded-lg border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors"
                        >
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        (function() {
            let currentJatuhTempo = null;

            // Event listener untuk semua button "Tandai Lunas"
            function initTandaiLunasButtons() {
                const buttons = document.querySelectorAll('.btn-tandai-lunas');
                buttons.forEach(function(button) {
                    button.addEventListener('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        
                        const id = this.getAttribute('data-id');
                        const nama = this.getAttribute('data-nama');
                        const jatuhTempo = this.getAttribute('data-jatuh-tempo');
                        const jatuhTempoDisplay = this.getAttribute('data-jatuh-tempo-display');
                        
                        openBulanDialog(id, nama, jatuhTempo, jatuhTempoDisplay);
                    });
                });
            }

            // Event listener untuk backdrop
            function initModalBackdrop() {
                const backdrop = document.getElementById('modalBackdrop');
                if (backdrop) {
                    backdrop.addEventListener('click', function(e) {
                        e.stopPropagation();
                        closeBulanDialog();
                    });
                }
                
                const btnBatal = document.getElementById('btnBatal');
                if (btnBatal) {
                    btnBatal.addEventListener('click', function(e) {
                        e.preventDefault();
                        closeBulanDialog();
                    });
                }
                
                const bulanInput = document.getElementById('bulan');
                if (bulanInput) {
                    bulanInput.addEventListener('input', function() {
                        updatePreview(this.value);
                    });
                    bulanInput.addEventListener('change', function() {
                        updatePreview(this.value);
                    });
                }
            }
            
            function openBulanDialog(id, nama, jatuhTempo, jatuhTempoDisplay) {
                currentJatuhTempo = jatuhTempo;
                
                const form = document.getElementById('bulanForm');
                if (form) {
                    form.action = '/tagihan/' + id + '/lunas';
                }
                
                const modalNama = document.getElementById('modal-nama');
                const modalJatuhTempo = document.getElementById('modal-jatuh-tempo');
                const bulanInput = document.getElementById('bulan');
                
                if (modalNama) modalNama.textContent = nama;
                if (modalJatuhTempo) modalJatuhTempo.textContent = jatuhTempoDisplay;
                if (bulanInput) bulanInput.value = 1;
                
                updatePreview(1);
                
                const modal = document.getElementById('bulanModal');
                if (modal) {
                    modal.style.display = 'flex';
                    modal.style.flexDirection = 'column';
                    modal.style.alignItems = 'center';
                    modal.style.justifyContent = 'center';
                    modal.classList.remove('hidden');
                    document.body.style.overflow = 'hidden';
                    
                    // Focus pada input bulan
                    setTimeout(function() {
                        const bulanInput = document.getElementById('bulan');
                        if (bulanInput) {
                            bulanInput.focus();
                            bulanInput.select();
                        }
                    }, 100);
                }
            }

            function closeBulanDialog() {
                const modal = document.getElementById('bulanModal');
                if (modal) {
                    modal.classList.add('hidden');
                    modal.style.display = 'none';
                    document.body.style.overflow = '';
                }
            }

            function updatePreview(bulan) {
                if (!currentJatuhTempo) return;
                
                const bulanInt = parseInt(bulan) || 1;
                const hari = bulanInt * 30;
                
                // Parse tanggal jatuh tempo saat ini (format Y-m-d)
                const dateParts = currentJatuhTempo.split('-');
                const date = new Date(parseInt(dateParts[0]), parseInt(dateParts[1]) - 1, parseInt(dateParts[2]));
                
                // Tambah hari
                date.setDate(date.getDate() + hari);
                
                // Format tanggal baru
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const day = date.getDate();
                const month = months[date.getMonth()];
                const year = date.getFullYear();
                const newDate = day + ' ' + month + ' ' + year;
                
                const previewText = document.getElementById('preview-text');
                const previewTanggal = document.getElementById('preview-tanggal');
                
                if (previewText) {
                    previewText.textContent = bulanInt + ' bulan = +' + hari + ' hari dari jatuh tempo terakhir';
                }
                if (previewTanggal) {
                    previewTanggal.textContent = newDate;
                }
            }
            
            // Initialize saat DOM ready
            function init() {
                initTandaiLunasButtons();
                initModalBackdrop();
            }
            
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', init);
            } else {
                init();
            }
            
            // Close modal on escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    const modal = document.getElementById('bulanModal');
                    if (modal && !modal.classList.contains('hidden')) {
                        closeBulanDialog();
                    }
                }
            });
            
            // Expose functions to window for onclick
            window.openBulanDialog = openBulanDialog;
            window.closeBulanDialog = closeBulanDialog;
            window.updatePreview = updatePreview;
        })();
    </script>
@endsection

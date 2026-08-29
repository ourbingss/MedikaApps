<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="font-extrabold text-3xl text-slate-800 tracking-tighter leading-none">
                    Dashboard <span class="text-blue-500">Utama</span>
                </h2>
                <p class="text-sm text-slate-500 font-medium mt-1 uppercase tracking-widest">
                    Ringkasan Data Kesehatan
                </p>
            </div>
            
            
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="mb-8 bg-gradient-to-r from-blue-500 to-blue-400 overflow-hidden shadow-lg sm:rounded-xl p-6 text-white">
                <div class="flex items-center">
                    <div class="text-3xl mr-4">👋</div>
                    <div>
                        <h3 class="text-xl font-bold">Selamat Datang, {{ Auth::user()->name }}!</h3>
                        <p class="text-white opacity-100">
                            Sistem Medika-App siap digunakan. Berikut adalah ringkasan data kesehatan hari ini.
                        </p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="bg-white overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.08)] sm:rounded-2xl p-6 border-l-4 border-blue-500  transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-blue-100 rounded-full text-blue-600">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 uppercase">Total Pasien</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalPasien }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.08)] sm:rounded-2xl p-6 border-l-4 border-blue-500  transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-green-100 rounded-full text-green-600">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 uppercase">Total Dokter</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalDokter }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white overflow-hidden shadow-[0_10px_40px_rgba(0,0,0,0.08)] sm:rounded-2xl p-6 border-l-4 border-blue-500  transition-all duration-300">
                    <div class="flex items-center">
                        <div class="p-3 bg-yellow-100 rounded-full text-yellow-600">
                            <svg class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium text-gray-500 uppercase">Rekam Medis</p>
                            <p class="text-2xl font-bold text-gray-900">{{ $totalRekamMedis }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="bg-white p-6 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-50">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700 font-bold">Grafik Perbandingan Data</h3>
                    <div class="relative" style="height: 300px;">
                        <canvas id="barChart"></canvas>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-50">
                    <h3 class="text-lg font-semibold mb-4 text-gray-700 font-bold">Persentase Data Klinik</h3>
                    <div class="relative flex justify-center" style="height: 300px;">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const labels = {!! json_encode($chartData['labels']) !!};
        const values = {!! json_encode($chartData['data']) !!};

        // Konfigurasi Bar Chart
        new Chart(document.getElementById('barChart'), {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah',
                    data: values,
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b']
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });

        // Konfigurasi Pie Chart
        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: values,
                    backgroundColor: ['#3b82f6', '#10b981', '#f59e0b']
                }]
            },
            options: { responsive: true, maintainAspectRatio: false }
        });
    </script>
</x-app-layout>
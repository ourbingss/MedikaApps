<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Data Pasien') }}
        </h2>
            <div class="flex gap-2">
                <a href="{{ route('pasien.exportPdf') }}" class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded text-sm transition">
                    Export PDF
                </a>
                <a href="{{ route('pasien.exportWord') }}" 
                    style="background-color: #2563eb !important; color: white !important; padding: 8px 16px; border-radius: 4px; font-size: 14px; text-decoration: none; display: inline-block;" class="hover:opacity-90 transition">
                    Export Word
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-50">
                
                @if(session('success'))
                    <div id="alert-message" class="mb-4 flex items-center p-4 text-green-800 border-t-4 border-green-300 bg-green-50 rounded-lg shadow-sm" role="alert">
                        <svg class="flex-shrink-0 w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                        </svg>
                        <div class="ms-3 text-sm font-medium">{{ session('success') }}</div>
                    </div>
                @endif

                <div class="mb-6">
                    <a href="{{ route('pasien.create') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition font-bold">
                        + Tambah Pasien Baru
                    </a>
                </div>
                <div class="overflow-x-auto border rounded-lg">
                    <table class="min-w-full table-auto border-collapse">
                        <thead class="bg-gray-100 text-gray-700 uppercase text-xs">
                            <tr>
                                <th class="px-4 py-3 text-center border w-12">No</th>
                                <th class="px-4 py-3 text-left border-x">NIK</th>
                                <th class="px-4 py-3 text-left border-x">Nama Pasien</th>
                                <th class="px-4 py-3 text-left border-x">Tanggal Lahir</th>
                                <th class="px-4 py-3 text-left border-x">No. Telp</th>
                                <th class="px-4 py-3 text-left border-x">Alamat</th>
                                <th class="px-4 py-3 text-center border-x">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200 text-gray-600">
                            @forelse($pasiens as $p)
                            <tr class="hover:bg-gray-50 transition">
                                 <td class="px-4 py-3 border text-center">
                                    {{ ($pasiens->currentPage() - 1) * $pasiens->perPage() + $loop->iteration }}
                                </td>
                                <td class="px-4 py-3 border-x">{{ $p->nik }}</td>
                                <td class="px-4 py-3 border-x">{{ $p->nama_pasien }}</td>
                                <td class="px-4 py-3 border-x">{{ $p->tgl_lahir}}</td>
                                <td class="px-4 py-3 border-x">{{ $p->no_telp }}</td>
                                <td class="px-4 py-3 border-x text-sm">{{ Str::limit($p->alamat, 40) }}</td>
                                <td class="px-4 py-3 text-center border-x">
                                    <div class="flex justify-center gap-4">
                                        <a href="{{ route('pasien.edit', $p->id) }}" class="text-yellow-500 hover:text-yellow-700" title="Edit Data">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                            </svg>
                                        </a>
                                        <form action="{{ route('pasien.destroy', $p->id) }}" method="POST" onsubmit="return confirm('Yakin hapus pasien ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700" title="Hapus Data">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            @endforelse
                        </tbody>
                    </table>
                </div>

                                <div class="mt-6">
                                    {{ $pasiens->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const alert = document.getElementById('alert-message');
            if (alert) {
                setTimeout(() => {
                    alert.style.transition = "opacity 0.6s ease";
                    alert.style.opacity = "0";
                    setTimeout(() => alert.remove(), 600);
                }, 3000);
            }
        });
    </script>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Rekam Medis Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('rekam-medis.store') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Pasien</label>
                        <select name="pasien_id" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Pasien --</option>
                            @foreach($pasiens as $pasien)
                                <option value="{{ $pasien->id }}">{{ $pasien->nama_pasien }} (NIK: {{ $pasien->nik }})</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Dokter Pemeriksa</label>
                        <select name="dokter_id" class="w-full border rounded px-3 py-2" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}">{{ $dokter->nama_dokter }} - {{ $dokter->spesialis }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tanggal Periksa</label>
                        <input type="date" name="tgl_periksa" class="w-full border rounded px-3 py-2" required>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Keluhan</label>
                        <textarea name="keluhan" rows="3" class="w-full border rounded px-3 py-2" placeholder="Tuliskan keluhan pasien..." required></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Diagnosa</label>
                        <textarea name="diagnosa" rows="3" class="w-full border rounded px-3 py-2" placeholder="Tuliskan hasil diagnosa dokter..." required></textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('rekam-medis.index') }}" class="text-gray-500 hover:text-gray-700 font-medium mr-6 transition duration-150">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700">
                            Simpan Rekam Medis
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
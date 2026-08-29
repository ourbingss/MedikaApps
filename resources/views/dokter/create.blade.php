<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Dokter Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('dokter.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Nama Dokter</label>
                            <input type="text" name="nama_dokter" class="w-full border rounded px-3 py-2" value="{{ old('nama_dokter') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Spesialis</label>
                            <select name="spesialis" class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-4 py-2" required>
                                <option value="" disabled selected>-- Pilih Spesialis --</option>
                                <option value="Umum" {{ old('spesialis') == 'Umum' ? 'selected' : '' }}>Umum</option>
                                <option value="Kandungan" {{ old('spesialis') == 'Kandungan' ? 'selected' : '' }}>Kandungan</option>
                                <option value="Anak" {{ old('spesialis') == 'Anak' ? 'selected' : '' }}>Anak</option>
                                <option value="Penyakit Dalam" {{ old('spesialis') == 'Penyakit Dalam' ? 'selected' : '' }}>Penyakit Dalam</option>
                                <option value="Bedah" {{ old('spesialis') == 'Bedah' ? 'selected' : '' }}>Bedah</option>
                                <option value="Saraf" {{ old('spesialis') == 'Saraf' ? 'selected' : '' }}>Saraf</option>
                                <option value="Jantung" {{ old('spesialis') == 'Jantung' ? 'selected' : '' }}>Jantung</option>
                                <option value="Kulit" {{ old('spesialis') == 'Kulit' ? 'selected' : '' }}>Kulit</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">No. Telepon</label>
                            <input type="text" name="no_telp" class="w-full border rounded px-3 py-2" value="{{ old('no_telp') }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full border rounded px-3 py-2" required>{{ old('alamat') }}</textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('dokter.index') }}" class="text-gray-500 hover:text-gray-700 font-medium mr-6 transition duration-150">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 shadow">
                            Simpan Data Dokter
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
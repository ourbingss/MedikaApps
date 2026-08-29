<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Pasien Baru') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('pasien.store') }}" method="POST">
                    @csrf
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">NIK Pasien</label>
                            <input type="text" name="nik" class="w-full border rounded px-3 py-2 @error('nik') border-red-500 @enderror" value="{{ old('nik') }}" required>
                            @error('nik') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_pasien" class="w-full border rounded px-3 py-2" value="{{ old('nama_pasien') }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="w-full border rounded px-3 py-2" value="{{ old('tgl_lahir') }}" required>
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
                        <a href="{{ route('pasien.index') }}" class="text-gray-500 hover:text-gray-700 font-medium mr-6 transition duration-150">Batal</a>
                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 shadow">
                            Simpan Data Pasien
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
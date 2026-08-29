<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Pasien') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-50">
                <form action="{{ route('pasien.update', $pasien->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">NIK Pasien</label>
                            <input type="text" name="nik" class="w-full border rounded px-3 py-2 " value="{{ $pasien->nik }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Nama Lengkap</label>
                            <input type="text" name="nama_pasien" class="w-full border rounded px-3 py-2" value="{{ $pasien->nama_pasien }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="w-full border rounded px-3 py-2" value="{{ $pasien->tgl_lahir }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">No. Telepon</label>
                            <input type="text" name="no_telp" class="w-full border rounded px-3 py-2" value="{{ $pasien->no_telp }}" required>
                        </div>
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" class="w-full border rounded px-3 py-2" required>{{ $pasien->alamat }}</textarea>
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('pasien.index') }}" class="text-gray-500 hover:text-gray-700 font-medium mr-6 transition duration-150">Batal</a>
                        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 shadow">
                            Update Data Pasien
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
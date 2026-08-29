<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Dokter') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-50">
                
                <form action="{{ route('dokter.update', $dokter->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Nama Dokter</label>
                            <input type="text" name="nama_dokter" 
                                   class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-4 py-2" 
                                   value="{{ old('nama_dokter', $dokter->nama_dokter) }}" required>
                            <x-input-error :messages="$errors->get('nama_dokter')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">Spesialis</label>
                            <select name="spesialis" 
                                    class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-4 py-2" 
                                    required>
                                <option value="">-- Pilih Spesialis --</option>
                                @php
                                    $pilihan_spesialis = ['Umum', 'Kandungan', 'Anak', 'Penyakit Dalam', 'Bedah', 'Saraf', 'Jantung', 'Kulit'];
                                @endphp
                                @foreach($pilihan_spesialis as $sp)
                                    <option value="{{ $sp }}" {{ (old('spesialis', $dokter->spesialis) == $sp) ? 'selected' : '' }}>
                                        {{ $sp }}
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('spesialis')" class="mt-2" />
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 font-bold mb-2">No. Telepon</label>
                            <input type="text" name="no_telp" 
                                   class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-4 py-2" 
                                   value="{{ old('no_telp', $dokter->no_telp) }}" required>
                            <x-input-error :messages="$errors->get('no_telp')" class="mt-2" />
                        </div>
                    </div>

                    <div class="mb-6 mt-4">
                        <label class="block text-gray-700 font-bold mb-2">Alamat</label>
                        <textarea name="alamat" rows="3" 
                                  class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-4 py-2" 
                                  required>{{ old('alamat', $dokter->alamat) }}</textarea>
                        <x-input-error :messages="$errors->get('alamat')" class="mt-2" />
                    </div>

                    <hr class="mb-6 border-gray-100">

                    <div class="flex items-center justify-end">
                        <a href="{{ route('dokter.index') }}" 
                           class="text-gray-500 hover:text-gray-700 font-medium mr-6 transition duration-150">
                            Batal
                        </a>
                        <button type="submit" 
                                class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 shadow">
                            Update Data Dokter
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
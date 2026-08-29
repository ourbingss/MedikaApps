<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Rekam Medis') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 rounded-2xl shadow-[0_10px_40px_rgba(0,0,0,0.08)] border border-gray-50">
                
                <form action="{{ route('rekam-medis.update', $rekam->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Pasien</label>
                        <select name="pasien_id" class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-3 py-2" required>
                            <option value="">-- Pilih Pasien --</option>
                            @foreach($pasiens as $pasien)
                                <option value="{{ $pasien->id }}" {{ $rekam->pasien_id == $pasien->id ? 'selected' : '' }}>
                                    {{ $pasien->nama_pasien }} (NIK: {{ $pasien->nik }})
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('pasien_id')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Dokter Pemeriksa</label>
                        <select name="dokter_id" class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-3 py-2" required>
                            <option value="">-- Pilih Dokter --</option>
                            @foreach($dokters as $dokter)
                                <option value="{{ $dokter->id }}" {{ $rekam->dokter_id == $dokter->id ? 'selected' : '' }}>
                                    {{ $dokter->nama_dokter }} - {{ $dokter->spesialis }}
                                </option>
                            @endforeach
                        </select>
                        <x-input-error :messages="$errors->get('dokter_id')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Tanggal Periksa</label>
                        <input type="date" name="tgl_periksa" value="{{ old('tgl_periksa', $rekam->tgl_periksa) }}" class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-3 py-2" required>
                        <x-input-error :messages="$errors->get('tgl_periksa')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Keluhan</label>
                        <textarea name="keluhan" rows="3" class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-3 py-2" required>{{ old('keluhan', $rekam->keluhan) }}</textarea>
                        <x-input-error :messages="$errors->get('keluhan')" class="mt-2" />
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 font-bold mb-2">Diagnosa</label>
                        <textarea name="diagnosa" rows="3" class="w-full border-gray-300 focus:border-blue-500 focus:ring-blue-500 rounded-xl px-3 py-2" required>{{ old('diagnosa', $rekam->diagnosa) }}</textarea>
                        <x-input-error :messages="$errors->get('diagnosa')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a href="{{ route('rekam-medis.index') }}" class="text-gray-500 hover:text-gray-700 font-medium mr-6 transition duration-150">Batal</a>
                        <button type="submit" class="bg-yellow-500 text-white px-6 py-2 rounded hover:bg-yellow-600 shadow">
                            Update Rekam Medis
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
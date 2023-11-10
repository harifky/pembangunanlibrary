<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Anggota') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('anggota.update', $anggota->id_anggota) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan metode PUT untuk update -->

                        <!-- ID Anggota -->
                        <div class="mb-4">
                            <x-input-label for="id_anggota" :value="__('ID Anggota')" />
                            <x-text-input id="id_anggota" class="block mt-1 w-full" type="text" name="id_anggota" :value="$anggota->id_anggota" disabled />
                        </div>

                        <!-- NIS -->
                        <div class="mb-4">
                            <x-input-label for="nis" :value="__('NIS')" />
                            <x-text-input id="nis" class="block mt-1 w-full" type="text" name="nis" :value="$anggota->nis" disabled />
                        </div>

                        <!-- Nama Anggota -->
                        <div class="mb-4">
                            <x-input-label for="nama_anggota" :value="__('Nama Anggota')" />
                            <x-text-input id="nama_anggota" class="block mt-1 w-full" type="text" name="nama_anggota" :value="$anggota->nama_anggota" required />
                        </div>

                        <!-- Kelas -->
                        <div class="mb-4">
                            <x-input-label for="kelas" :value="__('Kelas')" />
                            <x-select id="kelas" class="block mt-1 w-full" name="kelas">
                                <option value="X" {{ $anggota->kelas === 'X' ? 'selected' : '' }}>X</option>
                                <option value="XI" {{ $anggota->kelas === 'XI' ? 'selected' : '' }}>XI</option>
                                <option value="XII" {{ $anggota->kelas === 'XII' ? 'selected' : '' }}>XII</option>
                                <option value="XIII" {{ $anggota->kelas === 'XIII' ? 'selected' : '' }}>XIII</option>
                            </x-select>
                        </div>

                        <!-- Jurusan -->
                        <div class="mb-4">
                            <x-input-label for="jurusan" :value="__('Jurusan')" />
                            <x-select id="jurusan" class="block mt-1 w-full" name="jurusan">
                                <option value="Teknik Mekatronika" {{ $anggota->jurusan === 'Teknik Mekatronika' ? 'selected' : '' }}>Teknik Mekatronika</option>
                                <option value="Teknik Elektronika Industri" {{ $anggota->jurusan === 'Teknik Elektronika Industri' ? 'selected' : '' }}>Teknik Elektronika Industri</option>
                                <option value="Teknik Otomasi Industri" {{ $anggota->jurusan === 'Teknik Otomasi Industri' ? 'selected' : '' }}>Teknik Otomasi Industri</option>
                                <option value="Teknik Elektronika Komunikasi" {{ $anggota->jurusan === 'Teknik Elektronika Komunikasi' ? 'selected' : '' }}>Teknik Elektronika Komunikasi</option>
                                <option value="Instrumentasi dan Otomatisasi Proses" {{ $anggota->jurusan === 'Instrumentasi dan Otomatisasi Proses' ? 'selected' : '' }}>Instrumentasi dan Otomatisasi Proses</option>
                                <option value="Teknik Pemanasan, Tata Udara, dan Pendinginan" {{ $anggota->jurusan === 'Teknik Pemanasan, Tata Udara, dan Pendinginan' ? 'selected' : '' }}>Teknik Pemanasan, Tata Udara, dan Pendinginan</option>
                                <option value="Rekayasa Perangkat Lunak" {{ $anggota->jurusan === 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
                                <option value="Sistem Informasi, Jaringan, dan Aplikasi" {{ $anggota->jurusan === 'Sistem Informasi, Jaringan, dan Aplikasi' ? 'selected' : '' }}>Sistem Informasi, Jaringan, dan Aplikasi</option>
                                <option value="Produksi dan Siaran Program Televisi" {{ $anggota->jurusan === 'Produksi dan Siaran Program Televisi' ? 'selected' : '' }}>Produksi dan Siaran Program Televisi</option>
                            </x-select>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-4">
                            <x-input-label for="alamat" :value="__('Alamat')" />
                            <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="$anggota->alamat" required />
                        </div>

                        <!-- Nomor Telepon -->
                        <div class="mb-4">
                            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                            <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="$anggota->nomor_telepon" required />
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-select id="status" class="block mt-1 w-full" name="status">
                                <option value="Aktif" {{ $anggota->status === 'Aktif' ? 'selected' : '' }}>Aktif</option>
                                <option value="Dalam Proses" {{ $anggota->status === 'Dalam Proses' ? 'selected' : '' }}>Dalam Proses</option>
                                <option value="Non Aktif" {{ $anggota->status === 'Non Aktif' ? 'selected' : '' }}>Non Aktif</option>
                            </x-select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('anggota.index') }}" class="ml-4">
                                <x-secondary-button>
                                    {{ __('Kembali') }}
                                </x-secondary-button>
                            </a>
                            <x-primary-button class="ml-4">
                                {{ __('Update Anggota') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
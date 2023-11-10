<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Anggota') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('anggota.create') }}">
                        @csrf

                        <!-- ID Anggota dan NIS -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="id_anggota" :value="__('ID Anggota')" />
                                    <x-text-input id="id_anggota" class="block mt-1 w-full" type="text" name="id_anggota" :value="old('id_anggota')" autofocus />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="nis" :value="__('NIS')" />
                                    <x-text-input id="nis" class="block mt-1 w-full" type="text" name="nis" :value="old('nis')" required />
                                </div>
                            </div>
                        </div>

                        <!-- Password dan Nama Anggota -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="password" :value="__('Password')" />
                                    <x-password-input id="password" class="block mt-1 w-full" type="password" name="password" required />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="nama_anggota" :value="__('Nama Anggota')" />
                                    <x-text-input id="nama_anggota" class="block mt-1 w-full" type="text" name="nama_anggota" :value="old('nama_anggota')" required />
                                </div>
                            </div>
                        </div>

                        <!-- Kelas dan Jurusan -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="kelas" :value="__('Kelas')" />
                                    <x-select id="kelas" class="block mt-1 w-full" name="kelas">
                                        <option value="X">X</option>
                                        <option value="XI">XI</option>
                                        <option value="XII">XII</option>
                                        <option value="XIII">XIII</option>
                                    </x-select>
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="jurusan" :value="__('Jurusan')" />
                                    <x-select id="jurusan" class="block mt-1 w-full" name="jurusan">
                                        <option value="Teknik Mekatronika">Teknik Mekatronika</option>
                                        <option value="Teknik Elektronika Industri">Teknik Elektronika Industri</option>
                                        <option value="Teknik Otomasi Industri">Teknik Otomasi Industri</option>
                                        <option value="Teknik Elektronika Komunikasi">Teknik Elektronika Komunikasi</option>
                                        <option value="Instrumentasi dan Otomatisasi Proses">Instrumentasi dan Otomatisasi Proses</option>
                                        <option value="Teknik Pemanasan, Tata Udara, dan Pendinginan">Teknik Pemanasan, Tata Udara, dan Pendinginan</option>
                                        <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                        <option value="Sistem Informasi, Jaringan, dan Aplikasi">Sistem Informasi, Jaringan, dan Aplikasi</option>
                                        <option value="Produksi dan Siaran Program Televisi">Produksi dan Siaran Program Televisi</option>
                                    </x-select>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat dan Nomor Telepon -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="alamat" :value="__('Alamat')" />
                                    <x-text-input id="alamat" class="block mt-1 w-full" type="text" name="alamat" :value="old('alamat')" required />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
                                    <x-text-input id="nomor_telepon" class="block mt-1 w-full" type="text" name="nomor_telepon" :value="old('nomor_telepon')" required />
                                </div>
                            </div>
                        </div>

                        <!-- Tanggal Bergabung -->
                        <div class="mb-4">
                            <x-input-label for="tanggal_bergabung" :value="__('Tanggal Bergabung')" />
                            <x-date-input id="tanggal_bergabung" class="block mt-1 w-full" name="tanggal_bergabung" :value="old('tanggal_bergabung')" required />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Tambah Anggota') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-4 py-6">
        <div class="p-6">
            <h3 class="text-lg font-semibold">Daftar Anggota</h3>
            <div class="overflow-x-auto">
                <table class="min-w-full mt-2 py-6">
                    <thead>
                        <tr>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">NIS</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Nama Anggota</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Kelas</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Jurusan</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Alamat</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Nomor Telepon</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Status</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Tanggal Bergabung</th>
                            <th class="px-6 py-3 text-left font-semibold bg-gray-100">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($anggota as $member)
                        <tr>
                            <td class="px-6 py-4">{{ $member->nis }}</td>
                            <td class="px-6 py-4">{{ $member->nama_anggota }}</td>
                            <td class="px-6 py-4">{{ $member->kelas }}</td>
                            <td class="px-6 py-4">{{ $member->jurusan }}</td>
                            <td class="px-6 py-4">{{ $member->alamat }}</td>
                            <td class="px-6 py-4">{{ $member->nomor_telepon }}</td>
                            <td class="px-6 py-4 
                                @if($member->status === 'Dalam Proses')
                                    text-red-500
                                @elseif($member->status === 'Non Aktif')
                                    text-black
                                @else
                                    text-green-500
                                @endif">
                                {{ $member->status }}
                            </td>

                            <td class="px-6 py-4">{{ $member->tanggal_bergabung }}</td>
                            <td class="px-6 py-4">
                                <a href="{{ route('anggota.edit', ['id' => $member->id_anggota]) }}" class="ml-4">
                                    <x-primary-button>
                                        {{ __('Edit') }}
                                    </x-primary-button>
                                </a>
                                <a href="{{ route('anggota.delete', ['id' => $member->id_anggota]) }}" class="ml-4" onclick="return confirm('Anda yakin ingin menghapus buku ini?')">
                                    <x-danger-button>
                                        {{ __('Delete') }}
                                    </x-danger-button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
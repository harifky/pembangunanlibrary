<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Peminjaman') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('peminjaman.create') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- ID Peminjaman -->
                        <div class="mb-4">
                            <x-input-label for="id_peminjaman" :value="__('ID Peminjaman')" />
                            <x-text-input id="id_peminjaman" class="block mt-1 w-full" type="text" name="id_peminjaman" :value="old('id_peminjaman')" autofocus />
                        </div>

                        <!-- ID Buku -->
                        <div class="mb-4">
                            <x-input-label for="id_buku" :value="__('Judul Buku')" />
                            <x-select id="id_buku" class="block mt-1 w-full" name="id_buku">
                                @foreach ($daftarBuku as $buku)
                                <option value="{{ $buku->id_buku }}">{{ $buku->judul_buku }}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <!-- ID Anggota -->
                        <div class="mb-4">
                            <x-input-label for="id_anggota" :value="__('Nama Anggota')" />
                            <x-select id="id_anggota" class="block mt-1 w-full" name="id_anggota">
                                @foreach ($daftarAnggota as $anggota)
                                <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                @endforeach
                            </x-select>
                        </div>

                        <!-- Nama Petugas (yang sedang login) -->
                        <div class="mb-4">
                            <x-input-label for="nama_petugas" :value="__('Nama Petugas')" />
                            <x-text-input id="nama_petugas" class="block mt-1 w-full" type="text" name="nama_petugas" :value="auth()->user()->name" readonly />
                        </div>

                        <!-- Tanggal Peminjaman -->
                        <div class="mb-4">
                            <x-input-label for="tanggal_peminjaman" :value="__('Tanggal Peminjaman')" />
                            <x-date-input id="tanggal_peminjaman" class="block mt-1 w-full" name="tanggal_peminjaman" :value="old('tanggal_peminjaman')" required />
                        </div>

                        <!-- Tanggal Jatuh Tempo -->
                        <div class="mb-4">
                            <x-input-label for="tanggal_jatuh_tempo" :value="__('Tanggal Jatuh Tempo')" />
                            <x-date-input id="tanggal_jatuh_tempo" class="block mt-1 w-full" name="tanggal_jatuh_tempo" :value="old('tanggal_jatuh_tempo')" required />
                        </div>

                        <!-- Status -->
                        <div class="mb-4">
                            <x-input-label for="status" :value="__('Status')" />
                            <x-select id="status" class="block mt-1 w-full" name="status">
                                <option value="Dalam Proses">Dalam Proses</option>
                                <option value="Dalam Peminjaman">Dalam Peminjaman</option>
                                <option value="Dikembalikan">Dikembalikan</option>
                            </x-select>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Tambah Peminjaman') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($peminjaman as $pinjam)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <h2 class="text-xl font-semibold text-gray-900">Judul Buku: </h2>
                    <p class="text-gray-500">{{ $pinjam->buku->judul_buku }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Nama Anggota: </h2>
                    <p class="text-gray-500">{{ $pinjam->anggota->nama_anggota }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Nama Petugas: </h2>
                    <p class="text-gray-500">{{ $pinjam->user->name }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Tanggal Peminjaman: </h2>
                    <p class="text-gray-500">{{ $pinjam->tanggal_peminjaman }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Tanggal Jatuh Tempo: </h2>
                    <p class="text-gray-500">{{ $pinjam->tanggal_jatuh_tempo }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Status: </h2>
                    @if ($pinjam->status === 'Dalam Proses')
                    <p class="text-orange-500">{{ $pinjam->status }}</p>
                    @elseif ($pinjam->status === 'Dalam Peminjaman')
                    <p class="text-green-500">{{ $pinjam->status }}</p>
                    @elseif ($pinjam->status === 'Dikembalikan')
                    <p class="text-black">{{ $pinjam->status }}</p>
                    @else
                    <p class="text-gray-500">{{ $pinjam->status }}</p>
                    @endif
                    <div class="mt-4 text-center">
                        @if ($pinjam->status === 'Dalam Peminjaman' || $pinjam->status === 'Selesai')
                        <a href="{{ route('peminjaman.delete', ['id' => $pinjam->id_peminjaman]) }}" class="ml-4" onclick="return confirm('Anda yakin ingin menghapus peminjaman ini?')">
                            <x-danger-button>
                                {{ __('Delete') }}
                            </x-danger-button>
                        </a>
                        @endif

                        @if ($pinjam->status === 'Dalam Proses')
                        <a href="{{ route('peminjaman.update-status', ['id' => $pinjam->id_peminjaman]) }}" class="ml-4">
                            <x-primary-button>
                                {{ __('Disetujui') }}
                            </x-primary-button>
                        </a>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
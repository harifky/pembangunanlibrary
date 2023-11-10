<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Pengembalian') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($daftarPeminjaman as $pinjam)
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

                    @if ($pinjam->status === 'Dalam Peminjaman')
                    <!-- Tambahkan form tanggal_pengembalian -->
                    <form method="POST" action="{{ route('pengembalian.create') }}">
                        @csrf
                        <input type="hidden" name="id_peminjaman" value="{{ $pinjam->id_peminjaman }}">
                        <input type="hidden" name="id_anggota" value="{{ $pinjam->id_anggota }}">
                        <input type="hidden" name="id_buku" value="{{ $pinjam->id_buku }}">
                        <div class="mb-4">
                            <x-text-input id="tanggal_pengembalian" class="block mt-1 w-full" type="date" name="tanggal_pengembalian" required />
                        </div>
                        <div class="mt-4 text-center">
                            <x-primary-button>
                                {{ __('Kembalikan') }}
                            </x-primary-button>
                        </div>
                    </form>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="py-6">
        <div class="max-w-9xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($pengembalian as $kembali)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    <h2 class="text-xl font-semibold text-gray-900">Judul Buku: </h2>
                    <p class="text-gray-500">{{ $kembali->peminjaman->buku->judul_buku }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Nama Anggota: </h2>
                    <p class="text-gray-500">{{ $kembali->peminjaman->anggota->nama_anggota }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Nama Petugas: </h2>
                    <p class="text-gray-500">{{ $kembali->peminjaman->user->name }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Tanggal Peminjaman: </h2>
                    <p class="text-gray-500">{{ $kembali->peminjaman->tanggal_peminjaman }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Tanggal Jatuh Tempo: </h2>
                    <p class="text-gray-500">{{ $kembali->peminjaman->tanggal_jatuh_tempo }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Tanggal Pengembalian: </h2>
                    <p class="text-gray-500">{{ $kembali->tanggal_pengembalian }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Status: </h2>
                    @if ($kembali->status === 'Terlambat')
                    <p class="text-black">{{ $kembali->status }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Denda: </h2>
                    <p class="text-red-500">{{ $kembali->denda }}</p>
                    @else
                    <p class="text-green-500">{{ $kembali->status }}</p>
                    @endif
                </div>
                @endforeach
            </div>
        </div>
</x-app-layout>
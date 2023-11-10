<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Buku') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('buku.create') }}" enctype="multipart/form-data">
                        @csrf

                        <!-- ID Buku dan Kode Buku -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="id_buku" :value="__('ID Buku')" />
                                    <x-text-input id="id_buku" class="block mt-1 w-full" type="text" name="id_buku" :value="old('id_buku')" autofocus />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="kode_buku" :value="__('Kode Buku')" />
                                    <x-text-input id="kode_buku" class="block mt-1 w-full" type="text" name="kode_buku" :value="old('kode_buku')" required />
                                </div>
                            </div>
                        </div>

                        <!-- Judul Buku dan Cover -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/3 pr-2">
                                    <x-input-label for="judul_buku" :value="__('Judul Buku')" />
                                    <x-text-input id="judul_buku" class="block mt-1 w-full" type="text" name="judul_buku" :value="old('judul_buku')" required />
                                </div>
                                <div class="w-1/3 pr-2">
                                    <x-input-label for="penulis" :value="__('Penulis')" />
                                    <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="old('penulis')" required />
                                </div>
                                <div class="w-1/3 pl-2">
                                    <x-input-label for="penerbit" :value="__('Penerbit')" />
                                    <x-text-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" :value="old('penerbit')" required />
                                </div>
                            </div>
                        </div>


                        <!-- Deskripsi dan Penulis -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                    <x-textarea id="deskripsi" class="block mt-1 w-full" name="deskripsi" :value="old('deskripsi')" rows="4" required />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="cover" :value="__('Cover')" />
                                    <x-text-input id="cover" class="block mt-1 w-full" type="file" name="cover" accept="image/*" />
                                </div>
                            </div>
                        </div>

                        <!-- Tahun Terbit dan Kategori -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="tahun_terbit" :value="__('Tahun Terbit')" />
                                    <x-text-input id="tahun_terbit" class="block mt-1 w-full" type="text" name="tahun_terbit" :value="old('tahun_terbit')" required />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="kategori" :value="__('Kategori')" />
                                    <x-select id="kategori" class="block mt-1 w-full" name="kategori">
                                        <option value="Agama">Agama</option>
                                        <option value="Biografi">Biografi</option>
                                        <option value="Drama">Drama</option>
                                        <option value="Ekonomi">Ekonomi</option>
                                        <option value="Fantasi">Fantasi</option>
                                        <option value="Fiksi">Fiksi</option>
                                        <option value="Hukum">Hukum</option>
                                        <option value="Horor">Horor</option>
                                        <option value="Kuliner">Kuliner</option>
                                        <option value="Misteri">Misteri</option>
                                        <option value="Non-Fiksi">Non-Fiksi</option>
                                        <option value="Olahraga">Olahraga</option>
                                        <option value="Pariwisata">Pariwisata</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Politik">Politik</option>
                                        <option value="Romansa">Romansa</option>
                                        <option value="Sains">Sains</option>
                                        <option value="Sastrawan">Sastrawan</option>
                                        <option value="Sejarah">Sejarah</option>
                                        <option value="Seni">Seni</option>
                                        <option value="Teknologi">Teknologi</option>
                                    </x-select>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Salinan Tersedia dan Rak -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="jumlah_salinan_tersedia" :value="__('Jumlah Salinan Tersedia')" />
                                    <x-text-input id="jumlah_salinan_tersedia" class="block mt-1 w-full" type="number" name="jumlah_salinan_tersedia" :value="old('jumlah_salinan_tersedia')" required />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="rak" :value="__('Rak')" />
                                    <x-select id="rak" class="block mt-1 w-full" name="rak">
                                        <option value="Rak 1">Rak 1</option>
                                        <option value="Rak 2">Rak 2</option>
                                        <option value="Rak 3">Rak 3</option>
                                        <option value="Rak 4">Rak 4</option>
                                        <option value="Rak 5">Rak 5</option>
                                    </x-select>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-4">
                                {{ __('Tambah Buku') }}
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
                @foreach($buku as $book)
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                    @if (isset($book->cover))
                    <div class="max-w-full">
                        <img src="{{ asset('storage/covers/' . $book->cover) }}" alt="Cover Buku" class="w-full" />
                    </div>
                    @endif
                    <h2 class="text-xl font-semibold text-gray-900">Judul Buku: </h2>
                    <p class="text-gray-500">{{ $book->judul_buku }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Kode Buku: </h2>
                    <p class="text-gray-500">{{ $book->kode_buku }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Penulis: </h2>
                    <p class="text-gray-500">{{ $book->penulis }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Penerbit: </h2>
                    <p class="text-gray-500">{{ $book->penerbit }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Tahun Terbit: </h2>
                    <p class="text-gray-500">{{ $book->tahun_terbit }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Kategori: </h2>
                    <p class="text-gray-500">{{ $book->kategori }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Jumlah Salinan Tersedia: </h2>
                    <p class="text-gray-500">{{ $book->jumlah_salinan_tersedia }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Rak: </h2>
                    <p class="text-gray-500">{{ $book->rak }}</p>
                    <h2 class="text-xl font-semibold text-gray-900">Deskripsi: </h2>
                    <p class="text-gray-500">{{ $book->deskripsi }}</p>
                    <div class="mt-4 text-center">
                        <a href="{{ route('buku.edit', ['id' => $book->id_buku]) }}" class="ml-4">
                            <x-primary-button>
                                {{ __('Edit') }}
                            </x-primary-button>
                        </a>
                        <a href="{{ route('buku.delete', ['id' => $book->id_buku]) }}" class="ml-4" onclick="return confirm('Anda yakin ingin menghapus buku ini?')">
                            <x-danger-button>
                                {{ __('Delete') }}
                            </x-danger-button>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
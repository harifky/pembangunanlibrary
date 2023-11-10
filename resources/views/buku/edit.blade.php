<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Buku') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form method="POST" action="{{ route('buku.update', $buku->id_buku) }}" enctype="multipart/form-data">
                        @csrf
                        @method('POST') <!-- Gunakan metode PUT untuk update -->

                        <!-- ID Buku dan Kode Buku (Non-editable) -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="id_buku" :value="__('ID Buku')" />
                                    <x-text-input id="id_buku" class="block mt-1 w-full" type="text" name="id_buku" :value="$buku->id_buku" disabled />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="kode_buku" :value="__('Kode Buku')" />
                                    <x-text-input id="kode_buku" class="block mt-1 w-full" type="text" name="kode_buku" :value="$buku->kode_buku" />
                                </div>
                            </div>
                        </div>

                        <!-- Judul Buku, Penulis, dan Penerbit -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/3 pr-2">
                                    <x-input-label for="judul_buku" :value="__('Judul Buku')" />
                                    <x-text-input id="judul_buku" class="block mt-1 w-full" type="text" name="judul_buku" :value="$buku->judul_buku" />
                                </div>
                                <div class="w-1/3 pr-2">
                                    <x-input-label for="penulis" :value="__('Penulis')" />
                                    <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="$buku->penulis" />
                                </div>
                                <div class="w-1/3 pl-2">
                                    <x-input-label for="penerbit" :value="__('Penerbit')" />
                                    <x-text-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" :value="$buku->penerbit" />
                                </div>
                            </div>
                        </div>

                        <!-- Deskripsi dan Cover -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                                    <textarea id="deskripsi" class="block mt-1 w-full" name="deskripsi" rows="4">{{ $buku->deskripsi }}</textarea>
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
                                    <x-text-input id="tahun_terbit" class="block mt-1 w-full" type="text" name="tahun_terbit" :value="$buku->tahun_terbit" />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="kategori" :value="__('Kategori')" />
                                    <x-select id="kategori" class="block mt-1 w-full" name="kategori">
                                        <option value="Agama" @if($buku->kategori === 'Agama') selected @endif>Agama</option>
                                        <option value="Biografi" @if($buku->kategori === 'Biografi') selected @endif>Biografi</option>
                                        <option value="Drama" @if($buku->kategori === 'Drama') selected @endif>Drama</option>
                                        <option value="Ekonomi" @if($buku->kategori === 'Ekonomi') selected @endif>Ekonomi</option>
                                        <option value="Fantasi" @if($buku->kategori === 'Fantasi') selected @endif>Fantasi</option>
                                        <option value="Fiksi" @if($buku->kategori === 'Fiksi') selected @endif>Fiksi</option>
                                        <option value="Hukum" @if($buku->kategori === 'Hukum') selected @endif>Hukum</option>
                                        <option value="Horor" @if($buku->kategori === 'Horor') selected @endif>Horor</option>
                                        <option value="Kuliner" @if($buku->kategori === 'Kuliner') selected @endif>Kuliner</option>
                                        <option value="Misteri" @if($buku->kategori === 'Misteri') selected @endif>Misteri</option>
                                        <option value="Non-Fiksi" @if($buku->kategori === 'Non-Fiksi') selected @endif>Non-Fiksi</option>
                                        <option value="Olahraga" @if($buku->kategori === 'Olahraga') selected @endif>Olahraga</option>
                                        <option value="Pariwisata" @if($buku->kategori === 'Pariwisata') selected @endif>Pariwisata</option>
                                        <option value="Pendidikan" @if($buku->kategori === 'Pendidikan') selected @endif>Pendidikan</option>
                                        <option value="Politik" @if($buku->kategori === 'Politik') selected @endif>Politik</option>
                                        <option value="Romansa" @if($buku->kategori === 'Romansa') selected @endif>Romansa</option>
                                        <option value="Sains" @if($buku->kategori === 'Sains') selected @endif>Sains</option>
                                        <option value="Sastrawan" @if($buku->kategori === 'Sastrawan') selected @endif>Sastrawan</option>
                                        <option value="Sejarah" @if($buku->kategori === 'Sejarah') selected @endif>Sejarah</option>
                                        <option value="Seni" @if($buku->kategori === 'Seni') selected @endif>Seni</option>
                                        <option value="Teknologi" @if($buku->kategori === 'Teknologi') selected @endif>Teknologi</option>
                                    </x-select>
                                </div>
                            </div>
                        </div>

                        <!-- Jumlah Salinan Tersedia dan Rak -->
                        <div class="mb-4">
                            <div class="flex justify-between">
                                <div class="w-1/2 pr-2">
                                    <x-input-label for="jumlah_salinan_tersedia" :value="__('Jumlah Salinan Tersedia')" />
                                    <x-text-input id="jumlah_salinan_tersedia" class="block mt-1 w-full" type="number" name="jumlah_salinan_tersedia" :value="$buku->jumlah_salinan_tersedia" />
                                </div>
                                <div class="w-1/2 pl-2">
                                    <x-input-label for="rak" :value="__('Rak')" />
                                    <x-select id="rak" class="block mt-1 w-full" name="rak">
                                        <option value="Rak 1" @if($buku->rak === 'Rak 1') selected @endif>Rak 1</option>
                                        <option value="Rak 2" @if($buku->rak === 'Rak 2') selected @endif>Rak 2</option>
                                        <option value="Rak 3" @if($buku->rak === 'Rak 3') selected @endif>Rak 3</option>
                                        <option value="Rak 4" @if($buku->rak === 'Rak 4') selected @endif>Rak 4</option>
                                        <option value="Rak 5" @if($buku->rak === 'Rak 5') selected @endif>Rak 5</option>
                                    </x-select>
                                </div>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <a href="{{ route('buku.index') }}" class="ml-4">
                                <x-secondary-button>
                                    {{ __('Kembali') }}
                                </x-secondary-button>
                            </a>
                            <x-primary-button class="ml-4">
                                {{ __('Update Buku') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
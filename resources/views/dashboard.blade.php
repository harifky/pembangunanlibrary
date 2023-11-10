<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <marquee behavior="scroll" direction="left" style="font-size: 24px;">
                        Selamat Datang, {{ Auth::user()->jabatan }} {{ Auth::user()->name }}
                    </marquee>
                </div>
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                <!-- Card Buku -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Buku</h3>
                        <p class="text-4xl font-bold">{{ \App\Models\Buku::count() }}</p>
                    </div>
                </div>

                <!-- Card Peminjaman -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Peminjaman</h3>
                        <p class="text-4xl font-bold">{{ \App\Models\Peminjaman::count() }}</p>
                    </div>
                </div>

                <!-- Card Pengembalian -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Pengembalian</h3>
                        <p class="text-4xl font-bold">{{ \App\Models\Pengembalian::count() }}</p>
                    </div>
                </div>

                <!-- Card Anggota -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Anggota</h3>
                        <p class="text-4xl font-bold">{{ \App\Models\Anggota::count() }}</p>
                    </div>
                </div>

                <!-- Card User -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <h3 class="text-xl font-semibold text-gray-800 mb-4">Petugas</h3>
                        <p class="text-4xl font-bold">{{ \App\Models\User::count() }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
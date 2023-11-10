<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />
        </div>

        <div>
            <x-input-label for="alamat" :value="__('Alamat')" />
            <x-text-input id="alamat" name="alamat" type="text" class="mt-1 block w-full" :value="old('alamat', $user->alamat)" required />
            <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
        </div>

        <div>
            <x-input-label for="nomor_telepon" :value="__('Nomor Telepon')" />
            <x-text-input id="nomor_telepon" name="nomor_telepon" type="text" class="mt-1 block w-full" :value="old('nomor_telepon', $user->nomor_telepon)" required />
            <x-input-error class="mt-2" :messages="$errors->get('nomor_telepon')" />
        </div>

        <div>
            <x-input-label for="jabatan" :value="__('Jabatan')" />
            <x-text-input id="jabatan" name="jabatan" type="text" class="mt-1 block w-full" :value="old('jabatan', $user->jabatan)" required />
            <x-input-error class="mt-2" :messages="$errors->get('jabatan')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
            <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
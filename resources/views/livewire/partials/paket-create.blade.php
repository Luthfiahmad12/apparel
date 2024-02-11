<div>
    <x-modal name="create-data" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="create" class="p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-5">
                {{ __('Tambah Data Rekening') }}
            </h2>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Bank</label>
                <select wire:model="form.id_bank"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option value="">-- Pilih Fitur --</option>
                    @foreach ($fiturs as $fitur)
                        <option value="{{ $fitur->id }}">{{ $fitur->nama }}
                        </option>
                    @endforeach
                </select>
                @error('form.id_bank')
                    <span class="text-sm text-red-600 space-y-1 mt2"> {{ $message }}</span>
                @enderror
                {{-- <x-input-error :messages="$errors->get('form.id_bank')" class="mt-2" /> --}}
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                    Rekening</label>
                <input wire:model.live="form.no_rekening" type="text" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{-- <x-input-error :messages="$errors->get('form.no_rekening')" class="mt-2" /> --}}
                @error('form.no_rekening')
                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                </label>
                <input wire:model="form.nama" type="text" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{-- <x-input-error :messages="$errors->get('form.nama')" class="mt-2" /> --}}
                @error('form.nama')
                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3 bg-blue-600">
                    {{ __('Create') }}
                </x-primary-button>
                <x-loading target='create'></x-loading>
            </div>
        </form>
    </x-modal>
</div>

<div>
    <x-modal name="create-data" maxWidth='4xl' :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="create" class="p-6">
            <h2 class="text-xl font-bold text-gray-900 mb-5">
                {{ __('Tambah Data Rekening') }}
            </h2>
            <div class="md:flex md:space-x-4 mb-5">
                <div class="md:w-6/12">
                    <div
                        class="block max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"">
                        <h4 class="text-lg font-bold text-teal-600 mb-2 text-center">
                            {{ __('Nama Customer') }}
                        </h4>
                        <div class="mb-5">
                            <label for="base-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                            <input wire:model.live="" type="text" id="base-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('')
                                <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="base-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                            <input wire:model.live="" type="text" id="base-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('')
                                <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-5">
                            <label for="base-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No HP</label>
                            <input wire:model.live="" type="text" id="base-input"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            @error('')
                                <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="md:w-6/12">
                    <div
                        class="block max-w-md p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"">
                        <h4 class="text-lg font-bold text-teal-600 mb-2 text-center">
                            {{ __('Pilih Paket') }}
                        </h4>
                        <div class="mb-5">
                            <label for="base-input"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Paket</label>
                            <select wire:model=""
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">-- Pilih Bank --</option>
                                <option value="">-- Pilih Bank --</option>
                                <option value="">-- Pilih Bank --</option>
                            </select>
                            @error('')
                                <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>

            <div
                class="block max-w-full p-6 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700"">
                <h4 class="text-lg font-bold text-teal-600 mb-2 text-center">
                    {{ __('Pembayaran') }}
                </h4>
                <div class="mb-5">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jumlah
                        pcs</label>
                    <input wire:model.live="form.no_rekening" type="text" id="base-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @error('form.no_rekening')
                        <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                    @enderror
                </div>

                <label for="" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Opsi
                    Pembayaran</label>
                <ul class="grid w-full gap-6 md:grid-cols-2 mb-5">
                    <li>
                        <input type="radio" id="hosting-small" name="hosting" value="hosting-small"
                            class="hidden peer" required>
                        <label for="hosting-small"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">Full Payment</div>
                                <div class="w-full">Good for small websites</div>
                            </div>
                        </label>
                    </li>
                    <li>
                        <input type="radio" id="hosting-big" name="hosting" value="hosting-big" class="hidden peer">
                        <label for="hosting-big"
                            class="inline-flex items-center justify-between w-full p-5 text-gray-500 bg-white border border-gray-200 rounded-lg cursor-pointer dark:hover:text-gray-300 dark:border-gray-700 dark:peer-checked:text-blue-500 peer-checked:border-blue-600 peer-checked:text-blue-600 hover:text-gray-600 hover:bg-gray-100 dark:text-gray-400 dark:bg-gray-800 dark:hover:bg-gray-700">
                            <div class="block">
                                <div class="w-full text-lg font-semibold">Down Payment</div>
                                <div class="w-full">Good for large websites</div>
                            </div>
                        </label>
                    </li>
                </ul>



                <div class="mb-5">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nomor
                        Rekening</label>
                    <input wire:model.live="form.no_rekening" type="text" id="base-input"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

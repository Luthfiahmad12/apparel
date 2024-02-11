<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Paket') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="mb-5">
                <x-button class="space-y-6"
                    x-on:click.prevent="$dispatch('open-modal', 'create-data')">{{ __('Tambah Paket') }}</x-button>
            </div>
            @if ($pakets->count() > 0)
                <div class="overflow-x-auto">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-6 py-4 font-bold">
                                        #
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Nama
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Harga
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Fitur
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pakets as $index => $paket)
                                    <tr
                                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <th scope="row"
                                            class="px-6 py-4 font-large text-gray-900 whitespace-nowrap dark:text-white">
                                            {{ $pakets->firstItem() + $index }}
                                        </th>
                                        <td wire:key="{{ $paket->id }}" class="px-6 py-4">
                                            <div class="inline-flex rounded-md shadow-sm" role="group">
                                                <button type="button" wire:click="edit({{ $paket }})"
                                                    class="mr-1 md:mr-2 font-large text-blue-600 dark:text-blue-500 hover:underline"><i
                                                        class="fa-regular fa-pen-to-square"></i></button>
                                                <button type="button" wire:click="confirmDelete({{ $paket->id }})"
                                                    class="font-large text-red-600 dark:text-blue-500 hover:underline"><i
                                                        class="fa-regular fa-trash-can"></i></button>
                                                <x-loading size='w-4 h-4'
                                                    target='confirmDelete({{ $paket->id }})'></x-loading>
                                                <x-loading size='w-4 h-4'
                                                    target='edit({{ $paket->id }})'></x-loading>
                                            </div>
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ strtoupper($paket->nama) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ formatRupiah($paket->harga) }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <ul>
                                                {{ $fiturArray[$index] ?? 'tidak ada fitur' }}
                                            </ul>
                                            {{ $paket->fitur_id }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="py-6 px-6">
                            {{ $pakets->links() }}
                        </div>
                    </div>
                </div>
            @else
                <p class="text-center font-medium text-gray-900 whitespace-nowrap">Tidak ada data</p>
            @endif
        </div>
    </div>


    <x-modal name="create-data" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="create" class="p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-5">
                {{ __('Tambah Data Paket') }}
            </h2>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                </label>
                <input wire:model="form.nama" type="text" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{-- <x-input-error :messages="$errors->get('nama')" class="mt-2" /> --}}
                @error('form.nama')
                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="base-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input wire:model="form.harga" type="text" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                {{-- <x-input-error :messages="$errors->get('harga')" class="mt-2" /> --}}
                @error('form.harga')
                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5" wire:ignore>
                <label for="base-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fitur</label>
                @foreach ($fiturs as $fitur)
                    <div class="flex mb-3 border border-gray-200 rounded dark:border-gray-700 items-center p-2">
                        <div class="ps-4 h-5">
                            <input id="helper-checkbox" aria-describedby="helper-checkbox-text" type="checkbox"
                                wire:model="form.fitur_id" value="{{ $fitur->id }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="ms-2 text-sm">
                            <label for="helper-checkbox"
                                class="font-medium text-gray-900 dark:text-gray-300">{{ $fitur->nama }}</label>
                            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                For orders shipped from $25 in books or $29 in other categories
                            </p>
                        </div>
                    </div>
                @endforeach
                @error('form.fitur_id')
                    <span class="text-sm text-red-600 space-y-1 mt2"> {{ $message }}</span>
                @enderror
                {{-- <x-input-error :messages="$errors->get('fitur_id')" class="mt-2" /> --}}
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

    <x-modal name="delete-data" maxWidth="md">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Apakah anda yakin ingin menghapus Fitur ini ?</h3>
                <button type="submit" wire:click='delete({{ $selectId }})'
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Ya, Hapus Rekening
                </button>
                <button x-on:click="$dispatch('close')" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    cancel</button>
            </div>
        </div>
    </x-modal>

    <x-modal name="edit-data" :show="$errors->isNotEmpty()" focusable>
        <form wire:submit="update" class="p-6">
            <h2 class="text-lg font-medium text-gray-900 mb-5">
                {{ __('Tambah Data Paket') }}
            </h2>
            <div class="mb-5">
                <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
                </label>
                <input wire:model="form.nama" type="text" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.nama')
                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5">
                <label for="base-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Harga</label>
                <input wire:model="form.harga" type="text" id="base-input"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @error('form.harga')
                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mb-5" wire:ignore>
                <label for="base-input"
                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Fitur</label>
                @foreach ($fiturs as $fitur)
                    <div class="flex mb-3 border border-gray-200 rounded dark:border-gray-700 items-center p-2">
                        <div class="ps-4 h-5">
                            <input id="fitur_{{ $fitur->id }}" aria-describedby="helper-checkbox-text"
                                type="checkbox" wire:model="form.fitur_id" value="{{ $fitur->id }}"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                        </div>
                        <div class="ms-2 text-sm">
                            <label for="fitur_{{ $fitur->id }}"
                                class="font-medium text-gray-900 dark:text-gray-300">{{ $fitur->nama }}</label>
                            <p id="helper-checkbox-text" class="text-xs font-normal text-gray-500 dark:text-gray-300">
                                For orders shipped from $25 in books or $29 in other categories
                            </p>
                        </div>
                    </div>
                @endforeach
                @error('form.fitur_id')
                    <span class="text-sm text-red-600 space-y-1 mt2"> {{ $message }}</span>
                @enderror
            </div>
            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button class="ms-3 bg-blue-600">
                    {{ __('Update') }}
                </x-primary-button>
                <x-loading target='update'></x-loading>
            </div>
        </form>
    </x-modal>


</div>

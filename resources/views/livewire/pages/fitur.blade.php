<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Fitur') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-6">
            <div class="md:flex">
                <div class="md:w-4/12">
                    <div
                        class="w-full max-w-sm p-4 bg-gray-50 border border-gray-200 rounded-lg shadow sm:p-6 md:p-8 dark:bg-gray-50 dark:border-gray-700">
                        <form wire:submit="create">
                            <h2 class="text-lg font-medium text-gray-900 mb-5">
                                {{ __('Tambah Data Fitur') }}
                            </h2>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                                <input wire:model.live="form.nama" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('form.nama')
                                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-5">
                                <label for="base-input"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Value
                                </label>
                                <input wire:model="form.value" type="text" id="base-input"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                @error('form.value')
                                    <span class="text-sm text-red-600 space-y-1 mt-2"> {{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mt-6 flex justify-end">
                                <x-secondary-button>
                                    {{ __('Reset') }}
                                </x-secondary-button>

                                <x-primary-button class="ms-3 bg-blue-600">
                                    {{ __('Create') }}
                                </x-primary-button>
                                <x-loading target='create'></x-loading>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="md:w-8/12 ml-6">
                    <div class="overflow-x-auto">
                        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-40">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th scope="col" class="px-6 py-4 font-bold">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Value
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Active
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            <span class="sr-only">Edit</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($fiturs as $index => $fitur)
                                        <tr
                                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                            <th scope="row"
                                                class="px-6 py-4 font-large text-gray-900 whitespace-nowrap dark:text-white">
                                                {{ $fiturs->firstItem() + $index }}
                                            </th>
                                            @if ($editId === $fitur->id)
                                                <div
                                                    style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1rem;">
                                                    <td>
                                                        <input type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            wire:model='editnama'>
                                                    </td>
                                                    <td>
                                                        <input type="text"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                            wire:model='editvalue'>
                                                    </td>
                                                </div>
                                            @else
                                                <td class="px-6 py-4">
                                                    {{ strtoupper($fitur->nama) }}
                                                </td>
                                                <td class="px-6 py-4">
                                                    {{ strtoupper($fitur->value) }}
                                                </td>
                                            @endif
                                            <td class="px-6 py-4">
                                                <label class="relative inline-flex items-center me-5 cursor-pointer">
                                                    <input type="checkbox" wire:click='toggle({{ $fitur->id }})'
                                                        class="sr-only peer"
                                                        @if ($fitur->is_active === 1) checked @endif>
                                                    <div
                                                        class="w-9 h-5 bg-gray-200 rounded-full peer dark:bg-gray-700 peer-focus:ring-4 peer-focus:ring-teal-300 dark:peer-focus:ring-teal-800 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-4 after:w-4 after:transition-all dark:border-gray-600 peer-checked:bg-teal-600">
                                                    </div>
                                                </label>
                                                <x-loading target='toggle({{ $fitur->id }})'
                                                    size='w-4 h-4'></x-loading>
                                            </td>
                                            <td wire:key="{{ $fitur->id }}" class="px-6 py-4">
                                                <div class="inline-flex rounded-md shadow-sm" role="group">

                                                    @if ($editId === $fitur->id)
                                                        <div class="mt-2">
                                                            <x-danger-button wire:click='cancel'>
                                                                cancel
                                                            </x-danger-button>
                                                            <x-primary-button wire:click='update'>
                                                                Update
                                                            </x-primary-button>
                                                        </div>
                                                    @else
                                                        <button type="button" wire:click="edit({{ $fitur->id }})"
                                                            class="mr-1 md:mr-2 font-large text-blue-600 dark:text-blue-500 hover:underline"><i
                                                                class="fa-regular fa-pen-to-square"></i></button>
                                                        <button type="button"
                                                            wire:click="confirmDelete({{ $fitur->id }})"
                                                            class="font-large text-red-600 dark:text-blue-500 hover:underline"><i
                                                                class="fa-regular fa-trash-can"></i></button>
                                                        <x-loading size='w-4 h-4'
                                                            target='confirmDelete({{ $fitur->id }})'></x-loading>
                                                    @endif

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <td class="text-center font-medium text-gray-900 whitespace-nowrap">Tidak ada
                                            data</td>
                                    @endforelse
                                </tbody>
                            </table>
                            <div class="py-6 px-6">
                                {{ $fiturs->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-modal name="delete-data" maxWidth="md">
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <div class="p-4 md:p-5 text-center">
                <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                    Apakah anda yakin ingin menghapus Fitur ini {{ $selectId }} ?</h3>
                <button type="submit" wire:click='delete({{ $selectId }})'
                    class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                    Ya, Hapus FItur
                </button>
                <button x-on:click="$dispatch('close')" type="button"
                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">
                    cancel</button>
            </div>
        </div>
    </x-modal>
</div>

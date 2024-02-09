<div>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }} {{ strtoupper(auth()->user()->role) }}
                    <br>
                    <x-button class="mt-5"
                        @click="$dispatch('Toastify', { message: 'Hallo Assalamualakum', status:'success' })">{{ __('Click Me success') }}</x-button>
                    <x-button class="mt-5"
                        @click="$dispatch('Toastify', { message: 'Hallo Assalamualakum', status:'info' })">{{ __('Click Me info') }}</x-button>
                    <x-button class="mt-5"
                        @click="$dispatch('Toastify', { message: 'Hallo Assalamualakum', status:'error' })">{{ __('Click Me Error') }}</x-button>
                    <x-button class="mt-5"
                        @click="$dispatch('Toastify', { message: 'Hallo Assalamualakum', status:'default' })">{{ __('Click Me default') }}</x-button>
                    <x-button class="mt-5"
                        @click="$dispatch('open-modal','test', { id: 22 })">{{ __('Modal dgn params ID') }}</x-button>

                    <hr>
                    <hr>
                </div>
            </div>
        </div>
        <x-modal name="test" maxWidth="md">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div class="p-4 md:p-5 text-center">
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">
                        menampilkan dispatch id <span x-text="id"></span></h3>
                </div>
            </div>
        </x-modal>
    </div>

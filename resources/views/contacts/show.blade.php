<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('pages.headers.show') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                <div class="max-w-xl mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('form.name')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="($contact->name)" required autofocus autocomplete="name" disabled="true"/>
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('form.email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="($contact->email)" required autofocus autocomplete="email" disabled="true"/>
                        </div>

                        <div>
                            <x-input-label for="contact" :value="__('form.contact')" />
                            <x-text-input id="contact" name="contact" type="text" class="mt-1 block w-full" :value="($contact->contact)" required autofocus autocomplete="contact" disabled="true"/>
                        </div>

                        <div class="flex items-center gap-4">
                            <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 bg-gray-500 dark:bg-gray-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-gray-600 dark:hover:bg-gray-500 focus:bg-gray-600 dark:focus:bg-gray-500 active:bg-gray-700 dark:active:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('buttons.back') }}
                            </a>
                            <a href="{{ route('contacts.edit', ['contact' => $contact->id]) }}" class="inline-flex items-center px-4 py-2 bg-blue-500 dark:bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-blue-600 dark:hover:bg-blue-500 focus:bg-blue-600 dark:focus:bg-blue-500 active:bg-blue-700 dark:active:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-blue-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('buttons.edit') }}
                            </a>
                            <a href="{{ route('contacts.delete', ['contact' => $contact->id]) }}" class="inline-flex items-center px-4 py-2 bg-red-500 dark:bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-200 uppercase tracking-widest hover:bg-red-600 dark:hover:bg-red-500 focus:bg-red-600 dark:focus:bg-red-500 active:bg-red-700 dark:active:bg-red-400 focus:outline-none focus:ring-2 focus:ring-red-400 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">
                                {{ __('buttons.delete') }}
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

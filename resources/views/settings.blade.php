<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/2 mx-auto">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="pb-4 text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Transaction types') }}</h3>
                        <a href="{{ route('transaction-types.create') }}" class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 flex items-center justify-center w-10 h-10 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-300 uppercase tracking-wider border border-gray-700">Name</th>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-300 uppercase tracking-wider border border-gray-700">Description</th>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-300 uppercase tracking-wider border border-gray-700">Type</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($transactionTypes as $type)
                                <tr class="bg-white dark:bg-gray-900 hover:bg-gray-600 cursor-pointer" onclick="window.location='{{ route('transaction-types.edit', $type->id) }}'">
                                    <td class="px-6 py-1 whitespace-nowrap border border-gray-700">{{ $type->name }}</td>
                                    <td class="px-6 py-1 whitespace-nowrap border border-gray-700">{{ $type->description }}</td>
                                    <td class="px-6 py-1 whitespace-nowrap border border-gray-700">{{ ucfirst($type->type) }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg w-1/2 mx-auto mt-8">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="pb-4 text-lg font-medium text-gray-900 dark:text-gray-100">{{ __('Accounts') }}</h3>
                        <a href="{{ route('accounts.create') }}" class="bg-blue-500 text-white p-2 rounded-full hover:bg-blue-600 flex items-center justify-center w-10 h-10 mb-4">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                            </svg>
                        </a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 w-full">
                            <thead>
                                <tr>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-300 uppercase tracking-wider border border-gray-700">Name</th>
                                    <th class="px-6 py-2 text-left text-xs font-medium text-gray-300 uppercase tracking-wider border border-gray-700">Description</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($accounts as $account)
                                <tr class="bg-white dark:bg-gray-900 hover:bg-gray-600 cursor-pointer" onclick="window.location='{{ route('accounts.edit', $account->id) }}'">
                                    <td class="px-6 py-1 whitespace-nowrap border border-gray-700">{{ $account->name }}</td>
                                    <td class="px-6 py-1 whitespace-nowrap border border-gray-700">{{ $account->description }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="flex justify-end mb-4">
            <a href="{{ route('transactions.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-2">Add Transaction</a>
            <a href="{{ route('accounts.create') }}" class="bg-green-500 text-white px-4 py-2 rounded mr-2">Add Account</a>
            <a href="{{ route('transaction-types.create') }}" class="bg-purple-500 text-white px-4 py-2 rounded">Add Transaction Type</a>
        </div>
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 w-full">
                        <thead>
                            <tr>
                                <th class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200" onclick="sortTable(0)">ID</th>
                                <th class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200" onclick="sortTable(1)">User</th>
                                <th class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200" onclick="sortTable(2)">Account</th>
                                <th class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200" onclick="sortTable(3)">Type</th>
                                <th class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200" onclick="sortTable(4)">Description</th>
                                <th class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200" onclick="sortTable(5)">Amount</th>
                                <th class="cursor-pointer px-6 py-4 text-left text-xs font-medium text-gray-500 uppercase tracking-wider border border-gray-200" onclick="sortTable(6)">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($transactions as $transaction)
                            <tr>
                                <td class="px-6 py-1 whitespace-nowrap border border-gray-200">{{ $transaction->id }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border border-gray-200">{{ $transaction->user->name }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border border-gray-200">{{ $transaction->account->name }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border border-gray-200">{{ $transaction->transactionType->name }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border border-gray-200">{{ $transaction->description }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border border-gray-200">{{ $transaction->amount }}</td>
                                <td class="px-6 py-1 whitespace-nowrap border border-gray-200">
                                    <!-- Actions buttons here -->
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function sortTable(n) {
            // Sorting logic here
        }

        function confirmDelete() {
            if (confirm('Are you sure you want to delete this transaction?')) {
                // Delete logic here
            }
        }
    </script>

</x-app-layout>
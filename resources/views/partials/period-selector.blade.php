<div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4 flex-grow">
    <div class="p-6 text-gray-900 dark:text-gray-100 flex flex-col justify-between h-full">
        <h3 class="pb-4 text-lg font-medium text-gray-900 dark:text-gray-100">Select Period</h3>
        <form method="GET" action="{{ route('dashboard') }}">
            <div class="flex flex-col space-y-4">
                <div class="flex items-center">
                    <label for="start_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Start Date</label>
                    <input type="date" id="start_date" name="start_date" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ request('start_date', now()->startOfMonth()->toDateString()) }}" max="{{ now()->toDateString() }}" onchange="validateDates()">
                    <button type="button" onclick="adjustDate('start_date', -1)" class="ml-2 px-2 py-1 bg-gray-500 text-white rounded">M-</button>
                    <button type="button" onclick="adjustDate('start_date', 1)" class="ml-2 px-2 py-1 bg-gray-500 text-white rounded">M+</button>
                </div>
                <div class="flex items-center">
                    <label for="end_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">End Date</label>
                    <input type="date" id="end_date" name="end_date" class="mt-1 block w-full dark:bg-gray-900 dark:text-gray-300" value="{{ request('end_date', now()->toDateString()) }}" max="{{ now()->toDateString() }}" onchange="validateDates()">
                    <button type="button" onclick="adjustDate('end_date', -1)" class="ml-2 px-2 py-1 bg-gray-500 text-white rounded">M-</button>
                    <button type="button" onclick="adjustDate('end_date', 1)" class="ml-2 px-2 py-1 bg-gray-500 text-white rounded">M+</button>
                </div>
                <div class="flex items-end">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 active:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150">Filter</button>
                </div>
            </div>
        </form>
        <div class="mt-4">
            <h4 class="text-lg font-medium text-gray-900 dark:text-gray-100">Selected Period: {{ number_format($periodBalance, 2) }} &euro;</h4>
        </div>
    </div>
</div>
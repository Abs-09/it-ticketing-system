<x-app-layout>
    <h1 class="text-4xl dark:text-white">Ticket Activity</h1>

    @if (session('error'))
        <x-error-message>{{ session('error') }}</x-error-message>
    @elseif (session('success'))
        <x-success-message>{{ session('success') }}</x-success-message>
    @endif

    <!-- Table Section -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto">
        <!-- Card -->
        <div class="flex flex-col">
            <div class="-m-1.5 overflow-x-auto">
                <div class="p-1.5 min-w-full inline-block align-middle">
                    <div
                        class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
                        <!-- Header -->
                        <form action="" class="flex flex-col">
                            <div
                                class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                                <!-- Input -->
                                <div class="sm:col-span-1">
                                    <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <input type="text" id="hs-as-table-product-review-search" name="ticket_id"
                                            value="{{ request('ticket_id') }}"
                                            class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            placeholder="Ticket Number">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                            <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->
                                <!-- Input -->
                                <div class="sm:col-span-1">
                                    <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <input type="text" id="hs-as-table-product-review-search" name="date"
                                            value="{{ request('date') }}"
                                            class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            placeholder="date">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                            <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->
                                <!-- Input -->
                                <div class="sm:col-span-1">
                                    <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                    <div class="relative">
                                        <input type="text" id="hs-as-table-product-review-search" name="changed_by"
                                            value="{{ request('changed_by') }}"
                                            class="py-2 px-3 ps-11 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                            placeholder="Person">
                                        <div
                                            class="absolute inset-y-0 start-0 flex items-center pointer-events-none ps-4">
                                            <svg class="size-4 text-gray-400 dark:text-neutral-500"
                                                xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16">
                                                <path
                                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Input -->

                                <div class="sm:col-span-2 md:grow">
                                    <div class="flex justify-end gap-x-2">
                                        <div class="hs-dropdown [--placement:bottom-right] relative inline-block">

                                        </div>


                                    </div>
                                </div>
                        </form>
                    </div>
                    <!-- End Header -->

                    <!-- Table -->
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                        <thead class="bg-gray-50 dark:bg-neutral-800">
                            <tr>
                                <th scope="col" class="ps-6 py-3 text-start">
                                    <label for="hs-at-with-checkboxes-main" class="flex">
                                        <input type="checkbox"
                                            class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                            id="hs-at-with-checkboxes-main">
                                        <span class="sr-only">Checkbox</span>
                                    </label>
                                </th>

                                <th scope="col" class="pe-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Ticket Number
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Activity Date
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Person
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            Old State
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-start">
                                    <div class="flex items-center gap-x-2">
                                        <span
                                            class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                            New State
                                        </span>
                                    </div>
                                </th>

                                <th scope="col" class="px-6 py-3 text-end"></th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                            @foreach ($histories as $history)
                                <tr>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="ps-6 py-2">
                                            <label for="hs-at-with-checkboxes-1" class="flex">
                                                <input type="checkbox"
                                                    class="shrink-0 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                                    id="hs-at-with-checkboxes-1">
                                                <span class="sr-only">Checkbox</span>
                                            </label>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="pe-6 py-2">
                                            <a class="text-sm text-blue-600 decoration-2 hover:underline dark:text-blue-500"
                                                href="#">{{ $history->ticket_id }}</a>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span
                                                class="text-sm text-gray-600 dark:text-neutral-400">{{ $history->changed_date }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <div class="px-6 py-2">
                                            <span
                                                class="text-sm text-gray-600 dark:text-neutral-400">{{ $history->changedby?->name }}</span>
                                        </div>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <button type="button" class="block" aria-haspopup="dialog"
                                            aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                            data-hs-overlay="#hs-ai-invoice-modal">
                                            <span class="block px-6 py-2">
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium  rounded-full dark:bg-teal-500/10 @if ($history->old_value == 'open') bg-blue-600 text-white dark:bg-blue-500 @elseif($history->old_value == 'in_progress') bg-yellow-500 text-white @elseif($history->old_value == 'resolved') bg-teal-500 text-white @else bg-red-500 text-white @endif">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    {{ $history->old_value }}
                                                </span>
                                            </span>
                                        </button>
                                    </td>
                                    <td class="size-px whitespace-nowrap">
                                        <button type="button" class="block" aria-haspopup="dialog"
                                            aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                            data-hs-overlay="#hs-ai-invoice-modal">
                                            <span class="block px-6 py-2">
                                                <span
                                                    class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium  rounded-full dark:bg-teal-500/10 @if ($history->new_value == 'open') bg-blue-600 text-white dark:bg-blue-500 @elseif($history->new_value == 'in_progress') bg-yellow-500 text-white @elseif($history->new_value == 'resolved') bg-teal-500 text-white @else bg-red-500 text-white @endif">
                                                    <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                        width="16" height="16" fill="currentColor"
                                                        viewBox="0 0 16 16">
                                                        <path
                                                            d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                    </svg>
                                                    {{ $history->new_value }}
                                                </span>
                                            </span>
                                        </button>
                                    </td>
                                    <td class="size-px whitespace-nowrap">

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- End Table -->

                    <!-- Footer -->
                    <div
                        class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">


                        <div>
                            <div class="inline-flex gap-x-2">
                                {{ $histories->links() }}
                            </div>
                        </div>
                    </div>
                    <!-- End Footer -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Card -->
    </div>
    <!-- End Table Section -->
</x-app-layout>

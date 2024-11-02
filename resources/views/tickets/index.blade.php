<x-app-layout>
    <h1 class="text-4xl dark:text-white">Tickets</h1>

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
                        <div
                            class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
                            <div>
                                <form action="" class="flex gap-x-3">
                                    <div class="sm:col-span-1">
                                        <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <select type="search" name="priority"
                                                class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                <option value="" {{ request('priority') === null ? 'selected' : '' }}>Select Priority</option>
                                                <option value="low" {{ request('priority') == 'low' ? 'selected' : '' }}>Low</option>
                                                <option value="medium" {{ request('priority') == 'medium' ? 'selected' : '' }}>Medium</option>
                                                <option value="high" {{ request('priority') == 'high' ? 'selected' : '' }}>High</option>>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <select type="search" name="status"
                                                class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                <option value="" {{ request('status') === null ? 'selected' : '' }}>Select Status</option>
                                                <option value="open" {{ request('status') == 'open' ? 'selected' : '' }}>Open</option>
                                                <option value="in_progress" {{ request('status') == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="resolved" {{ request('status') == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                                <option value="closed" {{ request('status') == 'closed' ? 'selected' : '' }}>Closed</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="max-w-sm space-y-3">
                                                <input type="search" name="created_by" value="{{request('created_by')}}"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    placeholder="Created by">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="sm:col-span-1">
                                        <label for="hs-as-table-product-review-search" class="sr-only">Search</label>
                                        <div class="relative">
                                            <div class="max-w-sm space-y-3">
                                                <input type="search" name="assigned_to" value="{{request('assigned_to')}}"
                                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                    placeholder="Assigned to">
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button
                                            class="flex items-center rounded-r bg-primary px-6 py-2.5 text-xs font-medium uppercase leading-tight text-white shadow-md transition duration-150 ease-in-out hover:bg-blue-700 hover:shadow-lg focus:bg-blue-800 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-primary-800 active:shadow-lg"
                                            type="submit" id="button-addon1" data-te-ripple-init
                                            data-te-ripple-color="light">
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="blue"
                                                class="h-5 w-5">
                                                <path fill-rule="evenodd"
                                                    d="M9 3.5a5.5 5.5 0 100 11 5.5 5.5 0 000-11zM2 9a7 7 0 1112.452 4.391l3.328 3.329a.75.75 0 11-1.06 1.06l-3.329-3.328A7 7 0 012 9z"
                                                    clip-rule="evenodd" />
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                                        href="{{ route('tickets.create') }}">
                                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M5 12h14" />
                                            <path d="M12 5v14" />
                                        </svg>
                                        Create
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- End Header -->

                        <!-- Collapse -->
                        <div
                            class="border-b border-gray-200 hover:bg-gray-50 dark:hover:bg-neutral-900 dark:border-neutral-700">
                            <div id="hs-as-table-label"
                                class="hs-collapse hidden w-full overflow-hidden transition-[height] duration-300"
                                aria-labelledby="hs-as-table">
                                <div class="pb-4 px-6">
                                    <div class="flex items-center space-x-2">
                                        <span
                                            class="size-5 flex justify-center items-center rounded-full bg-blue-600 text-white dark:bg-blue-500">
                                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <polyline points="20 6 9 17 4 12" />
                                            </svg>
                                        </span>
                                        <span class="text-sm text-gray-800 dark:text-neutral-400">
                                            There are no insights for this period.
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End Collapse -->

                        <!-- Table -->
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                            <thead class="bg-gray-50 dark:bg-neutral-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Ticket number
                                            </span>
                                            <div class="hs-tooltip">
                                                <div class="hs-tooltip-toggle">
                                                    <svg class="shrink-0 size-4 text-gray-500 dark:text-neutral-500"
                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                        stroke-linejoin="round">
                                                        <circle cx="12" cy="12" r="10" />
                                                        <path d="M9.09 9a3 3 0 0 1 5.83 1c0 2-3 3-3 3" />
                                                        <path d="M12 17h.01" />
                                                    </svg>
                                                    <span
                                                        class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700"
                                                        role="tooltip">
                                                        Ticket Title
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Title
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Priority
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Status
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Created By
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-start">
                                        <div class="flex items-center gap-x-2">
                                            <span
                                                class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                Assigned To
                                            </span>
                                        </div>
                                    </th>

                                    <th scope="col" class="px-6 py-3 text-end"></th>
                                </tr>
                            </thead>

                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                @foreach ($tickets as $ticket)
                                    <tr
                                        class="bg-white hover:bg-gray-50 dark:bg-neutral-900 dark:hover:bg-neutral-800">
                                        <td class="size-px whitespace-nowrap">
                                            <button type="button" class="block" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="font-mono text-sm text-blue-600 dark:text-blue-500">#{{ $ticket->id }}</span>
                                                </span>
                                            </button>
                                        </td>

                                        <td class="size-px whitespace-nowrap">
                                            <button type="button" class="block" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-neutral-400">{{ $ticket->title }}</span>
                                                </span>
                                            </button>
                                        </td>

                                        <td class="size-px whitespace-nowrap">
                                            <button type="button" class="block" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="text-sm @if ($ticket->priority == 'high') border-red-500 text-red-500 @elseif($ticket->priority == 'medium')  border-gray-500 text-gray-500 dark:text-neutral-400 @else border-teal-500 text-teal-500 @endif">{{ $ticket->priority }}</span>
                                                </span>
                                            </button>
                                        </td>

                                        <td class="size-px whitespace-nowrap">
                                            <button type="button" class="block" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="py-1 px-1.5 inline-flex items-center gap-x-1 text-xs font-medium  rounded-full dark:bg-teal-500/10 @if ($ticket->status == 'open') bg-blue-600 text-white dark:bg-blue-500 @elseif($ticket->status == 'in_progress') bg-yellow-500 text-white @elseif($ticket->status == 'resolved') bg-teal-500 text-white @else bg-red-500 text-white @endif">
                                                        <svg class="size-2.5" xmlns="http://www.w3.org/2000/svg"
                                                            width="16" height="16" fill="currentColor"
                                                            viewBox="0 0 16 16">
                                                            <path
                                                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                                                        </svg>
                                                        {{ $ticket->status }}
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
                                                        class="text-sm text-gray-600 dark:text-neutral-400">{{ $ticket->createdby?->name }}</span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <button type="button" class="block" aria-haspopup="dialog"
                                                aria-expanded="false" aria-controls="hs-ai-invoice-modal"
                                                data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="block px-6 py-2">
                                                    <span
                                                        class="text-sm text-gray-600 dark:text-neutral-400">{{ $ticket->assignedto?->name ?? 'Unassigned' }}</span>
                                                </span>
                                            </button>
                                        </td>
                                        <td class="size-px whitespace-nowrap">
                                            <a href="{{ route('tickets.show', $ticket) }}" class="block"
                                                aria-haspopup="dialog" aria-expanded="false"
                                                aria-controls="hs-ai-invoice-modal"
                                                data-hs-overlay="#hs-ai-invoice-modal">
                                                <span class="px-6 py-1.5">
                                                    <span
                                                        class="py-1 px-2 inline-flex justify-center items-center gap-2 rounded-lg border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-neutral-900 dark:hover:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
                                                        <svg class="shrink-0 size-4"
                                                            xmlns="http://www.w3.org/2000/svg" width="16"
                                                            height="16" fill="currentColor" viewBox="0 0 16 16">
                                                            <path
                                                                d="M1.92.506a.5.5 0 0 1 .434.14L3 1.293l.646-.647a.5.5 0 0 1 .708 0L5 1.293l.646-.647a.5.5 0 0 1 .708 0L7 1.293l.646-.647a.5.5 0 0 1 .708 0L9 1.293l.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .801.13l.5 1A.5.5 0 0 1 15 2v12a.5.5 0 0 1-.053.224l-.5 1a.5.5 0 0 1-.8.13L13 14.707l-.646.647a.5.5 0 0 1-.708 0L11 14.707l-.646.647a.5.5 0 0 1-.708 0L9 14.707l-.646.647a.5.5 0 0 1-.708 0L7 14.707l-.646.647a.5.5 0 0 1-.708 0L5 14.707l-.646.647a.5.5 0 0 1-.708 0L3 14.707l-.646.647a.5.5 0 0 1-.801-.13l-.5-1A.5.5 0 0 1 1 14V2a.5.5 0 0 1 .053-.224l.5-1a.5.5 0 0 1 .367-.27zm.217 1.338L2 2.118v11.764l.137.274.51-.51a.5.5 0 0 1 .707 0l.646.647.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.646.646.646-.646a.5.5 0 0 1 .708 0l.509.509.137-.274V2.118l-.137-.274-.51.51a.5.5 0 0 1-.707 0L12 1.707l-.646.647a.5.5 0 0 1-.708 0L10 1.707l-.646.647a.5.5 0 0 1-.708 0L8 1.707l-.646.647a.5.5 0 0 1-.708 0L6 1.707l-.646.647a.5.5 0 0 1-.708 0L4 1.707l-.646.647a.5.5 0 0 1-.708 0l-.509-.51z" />
                                                            <path
                                                                d="M3 4.5a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 1 1 0 1h-6a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h6a.5.5 0 0 1 0 1h-6a.5.5 0 0 1-.5-.5zm8-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5zm0 2a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 0 1h-1a.5.5 0 0 1-.5-.5z" />
                                                        </svg>
                                                        View
                                                    </span>
                                                </span>
                                            </a>
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
                                <p class="text-sm text-gray-600 dark:text-neutral-400">
                                    <span class="font-semibold text-gray-800 dark:text-neutral-200"></span>
                                </p>
                            </div>

                            <div>
                                <div class="inline-flex gap-x-2">
                                    <div>{{ $tickets->links() }}</div>
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

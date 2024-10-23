<x-app-layout>
    {{-- Bread crumb --}}
    <ol class="flex items-center whitespace-nowrap p-2 border-y border-gray-200 dark:border-neutral-700">
        <li class="inline-flex items-center">
            <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600 dark:text-neutral-500 dark:hover:text-blue-500 dark:focus:text-blue-500"
                href="{{ route('tickets.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="size-4">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                </svg>
                Tickets
            </a>
            <svg class="shrink-0 mx-2 size-4 text-gray-400 dark:text-neutral-600" xmlns="http://www.w3.org/2000/svg"
                width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                stroke-linecap="round" stroke-linejoin="round">
                <path d="m9 18 6-6-6-6"></path>
            </svg>
        </li>
        <li class="inline-flex items-center text-sm font-semibold text-gray-800 truncate dark:text-neutral-200"
            aria-current="page">
            {{ $ticket->id }}
        </li>
    </ol>

    @if (session('error'))
        <x-error-message>{{ session('error') }}</x-error-message>
    @elseif (session('success'))
        <x-success-message>{{ session('success') }}</x-success-message>
    @endif

    <!-- Invoice -->
    <div class="max-w-[85rem] px-4 sm:px-6 lg:px-8 mx-auto my-4 sm:my-10">
        <!-- Grid -->
        <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-neutral-700">
            <div class="flex gap-x-2">
                <h2 class="text-2xl font-semibold text-gray-800 dark:text-neutral-200">Ticket Number
                    #{{ $ticket->id }}</h2>
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium border @if ($ticket->priority == 'high') border-red-500 text-red-500 @elseif($ticket->priority == 'medium')  border-gray-500 text-gray-500 dark:text-neutral-400 @else border-teal-500 text-teal-500 @endif">{{ $ticket->priority }}</span>
                <span
                    class="inline-flex items-center gap-x-1.5 py-1.5 px-3 rounded-full text-xs font-medium @if ($ticket->status == 'open') bg-blue-600 text-white dark:bg-blue-500 @elseif($ticket->status == 'in_progress') bg-yellow-500 text-white @elseif($ticket->status == 'resolved') bg-teal-500 text-white @else bg-red-500 text-white @endif">{{ $ticket->status }}</span>
            </div>
            <!-- Col -->

            <div class="inline-flex gap-x-2">
                @if ($ticket->status == 'open')
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        href="{{ route('tickets.assign', ['ticket' => $ticket, 'user_id' => auth()->user()->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        Take this Ticket
                    </a>
                @elseif($ticket->status == 'in_progress' && $ticket->assigned_to == auth()->user()->id)
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-red-400 text-white shadow-sm hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        href="{{ route('tickets.close', ['ticket' => $ticket, 'user_id' => auth()->user()->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Close
                    </a>
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-none focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none"
                        href="{{ route('tickets.resolve', ['ticket' => $ticket, 'user_id' => auth()->user()->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        Resolve
                    </a>
                @endif

            </div>
            <!-- Col -->
        </div>
        <!-- End Grid -->

        <!-- Grid -->
        <div class="grid md:grid-cols-2 gap-3">
            <div>
                <div class="grid space-y-3">
                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Title:
                        </dt>
                        <dd class="text-gray-800 dark:text-neutral-200">
                            <div
                                class="inline-flex items-center gap-x-1.5 text-blue-600 decoration-2 focus:outline-none font-medium dark:text-blue-500">
                                {{ $ticket->title }}
                            </div>
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Details:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            <address class="not-italic font-normal">
                                {{ $ticket->description }}
                            </address>
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Type:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            <span class="block font-semibold">{{ $ticket->category?->name }}</span>
                        </dd>
                    </dl>
                </div>
            </div>
            <!-- Col -->

            <div>
                <div class="grid space-y-3">
                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Requested by:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            {{ $ticket->createdby?->name }}
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Assigned to:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            {{ $ticket->assignedto?->name ?? 'Unassigned' }}
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Created Date:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            {{ $ticket->created_at }}
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Assigned Date:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            {{ $ticket->assigned_at }}
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Resolved At:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            {{ $ticket->resolved_at }}
                        </dd>
                    </dl>

                    <dl class="flex flex-col sm:flex-row gap-x-3 text-sm">
                        <dt class="min-w-36 max-w-[200px] text-gray-500 dark:text-neutral-500">
                            Closed At:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            {{ $ticket->closed_at }}
                        </dd>
                    </dl>
                </div>
            </div>
            <!-- Col -->
        </div>
        <!-- End Grid -->

        @if ($ticket->status == 'in_progress' || $ticket->status == 'open')
            @if (auth()->user()->role == 'tech_staff' || auth()->user()->role == 'admin' || auth()->user()->id == $ticket->user_id)
                <!-- Input -->
                <form class="relative mt-14">
                    <textarea
                        class="p-4 pb-12 block w-full bg-gray-100 border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-800 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                        placeholder="Write a comment for this ticket ..."></textarea>

                    <!-- Toolbar -->
                    <div class="absolute bottom-px inset-x-px p-2 rounded-b-lg bg-gray-100 dark:bg-neutral-800">
                        <div class="flex justify-between items-center">
                            <!-- Button Group -->
                            <div class="flex items-center">

                            </div>
                            <!-- End Button Group -->

                            <!-- Button Group -->
                            <div class="flex items-center gap-x-1">

                                <!-- Send Button -->
                                <button type="button"
                                    class="inline-flex shrink-0 justify-center items-center size-8 rounded-lg text-white bg-blue-600 hover:bg-blue-500 focus:z-10 focus:outline-none focus:bg-blue-500">
                                    <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="16"
                                        height="16" fill="currentColor" viewBox="0 0 16 16">
                                        <path
                                            d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                                    </svg>
                                </button>
                                <!-- End Send Button -->
                            </div>
                            <!-- End Button Group -->
                        </div>
                    </div>
                    <!-- End Toolbar -->
                </form>
                <!-- End Input -->
            @endif
        @endif

        <!-- Table -->
        <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-neutral-700">
            <h3 class="text-xl font-semibold text-gray-060 dark:text-neutral-300">Comments</h3>
            <div class="hidden sm:grid sm:grid-cols-4">
                <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                    Comment
                </div>
                <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">User
                </div>
                <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Time
                </div>
            </div>

            <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

            @foreach ($comments as $comment)
                <div class="grid grid-cols-4 gap-2">
                    <div class="col-span-full sm:col-span-2">
                        <p class="font-medium text-gray-800 dark:text-neutral-200">{{ $comment->comment }}</p>
                    </div>
                    <div>
                        <p class="text-gray-800 dark:text-neutral-200">{{ $comment->user?->name }}</p>
                    </div>
                    <div>
                        <p class="text-gray-800 dark:text-neutral-200">
                            {{ Carbon\Carbon::parse($comment->updated_at)->format('d M Y - H:i:s') }}</p>
                    </div>
                </div>

                <div class="sm:hidden border-b border-gray-200 dark:border-neutral-700"></div>
            @endforeach


        </div>
        <!-- End Table -->

    </div>
    <!-- End Invoice -->
</x-app-layout>

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
                        href="{{route('tickets.assign', ['ticket'=>$ticket, 'user_id' => auth()->user()->id])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.5 6v.75m0 3v.75m0 3v.75m0 3V18m-9-5.25h5.25M7.5 15h3M3.375 5.25c-.621 0-1.125.504-1.125 1.125v3.026a2.999 2.999 0 0 1 0 5.198v3.026c0 .621.504 1.125 1.125 1.125h17.25c.621 0 1.125-.504 1.125-1.125v-3.026a2.999 2.999 0 0 1 0-5.198V6.375c0-.621-.504-1.125-1.125-1.125H3.375Z" />
                        </svg>
                        Take this Ticket
                    </a>
                @elseif($ticket->status == 'in_progress')
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                            <polyline points="7 10 12 15 17 10" />
                            <line x1="12" x2="12" y1="15" y2="3" />
                        </svg>
                        Invoice PDF
                    </a>
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none"
                        href="#">
                        <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="6 9 6 2 18 2 18 9" />
                            <path d="M6 18H4a2 2 0 0 1-2-2v-5a2 2 0 0 1 2-2h16a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2h-2" />
                            <rect width="12" height="8" x="6" y="14" />
                        </svg>
                        Print
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
                            Completed At:
                        </dt>
                        <dd class="font-medium text-gray-800 dark:text-neutral-200">
                            {{ $ticket->completed_at }}
                        </dd>
                    </dl>
                </div>
            </div>
            <!-- Col -->
        </div>
        <!-- End Grid -->

        <!-- Table -->
        <div class="mt-6 border border-gray-200 p-4 rounded-lg space-y-4 dark:border-neutral-700">
            <h3 class="text-xl font-semibold text-gray-060 dark:text-neutral-300">Comments</h3>
            <div class="hidden sm:grid sm:grid-cols-4">
                <div class="sm:col-span-2 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Comment
                </div>
                <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">User</div>
                <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Time</div>
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

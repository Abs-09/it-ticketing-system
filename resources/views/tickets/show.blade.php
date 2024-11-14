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
                @if ($ticket->status == 'open' && auth()->user()->role == 'tech_staff')
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
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-teal-600 text-white hover:bg-teal-700 focus:outline-none focus:bg-teal-700 disabled:opacity-50 disabled:pointer-events-none"
                        href="{{ route('tickets.resolve', ['ticket' => $ticket, 'user_id' => auth()->user()->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>

                        Resolve
                    </a>
                @elseif($ticket->status == 'resolved' && $ticket->user_id == auth()->user()->id)
                    <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-red-400 text-white shadow-sm hover:bg-red-600 disabled:opacity-50 disabled:pointer-events-none focus:outline-none focus:bg-gray-50 dark:bg-transparent dark:border-neutral-700 dark:text-neutral-300 dark:hover:bg-neutral-800 dark:focus:bg-neutral-800"
                        href="{{ route('tickets.close', ['ticket' => $ticket, 'user_id' => auth()->user()->id]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        </svg>
                        Close
                    </a>
                @endif
                @if ($ticket->status == 'closed' && auth()->user()->role == 'admin')
                    <button type="button"
                        class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700">
                        Export
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="shrink-0 size-4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m-6 3.75 3 3m0 0 3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                        </svg>
                    </button>
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

        {{-- File --}}
        <div>
            <h3 class="text-2xl dark:text-white">Attached Files</h3>
            @if ($ticket->status == 'open' || $ticket->status == 'in_progress')
                @if (auth()->user()->role == 'tech_staff' || auth()->user()->role == 'admin' || auth()->user()->id === $ticket->user_id)
                    <div class="pt-4">
                        <form action="{{ route('attachments.store', $ticket) }}" method="POST"
                            enctype= 'multipart/form-data' class="flex gap-x-2">
                            @csrf
                            <div>
                                <label for="file" class="sr-only">Attach File</label>
                                <input type="file" name="file" id="file"
                                    class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                        file:bg-gray-50 file:border-0
                        file:me-4
                        file:py-3 file:px-4
                        dark:file:bg-neutral-700 dark:file:text-neutral-400">
                            </div>
                            <div class="">
                                <input type="text" name="file_name" required
                                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                    placeholder="File name">
                            </div>
                            <button type="submit"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 text-gray-500 hover:border-blue-600 hover:text-blue-600 focus:outline-none focus:border-blue-600 focus:text-blue-600 disabled:opacity-50 disabled:pointer-events-none dark:border-neutral-700 dark:text-neutral-400 dark:hover:text-blue-500 dark:hover:border-blue-600 dark:focus:text-blue-500 dark:focus:border-blue-600">
                                Upload File
                            </button>
                        </form>
                @endif
            @endif
        </div>
        <!-- Card Section -->
        <div class="max-w-[85rem] py-6 lg:py-8 mx-auto">
            @if ($attachments->isEmpty())
                <button type="button"
                    class="relative block w-full rounded-lg border-2 border-dashed border-gray-300 p-12 text-center hover:border-gray-400 ">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="mx-auto h-12 w-12 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                    </svg>

                    <span class="mt-2 block text-sm font-semibold text-gray-900">No Files Attached for this
                        Ticket</span>
                </button>
            @else
                <!-- Grid -->
                <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
                    @foreach ($attachments as $attachment)
                        <!-- Card -->
                        <a class="group flex flex-col bg-white border shadow-sm rounded-xl hover:shadow-md focus:outline-none focus:shadow-md transition dark:bg-neutral-900 dark:border-neutral-800"
                            href="{{ route('attachments.download', $attachment) }}">
                            <div class="p-4 md:p-5">
                                <div class="flex justify-between items-center gap-x-3">
                                    <div class="grow">
                                        <div class="flex items-center gap-x-3">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                class="size-6 text-gray-700 hover:text-black">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m18.375 12.739-7.693 7.693a4.5 4.5 0 0 1-6.364-6.364l10.94-10.94A3 3 0 1 1 19.5 7.372L8.552 18.32m.009-.01-.01.01m5.699-9.941-7.81 7.81a1.5 1.5 0 0 0 2.112 2.13" />
                                            </svg>

                                            <div class="grow">
                                                <h3
                                                    class="group-hover:text-blue-600 font-semibold text-gray-800 dark:group-hover:text-neutral-400 dark:text-neutral-200">
                                                    {{ $attachment->file_name }}
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor"
                                            class="shrink-0 size-5 text-gray-800 dark:text-neutral-200">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M7.5 7.5h-.75A2.25 2.25 0 0 0 4.5 9.75v7.5a2.25 2.25 0 0 0 2.25 2.25h7.5a2.25 2.25 0 0 0 2.25-2.25v-7.5a2.25 2.25 0 0 0-2.25-2.25h-.75m-6 3.75 3 3m0 0 3-3m-3 3V1.5m6 9h.75a2.25 2.25 0 0 1 2.25 2.25v7.5a2.25 2.25 0 0 1-2.25 2.25h-7.5a2.25 2.25 0 0 1-2.25-2.25v-.75" />
                                        </svg>

                                    </div>
                                </div>
                            </div>
                        </a>
                        <!-- End Card -->
                    @endforeach
                </div>
                <!-- End Grid -->
            @endif
        </div>
        <!-- End Card Section -->
        <div class="mb-5 pb-5 flex justify-between items-center border-b border-gray-200 dark:border-neutral-700">
        </div>
        {{-- End file --}}

        @if ($ticket->status != 'closed')
            @if (auth()->user()->role == 'tech_staff' || auth()->user()->role == 'admin' || auth()->user()->id == $ticket->user_id)
                <!-- Input -->
                <form action="{{ route('comments.store') }}" method="POST" class="relative mt-14">
                    @csrf
                    <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <textarea name="comment" required
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
                                <button type="submit"
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
            <div class="hidden sm:grid sm:grid-cols-5">
                <div
                    class="col-span-full sm:col-span-2 text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">
                    Comment
                </div>
                <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">User
                </div>
                <div class="text-start text-xs font-medium text-gray-500 uppercase dark:text-neutral-500">Date Time
                </div>
                <div class="col-end text-center text-xs font-medium text-gray-500 uppercase dark:text-neutral-500 ">
                </div>
            </div>

            <div class="hidden sm:block border-b border-gray-200 dark:border-neutral-700"></div>

            @foreach ($comments as $comment)
                <div class="grid grid-cols-5 gap-4">
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
                    <div class="col-span-1 text-center mx-auto">
                        @if ($ticket->status == 'open' || $ticket->status == 'in_progress')
                            @if (auth()->user()->role == 'admin' || $comment->user_id == auth()->user()->id)
                                <form action="{{ route('comments.destroy', $comment) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dark:bg-white hover:text-red-600">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                                        </svg>
                                    </button>
                                </form>
                            @endif
                        @endif
                    </div>
                </div>

                <div class="sm:hidden border-b border-gray-200 dark:border-neutral-700"></div>
            @endforeach


        </div>
        <!-- End Table -->

    </div>
    <!-- End Invoice -->
</x-app-layout>

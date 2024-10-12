@props(['href', 'activeRoutes' => []])

@php
    $isActive = collect($activeRoutes)->some(fn($route) => request()->routeIs($route));
    $classes =
        $isActive ?? false
            ? 'flex items-center gap-x-3.5 py-2 px-2.5 bg-gray-100 text-sm text-blue-600 rounded-lg hover:bg-gray-100 dark:bg-neutral-700 dark:text-white'
            : 'flex items-center gap-x-3.5 py-2 px-2.5 text-sm text-gray-700 rounded-lg hover:bg-gray-100 dark:bg-neutral-800 dark:text-neutral-400 dark:hover:text-neutral-300';
@endphp

<li class="nav-item">
    <a {{ $attributes->merge(['class' => $classes]) }} href="{{ $href }}">
        {{ $slot }}
    </a>
</li>
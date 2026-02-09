@props([
    'name',
    'show' => false,
    'maxWidth' => '2xl'
])

@php
    $maxWidth = [
        'sm'  => 'max-w-sm',
        'md'  => 'max-w-md',
        'lg'  => 'max-w-lg',
        'xl'  => 'max-w-xl',
        '2xl' => 'max-w-2xl',
    ][$maxWidth];
@endphp

<div
    x-data="{ show: @js($show) }"
    x-on:open-modal.window="$event.detail === '{{ $name }}' ? show = true : null"
    x-on:close-modal.window="$event.detail === '{{ $name }}' ? show = false : null"
    x-on:keydown.escape.window="show = false"
    x-show="show"
    x-cloak
    class="fixed inset-0 z-[999] flex items-center justify-center px-6 sm:px-4"
>
    <!-- BACKDROP — спокойная ночь -->
    <div
        x-show="show"
        x-transition:enter="ease-out duration-700"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in duration-500"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        class="absolute inset-0
               bg-[#14132A]/50
               backdrop-blur-sm"
        x-on:click="show = false"
    ></div>

    <!-- MODAL -->
    <div
        x-show="show"
        x-transition:enter="ease-out duration-700"
        x-transition:enter-start="opacity-0 translate-y-12 scale-[0.96] blur-md"
        x-transition:enter-end="opacity-100 translate-y-0 scale-100 blur-0"
        x-transition:leave="ease-in duration-500"
        x-transition:leave-start="opacity-100 translate-y-0 scale-100 blur-0"
        x-transition:leave-end="opacity-0 translate-y-12 scale-[0.96] blur-md"
        class="
            relative w-full {{ $maxWidth }}
            rounded
            overflow-hidden
            text-black
            bg-white
            shadow-[0_20px_60px_rgba(0,0,0,0.45)]
        "
    >
        <!-- тонкая «заря» сверху -->
        <div
            class="absolute inset-x-0 top-0 h-px
                   bg-gradient-to-r from-transparent via-orange-500/40 to-transparent">
        </div>

        <!-- CONTENT -->
        <div class="relative p-4 lg:p-10 md:p-8 sm:p-6 font-sans">
            {{ $slot }}
        </div>
    </div>
</div>

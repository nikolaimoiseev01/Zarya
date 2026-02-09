<header
    x-data="{ open: false }"
    class="bg-orange-500 w-full py-2 z-40 fixed top-0 left-0
           opacity-0 transition-all duration-500
           -translate-y-3 pointer-events-none"
>
    <div class="content flex justify-between items-center">

        <!-- ЛЕВО: МЕНЮ (desktop) -->
        <nav class="flex gap-9 text-xl text-white md:hidden">
            <a href="#cases">Кейсы</a>
            <a href="#about">О нас</a>
            <a href="#services">Услуги</a>
        </nav>

        <!-- ЛОГО -->
        <x-logo class="w-20 md:w-16" color="white"/>

        <!-- CTA (desktop) -->
        <a
            href="/#contact-form"
            class="text-xl bg-gray-500 px-6 py-2 text-white rounded-3xl
                   transition hover:bg-orange-500 md:hidden"
        >
            Обсудить проект
        </a>

        <!-- БУРГЕР (mobile) -->
        <button
            @click="open = !open"
            class="hidden md:flex flex-col gap-1.5"
        >
            <span class="w-7 h-0.5 bg-white"></span>
            <span class="w-7 h-0.5 bg-white"></span>
            <span class="w-7 h-0.5 bg-white"></span>
        </button>
    </div>

    <!-- MOBILE MENU -->
    <div
        x-show="open"
        x-transition:enter="transition duration-300 ease-out"
        x-transition:enter-start="opacity-0 -translate-y-4"
        x-transition:enter-end="opacity-100 translate-y-0"
        x-transition:leave="transition duration-200 ease-in"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-4"
        class="md:block hidden bg-orange-500 px-6 pt-6 pb-8"
    >
        <nav class="flex flex-col gap-6 text-white text-2xl mb-6">
            <a href="" @click="open=false">Кейсы</a>
            <a href="" @click="open=false">О нас</a>
            <a href="" @click="open=false">Услуги</a>
        </nav>

        <a
            href="/#contact-form"
            @click="open=false"
            class="block text-center text-xl bg-gray-500 py-3
                   text-white rounded-full"
        >
            Обсудить проект
        </a>
    </div>
</header>

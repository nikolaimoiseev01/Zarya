<header class="bg-orange-500 w-full py-2 z-40 fixed opacity-0 transition top-0 left-0">
    <div class="content flex justify-between items-center">
        <div class="flex gap-9 text-xl text-white">
            <a href="">Кейсы</a>
            <a href="">О нас</a>
            <a href="">Услуги</a>
        </div>
        <x-logo class="w-20 sm:w-[90%]" color="white"/>
        <a href="" class="text-xl bg-gray-500 px-6 py-2 text-white rounded-3xl transition hover:bg-orange-500">Обсудить проект</a>
    </div>
</header>
<style>
    header {
        opacity: 0;
        transform: translateY(-12px);
        pointer-events: none;
        will-change: transform, opacity;
    }
</style>

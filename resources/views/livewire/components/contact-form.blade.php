<form
    wire:submit.prevent="send"
    id="contact-form"
    class="pt-28 -mt-28 flex flex-col flex-1"
    x-data="{ sent: @entangle('sent') }"
>
    <!-- ФОРМА -->
    <div
        x-show="!sent"
        x-transition:leave="transition-all duration-500 ease-in-out"
        x-transition:leave-start="opacity-100 translate-y-0"
        x-transition:leave-end="opacity-0 -translate-y-6"
        class="grid grid-cols-2 text-white gap-4 mb-8 md:flex md:flex-col"
    >
        <x-ui.text-input model="name" label="Имя"/>
        <x-ui.text-input model="company" label="Компания"/>
        <x-ui.text-input model="telephone" label="Телефон"/>
        <x-ui.text-input model="email" label="E-mail"/>
        <textarea wire:model="message" placeholder="Комментарий" class="col-span-2"></textarea>
    </div>


    <button
        type="submit"
        class="
        relative overflow-hidden
        uppercase text-3xl font-bold
        text-[#35305B]
        bg-white
        py-4 rounded-full
        transition-all duration-300 ease-out
        active:scale-[0.97]
        focus:outline-none
        cursor-pointer
        focus:ring-4 focus:ring-white/40
        mb-8
        group
    "
        :disabled="sent"
    >
        <span  x-show="!sent" class="relative z-10 cursor-pointer">Оставить заявку</span>

        <!-- SUCCESS -->
        <span
            x-show="sent"
            x-transition.scale
            class="relative z-10 flex items-center justify-center gap-3"
        >
            <span class="text-3xl transition">✓</span>
            <span class=" transition">Заявка отправлена</span>
        </span>
    </button>

    <!-- SUCCESS TEXT -->
    <div
        x-show="sent"
        x-transition:enter="transition-all duration-700 ease-out"
        x-transition:enter-start="opacity-0 translate-y-6"
        x-transition:enter-end="opacity-100 translate-y-0"
        class="text-center text-white text-xl"
    >
        Мы свяжемся с вами в ближайшее время
    </div>

    <!-- LINKS -->
    <div
        x-show="!sent"
        x-transition.opacity
        class="flex gap-8 text-white uppercase justify-between text-xl md:text-lg flex-wrap"
    >
        <a href="">Политика конфеденциальности</a>
        <a href="">оферта</a>
    </div>
</form>

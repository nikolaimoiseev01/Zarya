<form class="flex flex-col flex-1">
    <div class="grid grid-cols-2 text-white gap-4 mb-16">
        <x-ui.text-input model="name" label="Имя"/>
        <x-ui.text-input model="Компания" label="Компания"/>
        <x-ui.text-input model="Телефон" label="Телефон"/>
        <x-ui.text-input model="E-mail" label="E-mail"/>
        <textarea placeholder="Комментарий" class="col-span-2"></textarea>
    </div>

    <button type="submit"
            class="uppercase text-4xl text-black bg-white border-none py-8 rounded-full font-bold mb-8">
        Оставить заявку
    </button>
    <div class="flex gap-8 text-white uppercase justify-between text-2xl">
        <a href="">Политика конфеденциальности</a>
        <a href="">оферта</a>
    </div>
</form>

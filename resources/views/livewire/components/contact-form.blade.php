<form class="flex flex-col flex-1">
    <div class="grid grid-cols-2 text-white gap-4 mb-16">
        <div class="flex flex-col flex-1">
            <input required wire:model="name" id="name" type="text">
            <label for="name">Имя*</label>
        </div>
        <div class="flex flex-col flex-1">
            <input required wire:model="name" id="name" type="text">
            <label for="name">Компания*</label>
        </div>
        <div class="flex flex-col flex-1">
            <input required wire:model="name" id="name" type="text">
            <label for="name">Телефон*</label>
        </div>
        <div class="flex flex-col flex-1">
            <input required wire:model="name" id="name" type="text">
            <label for="name">E-mail*</label>
        </div>
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

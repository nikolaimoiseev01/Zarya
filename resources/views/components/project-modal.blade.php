<x-ui.modal name="confirm-delete">
    <div         x-data="{
        description: null
    }"
                 x-on:change-modal-description.window="
                    description = $event.detail.description
                "
             class="p-6">
        <h2 x-text="description"></h2>
        <p class="italic">Скоро у проекта появится отдельная страница</p>
    </div>
</x-ui.modal>

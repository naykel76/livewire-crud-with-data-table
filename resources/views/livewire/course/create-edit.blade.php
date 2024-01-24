<div>
    <form>
        <x-gt-input wire:model="form.name" for="form.name" label="name" req />
        <div class="grid cols-3 gap">
            <x-gt-input wire:model="form.code" for="form.code" label="code" req />
            <x-gt-input wire:model="form.price" for="form.price" label="price" />
            <x-gt-select wire:model="form.status" for="form.status" label="status" :options="\App\Models\Course::statuses()" />
        </div>
        <x-gt-ckeditor wire:model.lazy="form.description" for="form.description"
            label="Description" editor-id="{{ '_' . rand() }}" />
        <div class="tar">
            <x-gt-button-save wire:click.prevent="save" />
        </div>
    </form>
</div>

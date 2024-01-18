<div class="container-lg flex gap">

    <div class="w-12">
        <div class="bx pxy-1 flex-col space-y-025">
            <div class="bx-title mb-075">Courses</div>
            @foreach(App\Models\Course::all() as $course)
                <a href="#" wire:click.prevent="edit({{ $course->id }})">{{ $course->code }}</a>
            @endforeach
        </div>

        <x-gt-button wire:click.prevent="create" text="New"
        class="w-full primary"/>
    </div>

    <div class="container-sm">
        <form>
            <x-gt-input wire:model="form.name" for="form.name" label="name" req />
            <div class="grid cols-3 gap">
                <x-gt-input wire:model="form.code" for="form.code" label="code" req />
                <x-gt-input wire:model="form.price" for="form.price" label="price" />
                <x-gt-select wire:model="form.status" for="form.status" label="status" :options="$statuses" />
            </div>
            <x-gt-ckeditor wire:model.lazy="form.description" for="form.description"
                label="Description" editor-id="{{ '_' . rand() }}" />
            <div class="tar">
                <x-gt-button-save wire:click.prevent="save" />
            </div>
        </form>
    </div>

</div>

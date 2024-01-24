<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="flex markdown">


    <div class="w-sm">
        <div class="bx pxy-1">
            <div class="bx-title">Data Table</div>
            <p>A sortable, paginated data table using the <code>Sortable</code> Trait, Gotime's <code>MoneyCast::class</code>, and the <code>PublishedStatus::class</code> enum for status casting.</p>

            A form with validation using the Crudable trait and form object and Converts <code>PublishedStatus</code> enum to array of options for select input.

        </div>
        <div class="bx space-y-05">
            <div class="flex va-c">
                <x-gt-icon name="pencil-square" class="txt-sky wh-1.25 opacity-06" />
                <span class="ml-05">Manages actions through events</span>
            </div>
            <div class="flex va-c">
                <x-gt-icon name="pencil-square" class="txt-rose wh-1.25 opacity-06" />
                <span class="ml-05">Manages actions via routes</span>
            </div>
        </div>
        <div class="bx pxy-1">
            <div class="bx-title">Create/Edit Form</div>
            <p>The <code>CreateEdit</code> component uses a form object and the <code>Crudable</code> trait for validation. The model casts the <code>PublishedStatus</code> enum into an array, which can then be used as options for selectable controls.</p>
        </div>

        <x-gt-markdown class="-ml-8 mb-0">
            @verbatim
                ```
                <livewire:course.table />
                <livewire:course.create-edit />
            @endverbatim
        </x-gt-markdown>
        <p style="margin-top: -1rem;"><small>The components on the same page are not interconnected.</small></p>
    </div>

    <div class="container-md">
        <livewire:course.table />
        <div class="bx mt">
            <livewire:course.create-edit />
        </div>
    </div>

</x-gotime-app-layout>

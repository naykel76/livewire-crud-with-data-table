<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="flex markdown">

    <div class="w-sm">
        <div class="bx">
            <p>A sortable, paginated data table using the <code>Sortable</code> Trait, Gotime's <code>MoneyCast::class</code>, and the <code>PublishedStatus::class</code> enum for status casting.</p>
        </div>
        <x-gt-markdown class="-ml-8">
            @verbatim
                ```
                <livewire:course.table />
            @endverbatim
        </x-gt-markdown>
    </div>

    <div class="container-md">
        <livewire:course.table />
    </div>

</x-gotime-app-layout>

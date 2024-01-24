<x-gotime-layouts.base :$pageTitle>

    @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar'])

    <div class="container markdown">
        {{ $slot }}
    </div>

</x-gotime-layouts.base>

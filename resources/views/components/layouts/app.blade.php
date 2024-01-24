<x-gotime-layouts.base :$pageTitle>

    @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar'])

    <main {{ $attributes->merge(['class' => 'container py-2' . ($mainClasses ? ' container-md py-5' : '')]) }}>
        {{ $slot }}
    </main>

</x-gotime-layouts.base>

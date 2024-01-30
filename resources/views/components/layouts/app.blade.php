<x-gotime-layouts.base :$pageTitle>

    @includeFirst(['components.layouts.partials.navbar', 'gotime::components.layouts.partials.navbar'])

    {{-- FIGHT THE URGE, DON'T ADD CLASSES HERE --}}
    <main {{ $attributes->class($mainClasses ? ' container-lg py-5' : '') }}>
        {{ $slot }}
    </main>

</x-gotime-layouts.base>

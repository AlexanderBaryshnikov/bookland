<button {{ $attributes->class('btn btnhover') }}>
    {{ $image ?? '' }}
    {{ $slot ?? '' }}
</button>

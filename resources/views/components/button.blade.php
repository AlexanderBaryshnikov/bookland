@props([
    'type' => 'button',
    'disabled' => false,
])
<button {{ $attributes->class('btn btnhover')->merge(['type' => $type, 'disabled' => $disabled]) }}>
    {{ $image ?? '' }}
    {{ $slot ?? '' }}
</button>

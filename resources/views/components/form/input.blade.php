@props([
    'type' => 'text',
    'disabled' => false,
])
<input {{ $attributes->class('form-control')->merge(['type' => $type, 'disabled' => $disabled]) }}>

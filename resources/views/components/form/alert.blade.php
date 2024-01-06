@props([
    'error' => false,
])
<div  {{ $attributes->class(['alert', $error ? 'err alert-danger' : 'alert-success']) }}>
    {{ $slot ?? '' }}
</div>

@props(['type' => 'success'])

@php
    $colors = [
        'success' => 'bg-emerald-500/20 border-emerald-500 text-emerald-300',
        'danger'  => 'bg-red-500/20 border-red-500 text-red-300',
        'info'    => 'bg-blue-500/20 border-blue-500 text-blue-300',
    ];
@endphp

<div class="border px-4 py-3 rounded-lg mb-6 flex justify-between items-center {{ $colors[$type] ?? $colors['info'] }}">
    <div>{{ $slot }}</div>
</div>
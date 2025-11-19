{{--
    Button Component

    Props:
    - $variant (string): Button style variant (primary, outline, outline-white)
    - $type (string): Button type (button, submit, link)
    - $href (string): Link URL (for type="link")
    - $size (string): Button size (sm, md, lg)
    - $class (string): Additional CSS classes
--}}

@props([
    'variant' => 'primary',
    'type' => 'button',
    'href' => '#',
    'size' => 'md',
    'class' => '',
])

@php
    $baseClasses = 'btn';
    $variantClass = 'btn-' . $variant;
    $sizeClass = $size !== 'md' ? 'btn-' . $size : '';
    $allClasses = trim("$baseClasses $variantClass $sizeClass $class");
@endphp

@if($type === 'link')
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $allClasses]) }}>
        {{ $slot }}
    </a>
@else
    <button type="{{ $type }}" {{ $attributes->merge(['class' => $allClasses]) }}>
        {{ $slot }}
    </button>
@endif

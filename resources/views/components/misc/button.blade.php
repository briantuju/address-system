{{--@props(['class' => ''])--}}

<button {{ $attributes->class(['btn'])->merge(['type' => 'button']) }} {{ $attributes }}>
    {{ $slot }}
</button>

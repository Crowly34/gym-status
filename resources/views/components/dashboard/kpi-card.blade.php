@props(['value'])

<div {{ $attributes->class('rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 text-center') }}>
    <h3 class="text-sm font-medium">
        {{ $slot }}
    </h3>
    <p class="text-lg font-semibold">{{ $value }}</p>
</div>

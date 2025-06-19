@props(['value'])

<div {{ $attributes->class('rounded-xl border border-neutral-200 dark:border-neutral-700 p-4 text-center flex flex-col gap-6') }}>

<!-- TODO: Add icon slot and title -->
    <span> {{ $icon }} </span>
    <h3> {{ $title }} </h3>
    <p class="text-2xl font-medium">{{ $value }}</p>
</div>

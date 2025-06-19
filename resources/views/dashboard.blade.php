<x-layouts.app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <div class="grid gap-6 lg:grid-cols-3">
            <x-dashboard.kpi-card :value="$reportsCount">
<flux:icon.dumbbell  class="aspect-square size-14 text-amber-500 dark:text-amber-300 mx-auto" />
            </x-dashboard.kpi-card>
            <x-dashboard.kpi-card :value="$suggestionsCount">
<flux:icon.exclamation-triangle variant="outline" class="aspect-square size-14 text-amber-500 dark:text-amber-300 mx-auto" />
            </x-dashboard.kpi-card>
            <x-dashboard.kpi-card :value="$lastUpdated->diffForHumans()">
<flux:icon.clock variant="outline" class="aspect-square size-14 text-amber-500 dark:text-amber-300 mx-auto" />
            </x-dashboard.kpi-card>
        </div>

        <div class="grid auto-rows-min gap-4 md:grid-cols-2">
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-12">
                <livewire:reports-list />
            </div>
            <div class="relative overflow-hidden rounded-xl border border-neutral-200 dark:border-neutral-700 p-12">
                <livewire:suggestions-list />
            </div>
        </div>
    </div>
</x-layouts.app>

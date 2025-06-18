<div>
    <!-- Modal trigger -->
    <flux:modal.trigger name="add-song-suggestion">
        <flux:navlist.item icon="drum" >Agregar cancion</flux:navlist.item>
    </flux:modal.trigger>

    <!-- Modal content -->
    <flux:modal name="add-song-suggestion" class="md:w-[32rem]">
        <form wire:submit.prevent="submit" class="flex flex-col gap-y-4 p-2">
            <div>
                <flux:heading size="lg">Sugerir canción</flux:heading>
                <flux:text class="mt-2">Busca una canción para agregar al playlist del gym.</flux:text>
            </div>
            <flux:field>
                <flux:label>Canción</flux:label>
                <div
                    x-data="{
                        open: false,
                        focus() { this.open = true },
                        close() { setTimeout(() => this.open = false, 100) }
                    }"
                    @click.away="close()"
                    class="relative"
                >
                    <flux:input
                        wire:model.live="search"
                        type="text"
                        autocomplete="off"
                        placeholder="Busca una canción..."
                        @focus="focus()"
                        @input="open = true"
                    />

                    @if(count($tracks))
                        <div
                            x-show="open"
                            class="absolute left-0 right-0 z-20 bg-white dark:bg-neutral-900 border border-neutral-200 dark:border-neutral-700 rounded-b-xl shadow mt-1 max-h-60 overflow-y-auto"
                            x-transition
                        >
                            @foreach($tracks as $track)
                                <button
                                    type="button"
                                    wire:click="selectTrack('{{ $track['id'] }}')"
                                    @click="open = false"
                                    class="flex items-center w-full gap-2 px-4 py-2 hover:bg-primary-100 transition text-left"
                                >
                                    @if($track['cover'])
                                        <img src="{{ $track['cover'] }}" class="h-8 w-8 rounded" alt="">
                                    @endif
                                    <span class="truncate">{{ $track['name'] }}</span>
                                    <span class="text-xs text-neutral-400 truncate">– {{ $track['artist'] }}</span>
                                </button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </flux:field>

            <flux:error name="search" />

            @if ($selectedTrack)
                <div class="flex items-center gap-2 bg-primary-50 rounded px-2 py-1 text-primary-700">
                    @if ($selectedTrack['cover'])
                        <img src="{{ $selectedTrack['cover'] }}" class="h-8 w-8 rounded" alt="">
                    @endif
                    <span>{{ $selectedTrack['name'] }} – {{ $selectedTrack['artist'] }}</span>
                </div>
            @endif

            <flux:field>
                <flux:label>Nombre</flux:label>
                <flux:input
                    wire:model="username"
                    type="text"
                    placeholder="¿Quién recomienda esta canción?" />
                <flux:error name="username" />
            </flux:field>

            <div class="flex justify-end">
                <flux:button variant="primary" color="emerald" type="submit">
                    Agregar
                </flux:button>
            </div>
        </form>
    </flux:modal>
</div>

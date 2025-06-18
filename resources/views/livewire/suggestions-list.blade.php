<div class="w-full max-w-4xl mx-auto my-8">
    <h2 class="text-lg font-semibold mb-4">Sugerencias recientes de canciones</h2>
    <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700 bg-white dark:bg-zinc-900 rounded-xl overflow-hidden">
        <thead>
            <tr>
                <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Canción</th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Artista</th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Recomendado por</th>
                <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Enlace</th>
            </tr>
        </thead>
        <tbody>
            @foreach(\App\Models\SongSuggestion::latest()->take(10)->get() as $suggestion)
                <tr class="hover:bg-neutral-50 dark:hover:bg-zinc-800">
                    <td class="px-4 py-2 text-sm flex items-center gap-2">
                        @if($suggestion->cover)
                            <img src="{{ $suggestion->cover }}" alt="" class="h-8 w-8 rounded shadow" />
                        @endif
                        {{ $suggestion->title }}
                    </td>
                    <td class="px-4 py-2 text-sm">
                        {{ $suggestion->artist }}
                    </td>
                    <td class="px-4 py-2 text-sm">
                        {{ $suggestion->username ?? 'Anónimo' }}
                    </td>
                    <td class="px-4 py-2 text-sm">
                        @if($suggestion->spotify_url)
                            <a href="{{ $suggestion->spotify_url }}" target="_blank" class="text-primary-600 hover:underline">Ver</a>
                        @else
                            <span class="text-neutral-400">N/A</span>
                        @endif
                    </td>
                </tr>
            @endforeach
            @if(\App\Models\SongSuggestion::count() === 0)
                <tr>
                    <td colspan="4" class="px-4 py-6 text-center text-neutral-400">No hay sugerencias aún.</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

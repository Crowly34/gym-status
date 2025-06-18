<div class="w-full max-w-4xl mx-auto my-8">
            <h2 class="text-lg font-semibold mb-4">Reportes recientes</h2>
            <table class="min-w-full divide-y divide-neutral-200 dark:divide-neutral-700 bg-white dark:bg-zinc-900 rounded-xl overflow-hidden">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Tipo</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Notas</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Usuario</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-neutral-500">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(\App\Models\Report::latest()->take(10)->get() as $report)
                        <tr class="hover:bg-neutral-50 dark:hover:bg-zinc-800">
                            <td class="px-4 py-2 text-sm">
                                {{ ucfirst(str_replace('_', ' ', $report->type)) }}
                            </td>
                            <td class="px-4 py-2 text-sm">
                                {{ $report->notes ?? '—' }}
                            </td>
                            <td class="px-4 py-2 text-sm">
                                {{ $report->username ?? 'Anónimo' }}
                            </td>
                            <td class="px-4 py-2 text-sm">
                                {{ $report->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @endforeach
                    @if(\App\Models\Report::count() === 0)
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-neutral-400">No hay reportes aún.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

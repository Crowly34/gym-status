<?php

namespace App\Services\Spotify;

use Aerni\Spotify\Spotify;
use Illuminate\Support\Collection;

class SpotifyGateway
{
    protected Spotify $spotify;

    public function __construct(Spotify $spotify)
    {
        $this->spotify = $spotify;
    }

    /**
     * Busca canciones por texto.
     */
    public function searchTracks(string $query, int $limit = 5): Collection
    {
        $results = $this->spotify->searchItems($query, 'track', $limit)->get();

        $items = $results['tracks']['items'] ?? [];

        return collect($items)->map(function ($item) {
            return [
                'id' => $item['id'],
                'name' => $item['name'],
                'artist' => collect($item['artists'])->pluck('name')->join(', '),
                'album' => $item['album']['name'] ?? '',
                'cover' => $item['album']['images'][1]['url']    // [1] is medium, [0] is largest
                    ?? ($item['album']['images'][0]['url'] ?? null),
                'url' => $item['external_urls']['spotify'] ?? null,
                'uri' => $item['uri'],
                'preview_url' => $item['preview_url'] ?? null, // 30 sec sample (sometimes null)
            ];
        });
    }
}

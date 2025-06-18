<?php

namespace App\Livewire;

use App\Models\SongSuggestion;
use App\Services\Spotify\SpotifyGateway;
use Livewire\Component;

class SpotifyForm extends Component
{
    public $search = '';

    public $tracks = [];

    public $selectedTrack = null;

    public $username;

    public function updatedSearch(SpotifyGateway $gateway)
    {
        if (strlen($this->search) < 3) {
            $this->tracks = [];

            return;
        }

        $this->tracks = $gateway->searchTracks($this->search)->toArray();
    }

    public function selectTrack(SpotifyGateway $gateway, $trackId)
    {
        $track = collect($this->tracks)->firstWhere('id', $trackId);
        $this->selectedTrack = $track;
    }

    public function submit(SpotifyGateway $gateway)
    {
        if (! $this->selectedTrack) {
            session()->flash('error', 'Please select a track.');

            return;
        }
        $artist = data_get($this->selectedTrack, 'artists.0.name')
            ?? data_get($this->selectedTrack, 'artist')
            ?? 'Unknown Artist';

        if (array_key_exists('artists', $this->selectedTrack)) {
            $artist = implode(', ', array_map(function ($artist) {
                return $artist['name'];
            }, $this->selectedTrack['artists']));
        } else {
            $artist = $this->selectedTrack['artist'] ?? 'Unknown Artist';
        }

        SongSuggestion::create([
            'title' => $this->selectedTrack['name'],
            'artist' => $artist,
            'album' => $this->selectedTrack['album'],
            'spotify_id' => $this->selectedTrack['id'],
            'username' => $this->username,
            'spotify_url' => $this->selectedTrack['url'],
            'cover' => $this->selectedTrack['cover'] ?? null,
            'meta' => $this->selectedTrack,
        ]);

        session()->flash('success', 'Track saved successfully!');
        $this->reset(['search', 'tracks', 'selectedTrack']);
    }

    public function render()
    {
        return view('livewire.spotify-form');
    }
}

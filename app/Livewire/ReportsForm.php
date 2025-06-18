<?php

namespace App\Livewire;

use App\Models\Report;
use Livewire\Component;

class ReportsForm extends Component
{
    public $type = '';

    public $name = '';

    public $description = '';

    protected $rules = [
        'type' => 'required|string',
        'name' => 'nullable|string|max:80',
        'description' => 'nullable|string|max:255',
    ];

    public function submit()
    {
        $this->validate();

        Report::create([
            'type' => $this->type,
            'notes' => $this->description,
            'username' => $this->name,
        ]);

        // Reset the form
        $this->reset(['type', 'name', 'description']);

        // Optionally close the modal and/or show notification
        $this->dispatch('close-modal', name: 'add-status-report');
        $this->dispatch('notify', type: 'success', message: 'Reporte enviado correctamente 🚀');
    }

    public function render()
    {
        return view('livewire.reports-form');
    }
}

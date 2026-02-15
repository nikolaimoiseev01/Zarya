<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;

class IndexPage extends Component
{
    public $clients;
    public $projects;
    public $modalProject;

    public function render()
    {
        $this->clients = Client::with('media')->get();
        $this->projects = Project::with('media')->orderBy('order')->get();
        return view('livewire.pages.portal.index-page');
    }

    public function changeModalProject($id) {
        $this->modalProject = $this->projects->where('id', $id);

        $this->dispatch('open-modal', [
            'name' => 'project-modal'
        ]);
    }
}

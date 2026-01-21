<?php

namespace App\Livewire\Pages\Portal;

use App\Models\Client;
use App\Models\Project;
use Livewire\Component;

class IndexPage extends Component
{
    public $clients;
    public $projects;

    public function render()
    {
        $this->clients = Client::with('media')->get();
        $this->projects = Project::with('media')->get();
        return view('livewire.pages.portal.index-page');
    }
}

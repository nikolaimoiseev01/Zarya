<?php

namespace App\View\Components\Ui;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\View\Component;

class Marquee extends Component
{
    public Collection $clients1;
    public Collection $clients2;

    public function __construct($marqueeClients)
    {
        $clients = collect($marqueeClients)->values(); // на всякий случай

        $half = (int) ceil($clients->count() / 2);

        $this->clients1 = $clients->slice(0, $half);
        $this->clients2 = $clients->slice($half);
    }

    public function render(): View|Closure|string
    {
        return view('components.ui.marquee');
    }
}

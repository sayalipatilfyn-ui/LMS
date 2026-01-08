<?php

namespace App\Livewire;

use Livewire\Component;

class CurrentDateTime extends Component
{
    public $time;

    public function mount()
    {
        $this->updateTime();
    }

    public function updateTime()
    {
        $this->time = now()
            ->timezone('Asia/Kolkata')
            ->format('d M Y, h:i:s A');
    }

    public function render()
    {
        return view('livewire.current-date-time');
    }
}
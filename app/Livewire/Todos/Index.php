<?php

namespace App\Livewire\Todos;

use Livewire\Component;
use Livewire\Attributes\Title;

#[Title('Todos')]

class Index extends Component
{
    public function render()
    {
        return view('livewire.todos.index');
    }
}

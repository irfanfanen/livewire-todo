<?php

namespace App\Livewire\Todos;

use Livewire\Component;
use \App\Models\Todo;

class Create extends Component
{
    public $task = '';
    public $category = '';

    public function rules()
    {
        return [
            'task' => 'required|max:255',
            'category' => 'required'
        ];
    }

    public function save()
    {
        $this->validate();

        $todo = Todo::create($this->all());

        $this->reset();

        $this->dispatch('todoCreated', $todo);
    }

    public function render()
    {
        return view('livewire.todos.create');
    }
}

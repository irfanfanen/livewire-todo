<?php

namespace App\Livewire\Todos;

use App\Models\Todo;
use Livewire\Attributes\On;
use Livewire\Component;

class Lists extends Component
{
    public $status = 'pending';
    public $editedTask = '';
    public $editedTaskId = null;
    
    #[On('todoCreated')]
    public function updateList()
    {

    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        $this->dispatch('todoCreated', $todo);
    }

    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->update([
            'status' => 'completed'
        ]);

        $this->dispatch('todoCreated', $todo);
    }

    public function edit($data)
    {
        $this->editedTask = $data['task'];
        $this->editedTaskId = $data['id'];
    }

    public function update()
    {
        $todo = Todo::find($this->editedTaskId);
        $todo->update([
            'task' => $this->editedTask
        ]);

        $this->editedTaskId = null;
        
        $this->dispatch('todoCreated', $todo);
    }

    public function render()
    {
        return view('livewire.todos.lists', [
            'todos' => Todo::orderBy('created_at', 'desc')->get()
        ]);
    }
}

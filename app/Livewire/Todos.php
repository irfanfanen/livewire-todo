<?php

namespace App\Livewire;

use Livewire\Attributes\Validate;
use Livewire\Component;
use \App\Models\Todo;
use Livewire\Attributes\Computed;

class Todos extends Component
{
    #[Validate]
    public $task = '';

    public $category = '';

    public $status = 'pending';

    public $editedTask = '';

    public $editedTaskId = null;

    public function rules()
    {
        return [
            'task' => 'required|min:4|max:255',
            'category' => 'required'
        ];
    }

    public function save()
    {
        $this->validate();

        Todo::create($this->all());

        $this->reset();
    }

    #[Computed()]
    public function lists()
    {
        return Todo::all();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
    }

    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->update([
            'status' => 'completed'
        ]);
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
    }

    public function render()
    {
        return view('livewire.todos', [
            'todos' => $this->lists()
        ]);
    }
}

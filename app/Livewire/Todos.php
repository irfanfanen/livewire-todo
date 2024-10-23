<?php

namespace App\Livewire;

use Livewire\Component;
use \App\Models\Todo;
use Livewire\Attributes\Computed;

class Todos extends Component
{
    public $todos;

    public $task = '';

    public $category = '';

    public $status = 'pending';

    public $editedTask = '';

    public $editedTaskId = null;

    public function mount()
    {
        $this->todos = Todo::all();
    }

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
        $this->todos = Todo::all();
    }

    public function delete($id)
    {
        $todo = Todo::find($id);
        $todo->delete();

        $this->todos = Todo::all();
    }

    public function completed($id)
    {
        $todo = Todo::find($id);
        $todo->update([
            'status' => 'completed'
        ]);

        $this->todos = Todo::all();
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
        $this->todos = Todo::all();
    }

    public function render()
    {
        return view('livewire.todos');
    }
}

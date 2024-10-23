<div class="row justify-content-center">
    <div class="col-md-5 bg-infox">
        <div class="text-center mb-4">
            <h1>My Action Plan</h1>
            <p>Keep yourself organized and be productive</p>
        </div>

        <form wire:submit="save">
            <div class="d-flex justify-content-between mb-3">
                <input wire:model.live="task" type="text" class="form-control me-2" name="title" placeholder="Tulis agenda anda disini...">
                <button type="submit" class="btn btn-success"
                    @if(empty($task) || empty($category)) disabled @endif
                >
                    Tambah
                </button>
            </div>

            <div class="mb-5">
                <div class="form-check form-check-inline">
                    <input wire:model.live="category" class="form-check-input" type="radio" name="category" value="high" id="high">
                    <label class="form-check-label" for="high">High Priority</label>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model.live="category" class="form-check-input" type="radio" name="category" value="medium" id="medium">
                    <label class="form-check-label" for="medium">Medium Priority</label>
                </div>
                <div class="form-check form-check-inline">
                    <input wire:model.live="category" class="form-check-input" type="radio" name="category" value="low" id="low">
                    <label class="form-check-label" for="low">Low Priority</label>
                </div>
            </div>
        </form>

        <div class="mb-3">
            @if ($todos == null)
                <p class="text-center">Belum ada agenda, silahkan tambah terlebih dahulu..</p>                
            @else
                @foreach ($todos as $todo)
                    @if ($todo->status === 'pending')
                        <div class="card mb-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-2">
                                    <small class="badge
                                        {{ $todo->category === 'high' ? 'text-bg-danger' : ($todo->category === 'medium' ? 'text-bg-primary': 'text-bg-warning')}}">
                                        {{ ucfirst($todo->category) }}
                                    </small>
                                    <div>
                                        <a href="#" class="text-dark text-decoration-none"
                                            wire:click="edit({{$todo}})"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-settings"><circle cx="12" cy="12" r="3"></circle><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path></svg>
                                        </a>
                                        <a href="#" class="text-dark text-decoration-none"
                                            wire:click="delete({{ $todo->id }})"
                                            wire:confirm="Are you sure want to delete this task?"
                                        >
                                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>
                                        </a>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center">
                                    <input class="form-check-input me-2" type="checkbox" name="close" id="status_{{ $todo->id }}"
                                        wire:click="completed({{ $todo->id }})"
                                    >
                                    @if ($editedTaskId === $todo->id)
                                        <input 
                                            wire:model="editedTask"
                                            wire:keydown.enter="update"
                                            type="text"
                                            class="form-control"
                                        >
                                    @else
                                        <label class="form-check-label" for="status_{{ $todo->id }}">{{ $todo->task }} </label>                                        
                                    @endif
                                </div>
                            </div>
                        </div>               
                    @endif
                @endforeach
            @endif
        </div>
    </div>
</div>
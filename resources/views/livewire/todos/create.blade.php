<div>
    <form wire:submit="save">
        <div class="d-flex justify-content-between mb-3">
            <input wire:model.live="task" type="text" class="form-control me-2" name="title"
                placeholder="Tulis agenda anda disini...">
            <button type="submit" class="btn btn-success" @if(empty($task) || empty($category)) disabled @endif>
                Tambah
            </button>
        </div>

        <div class="mb-5">
            <div class="form-check form-check-inline">
                <input wire:model.live="category" class="form-check-input" type="radio" name="category" value="high"
                    id="high">
                <label class="form-check-label" for="high">High Priority</label>
            </div>
            <div class="form-check form-check-inline">
                <input wire:model.live="category" class="form-check-input" type="radio" name="category" value="medium"
                    id="medium">
                <label class="form-check-label" for="medium">Medium Priority</label>
            </div>
            <div class="form-check form-check-inline">
                <input wire:model.live="category" class="form-check-input" type="radio" name="category" value="low"
                    id="low">
                <label class="form-check-label" for="low">Low Priority</label>
            </div>
        </div>
    </form>
</div>
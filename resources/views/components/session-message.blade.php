@if (session()->has('message'))
<div class="toast-container position-fixed bottom-0 start-0 p-3">
    <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="10000">
        <div class="d-flex">
            <div class="toast-body">
                {{ session('message')}}
            </div>
            <button type="button" class="btn-close me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
    </div>
</div>
@endif
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crud_modalLabel">Edit Slot</h5>
            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="server_side_error"></div>
            <form id="crud_form" action="{{ route('admin.slots.update', $slot->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group mb-3">
                    <label for="name">Slot Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $slot->name }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="start_time">Start Time</label>
                    <input type="time" class="form-control" id="start_time" name="start_time" value="{{ $slot->start_time }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="end_time">End Time</label>
                    <input type="time" class="form-control" id="end_time" name="end_time" value="{{ $slot->end_time }}" required>
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $slot->price }}" min="0" required>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="crud_form_submit_btn" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>

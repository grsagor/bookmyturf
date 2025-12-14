<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crud_modalLabel">Edit Order</h5>
            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="server_side_error"></div>
            <form id="crud_form" action="{{ route('admin.orders.update', $order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Slot selection as radio buttons -->
                <div class="form-group mb-3">
                    <label>Choose Slot</label>
                    <div id="slots_container">
                        @foreach ($slots as $slot)
                            @if (!$slot->booked)
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="slot_id"
                                        id="slot_{{ $slot->id }}" value="{{ $slot->id }}"
                                        {{ $order->slot_id == $slot->id ? 'checked' : '' }} required>
                                    <label class="form-check-label" for="slot_{{ $slot->id }}">
                                        {{ $slot->name }}
                                        ({{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }}
                                        - {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }})
                                    </label>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>

                <!-- Date picker -->
                <div class="form-group mb-3">
                    <label for="date">Date</label>
                    <input type="date" class="form-control date-field" id="date" name="date"
                        value="{{ $order->date }}" required>
                </div>

                <!-- Name -->
                <div class="form-group mb-3">
                    <label for="name">Order Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ $order->name }}"
                        required>
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="{{ $order->email }}" required>
                </div>

                <!-- Phone -->
                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                        value="{{ $order->phone }}" required>
                </div>

                <!-- Amount -->
                <div class="form-group mb-3">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount"
                        value="{{ $order->amount }}" min="0" step="0.01" required>
                </div>

                <!-- Address -->
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required>{{ $order->address }}</textarea>
                </div>

                <!-- Status select -->
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Pending" {{ $order->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                        <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing
                        </option>
                        <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed
                        </option>
                    </select>
                </div>

                <!-- Transaction ID -->
                <div class="form-group mb-3">
                    <label for="transaction_id">Transaction ID</label>
                    <input type="text" class="form-control" id="transaction_id" name="transaction_id"
                        value="{{ $order->transaction_id }}">
                </div>

                <!-- Currency fixed to BDT -->
                <div class="form-group mb-3">
                    <label for="currency">Currency</label>
                    <input type="text" class="form-control" id="currency" name="currency" value="BDT" readonly>
                </div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" id="crud_form_submit_btn" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>

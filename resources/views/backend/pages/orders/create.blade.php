<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="crud_modalLabel">Add Order</h5>
            <button type="button" class="close btn" data-bs-dismiss="modal" aria-label="Close">
                <span aria-hidden="true"><i class="fa-solid fa-xmark"></i></span>
            </button>
        </div>
        <div class="modal-body">
            <div class="server_side_error"></div>
            <form id="crud_form" action="{{ route('admin.orders.store') }}" method="POST">
                @csrf

                <!-- Slot selection as radio buttons -->
                <div class="form-group mb-3">
                    <label>Choose Slot</label>
                    <div id="slots_container">
                        @foreach ($slots as $slot)
                            @if (!$slot['booked'])
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="slot_id"
                                        id="slot_{{ $slot->id }}" value="{{ $slot->id }}" required>
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
                    <input type="date" class="form-control date-field" id="date" name="date" required>
                </div>

                <!-- Name -->
                <div class="form-group mb-3">
                    <label for="name">Order Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Customer Name"
                        required>
                </div>

                <!-- Email -->
                <div class="form-group mb-3">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="email@example.com" required>
                </div>

                <!-- Phone -->
                <div class="form-group mb-3">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" id="phone" name="phone"
                        placeholder="+8801XXXXXXXXX" required>
                </div>

                <!-- Amount -->
                <div class="form-group mb-3">
                    <label for="amount">Amount</label>
                    <input type="number" class="form-control" id="amount" name="amount" placeholder="100"
                        min="0" step="0.01" required>
                </div>

                <!-- Address -->
                <div class="form-group mb-3">
                    <label for="address">Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" placeholder="Customer address" required></textarea>
                </div>

                <!-- Status select -->
                <div class="form-group mb-3">
                    <label for="status">Status</label>
                    <select class="form-select" id="status" name="status" required>
                        <option value="Pending">Pending</option>
                        <option value="Processing" selected>Processing</option>
                        <option value="Completed">Completed</option>
                    </select>
                </div>

                <!-- Transaction ID -->
                <div class="form-group mb-3">
                    <label for="transaction_id">Transaction ID</label>
                    <input type="text" class="form-control" id="transaction_id" name="transaction_id"
                        placeholder="Optional">
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

@if (isset($for) && $for == 'order_management')
    @foreach ($slots as $slot)
        @if (!$slot['booked'])
            <div class="form-check">
                <input class="form-check-input" type="radio" name="slot_id" id="slot_{{ $slot->id }}"
                    value="{{ $slot->id }}" required>
                <label class="form-check-label" for="slot_{{ $slot->id }}">
                    {{ $slot->name }} ({{ \Carbon\Carbon::parse($slot->start_time)->format('h:i A') }}
                    - {{ \Carbon\Carbon::parse($slot->end_time)->format('h:i A') }})
                </label>
            </div>
        @endif
    @endforeach
@else
    @forelse ($slots as $slot)
        <tr class="{{ $slot['booked'] ? 'table-danger' : '' }}">
            <td>{{ $slot['start_time'] }}</td>
            <td>{{ $slot['end_time'] }}</td>
            <td>${{ $slot['price'] }}</td>
            <td>
                @if ($slot['booked'])
                    <span class="text-danger fw-bold">Booked</span>
                @else
                    <span class="text-success fw-bold">Available</span>
                @endif
            </td>
            <td>
                @if (!$slot['booked'])
                    <button class="btn btn-primary btn-sm book-btn" data-slot-id="{{ $slot['id'] }}"
                        data-booking-url="{{ route('front.book.slot') }}">Book</button>
                @else
                    <button class="btn btn-secondary btn-sm" disabled>Booked</button>
                @endif
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center">No slots available for this day.</td>
        </tr>
    @endforelse
@endif

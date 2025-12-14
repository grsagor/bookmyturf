<section class="container slot-section py-4">
    <h1 class="mb-4 text-center">Book Your Slot</h1>

    <select id="date-select" class="form-select mb-4 w-auto mx-auto d-block">
        @foreach ($dates as $date)
            <option value="{{ $date }}" {{ $date == $defaultDate ? 'selected' : '' }}>
                {{ \Carbon\Carbon::parse($date)->format('D, M d, Y') }}
            </option>
        @endforeach
    </select>

    <div class="table-responsive">
        <table class="table table-dark table-striped align-middle text-center" id="slots-table">
            <thead>
                <tr>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @include('front.pages.home.sections.slot-tbody')
            </tbody>
        </table>
    </div>
</section>

@push('scripts')
    <script>
        $(function() {
            $('#date-select').on('change', function() {
                const selectedDate = $(this).val();
                $('#slots-table tbody').html(
                    '<tr><td colspan="5" class="text-center text-info">Loading slots...</td></tr>'
                );

                $.ajax({
                    url: "{{ route('front.get.slots') }}",
                    method: 'POST',
                    data: {
                        date: selectedDate,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(slots) {
                        if (slots.success) {
                            $('#slots-table tbody').html(slots.html);
                        }
                    },
                    error: function() {
                        $('#slots-table tbody').html(
                            '<tr><td colspan="5" class="text-center text-danger">Failed to load slots.</td></tr>'
                        );
                    }
                });
            });
        });
    </script>
@endpush

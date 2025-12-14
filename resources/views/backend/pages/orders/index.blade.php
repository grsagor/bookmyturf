@extends('backend.layout.app')

@section('content')
    <div class="container-fluid px-4">
        <h4 class="mt-2 mb-3">Order Management</h4>
        <div class="card my-2">
            <div class="card-header">
                <div class="row ">
                    <div class="col-12 d-flex justify-content-between">
                        <div class="d-flex align-items-center">
                            <h5 class="m-0">Orders List</h5>
                        </div>
                        <button type="button" class="btn btn-primary create_btn"
                            data-url="{{ route('admin.orders.create') }}"><i class="fa-solid fa-plus"></i>
                            Add New</button>
                    </div>
                </div>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-bordered yajra-datatable" data-url="{{ route('admin.orders.list') }}">
                    <thead>
                        <tr>

                            <th>ID</th>
                            <th>Slot Name</th>
                            <th>Date</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Amount</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th>Transaction ID</th>
                            <th>Currency</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="crud_modal" tabindex="-1" role="dialog" aria-labelledby="crud_modalLabel"
        aria-hidden="true">

    </div>
@endsection

@section('script')
    <script>
        const columns = [{
                data: 'id',
                name: 'id'
            },
            {
                data: 'slot.name',
                name: 'slot.name',
                orderable: false,
                searchable: true
            }, // show slot name from relation
            {
                data: 'date',
                name: 'date'
            },
            {
                data: 'name',
                name: 'name'
            },
            {
                data: 'email',
                name: 'email'
            },
            {
                data: 'phone',
                name: 'phone'
            },
            {
                data: 'amount',
                name: 'amount'
            },
            {
                data: 'address',
                name: 'address'
            },
            {
                data: 'status',
                name: 'status'
            },
            {
                data: 'transaction_id',
                name: 'transaction_id'
            },
            {
                data: 'currency',
                name: 'currency'
            },
            {
                data: 'action',
                name: 'action',
                orderable: false,
                searchable: false
            }
        ];

        let table = initDatatable({
            columns
        });

        $(document).ready(function() {
            $(document).on('change', '.date-field', function() {
                const selectedDate = $(this).val();

                console.log(selectedDate)
                $('#slots-table tbody').html(
                    '<tr><td colspan="5" class="text-center text-info">Loading slots...</td></tr>'
                );

                $.ajax({
                    url: "{{ route('front.get.slots') }}",
                    method: 'POST',
                    data: {
                        date: selectedDate,
                        for: 'order_management',
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(slots) {
                        if (slots.success) {
                            $('#slots_container').html(slots.html);
                        }
                    },
                    error: function() {
                        $('#slots_container').html(
                            '<tr><td colspan="5" class="text-center text-danger">Failed to load slots.</td></tr>'
                        );
                    }
                });
            });
        });
    </script>
@endsection

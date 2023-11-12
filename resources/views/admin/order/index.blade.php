@extends('layouts.admin')

@section('stylesheet')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
        type="text/css" />
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">List of Order</h2>
                        </header>
                        <div class="panel-body">
                            @if (session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif



                            <div class="row mt-5 mb-5">
                                <div class="col-md-6 col-xl-4">
                                    <div style="background: #f6ab4957" class="card">
                                        <div class="card-body">
                                            <span class="mini-stat-icon bg-purple me-0 float-end"><i
                                                    class="mdi mdi-basket"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-purple">{{ $total_order }}</span>
                                                Total Orders
                                            </div>
                                            {{--  <p class=" mb-0 mt-4 text-muted">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>  --}}
                                        </div>
                                    </div>
                                </div> <!--End col -->
                                <div class="col-md-6 col-xl-4">
                                    <div style="background: #f6ab4957" class="card">
                                        <div class="card-body">
                                            <span class="mini-stat-icon bg-blue-grey me-0 float-end"><i
                                                    class="mdi mdi-black-mesa"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-blue-grey">{{ $pending }}</span>
                                                Pending Orders
                                            </div>
                                            {{--  <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>  --}}
                                        </div>
                                    </div>
                                </div> <!-- End col -->
                                <div class="col-md-6 col-xl-4">
                                    <div style="background: #f6ab4957" class="card">
                                        <div class="card-body">
                                            <span class="mini-stat-icon bg-brown me-0 float-end"><i
                                                    class="mdi mdi-buffer"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-brown">{{ $complete_order ?? '' }}</span>
                                                Complete
                                            </div>
                                            {{--  <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>  --}}
                                        </div>
                                    </div>
                                </div> <!-- End col -->
                                {{--  <div class="col-md-6 col-xl-3">
                                    <div style="background: #f6ab4957" class="card">
                                        <div class="card-body">
                                            <span class="mini-stat-icon bg-teal me-0 float-end"><i
                                                    class="mdi mdi-coffee"></i></span>
                                            <div class="mini-stat-info">
                                                <span class="counter text-teal">20544</span>
                                                Unique Visitors
                                            </div>
                                            <p class="text-muted mb-0 mt-4">Total income: $22506 <span class="float-end"><i class="fa fa-caret-up me-1"></i>10.25%</span></p>
                                        </div>
                                    </div>
                                </div><!--end col -->  --}}
                            </div> <!-- end row-->

















                            {{-- <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                                    <a href="{{ route('animal.create') }}" class="brn btn-success btn-sm">New animal</a>
                                </div>
                            </div> --}}
                            {{-- <table class="table table-bordered table-striped mb-none" id="data-table"> --}}
                            <div class="table-rep-plugin">
                                <div class="table-responsive mb-0" data-bs-pattern="priority-columns">
                                    <table id="datatable-buttons" class="table table-striped table-bordered" cellspacing="0"
                                        width="100%" style="font-size: 14px">

                                        <thead>
                                            <tr>
                                                <th width="10">#</th>
                                               
                                                <th>Payment Type</th>
                                                <th>Customer Info</th>
                                                <th width="200">Amount</th>
                                                {{--  <th class="hidden-phone" width="40">Payment Time</th>  --}}
                                                <th width="100">Action</th>
                                                <th width="100">Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($orders as $key => $val)
                                                <tr class="@if ($key % 2 == 0) gradeX @else gradeC @endif">
                                                    <td class="p-1">{{ $key + 1 }}</td>
                                                    

                                                    <td class="p-1">
                                                        {{ $val->payment_type }}
                                                        </p>
                                                    </td>

                                                    <td class="p-1">
                                                        <div>
                                                            <p class="font-weight-bold">Name: <span
                                                                    class="">{{ $val->name }}</span>
                                                            </p>
                                                            <p class="font-weight-bold">Email: <span
                                                                    class="">{{ $val->email }}</span>
                                                            </p>
                                                            <p class="font-weight-bold">Phone: <span
                                                                    class="">{{ $val->phone }}</span>
                                                            </p>
                                                        </div>
                                                    </td>


                                                    <td class="p-1">

                                                      
                                                            

                                                            <p class="font-weight-bold">Sub-Total: <span
                                                                    class="">{{ $val->subtotal }}</span>
                                                            </p>
                                                      


                                                    </td>
                                                    {{--  <td class="p-1">{{ $val->amount }}</td>  --}}
                                                    {{--  <td width="200" class="p-1">
                                                        {{ date('F d, Y h:i A', strtotime($val->created_at)) }}</td>  --}}

                                                    @php
                                                        $statusColor = '';
                                                        if (App\Enums\OrderStatusEnum::COMPLETE == $val->status) {
                                                            $statusColor = 'success';
                                                        } elseif (App\Enums\OrderStatusEnum::PENDING == $val->status) {
                                                            $statusColor = 'warning';
                                                        } elseif (App\Enums\OrderStatusEnum::CANCEL == $val->status) {
                                                            $statusColor = 'danger';
                                                        } else {
                                                            $statusColor = 'info';
                                                        }
                                                    @endphp
                                                    @if (\App\Helper\CustomHelper::canView('Create User|Manage User|Delete User|View User|List Of User', 'Super Admin'))
                                                        <td class="text-capitalize p-1" width="100">
                                                            <select id="order_status_{{ $val->id }}" name="status"
                                                                required data-id="{{ $val->id }}"
                                                                class="form-control font-weight-bold {{ $statusColor }} ">

                                                                <option class="text-success font-weight-bold"
                                                                    value="{{ App\Enums\OrderStatusEnum::COMPLETE }}"
                                                                    @if (App\Enums\OrderStatusEnum::COMPLETE == $val->status) selected @endif>
                                                                    {{ ucfirst(App\Enums\OrderStatusEnum::COMPLETE) }}
                                                                </option>
                                                                <option class="text-warning font-weight-bold"
                                                                    value="{{ App\Enums\OrderStatusEnum::PENDING }}"
                                                                    @if (App\Enums\OrderStatusEnum::PENDING == $val->status) selected @endif>
                                                                    {{ ucfirst(App\Enums\OrderStatusEnum::PENDING) }}
                                                                </option>
                                                                <option class="text-danger font-weight-bold"
                                                                    value="{{ App\Enums\OrderStatusEnum::CANCEL }}"
                                                                    @if (App\Enums\OrderStatusEnum::CANCEL == $val->status) selected @endif>
                                                                    {{ ucfirst(App\Enums\OrderStatusEnum::CANCEL) }}
                                                                </option>
                                                                <option class="text-info font-weight-bold"
                                                                    value="{{ App\Enums\OrderStatusEnum::RETURN }}"
                                                                    @if (App\Enums\OrderStatusEnum::RETURN == $val->status) selected @endif>
                                                                    {{ ucfirst(App\Enums\OrderStatusEnum::RETURN) }}
                                                                </option>

                                                            </select>
                                                        </td>
                                                    @endif
                                                    @if (
                                                        \App\Helper\CustomHelper::canView(
                                                            'Create User|Manage User|Delete User|View User|List Of User',
                                                            'Super Admin|Customer'))
                                                        <td class="center hidden-phone p-1" width="100">
                                                            <a href="{{ route('view.order', $val->id) }}"
                                                                class="btn btn-sm btn-success"> <i class="fa fa-eye"></i>
                                                            </a>
                                                            {{--  <span
                                                                class="btn btn-sm btn-danger btn-delete delete_modal view" id="{{ $val->id }}"
                                                                style="cursor: pointer" data-id="{{ $val->id }}"><i
                                                                    class="fa fa-trash"></i></span>  --}}
                                                        </td>
                                                    @endif

                                                    @if ($role == 'Customer')
                                                        <td class="text-capitalize p-1" width="100">
                                                            <button
                                                                class="btn ms-2 btn-{{ $statusColor }}">{{ ucfirst($val->status) }}</button>
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            {{--              <div class="row"> --}}
                            {{--                <div class="col-sm-12">{{ $data->links() }}</div> --}}
                            {{--              </div> --}}
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="userDeleteModal"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content" id="view_modal_body">
                <div class="modal-header">
                    {{--                    <h4>{{__('admin.animal.delete_user')}}</h4> --}}
                    <h4>Delete animal</h4>
                </div>
                </div>
               
           
        </div>
    </div>
@endsection


@section('script')
    <!-- Required datatable js -->
    <script src="{{ asset('assets/admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <!-- Buttons examples -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <!-- Responsive examples -->
    <script src="{{ asset('assets/admin/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/admin/plugins/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <script>
        //order view
        $('body').on('click', '.view, function () {
        var id = $(this).data('id');
        var url = "{{ url('/order/view/admin') }}/" + id; 
        $.ajax({
            url: url,
            type: 'get',
            success: function(data) {
                $("#view_modal_body").html(data);
            }
        });
        });
    </script>



    <script>
        $(document).ready(function() {
            // $('#datatable-buttons').DataTable();

            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


            $(document).on('change', 'select[name="status"]', function() {
                var status = $(this).val();
                // console.log(status);
                var id = $(this).data('id')
                $.ajax({
                    url: "{{ route('ajax.update.order.status') }}",
                    method: "post",
                    dataType: "html",
                    data: {
                        'id': id,
                        'status': status
                    },
                    success: function(data) {
                        if (data === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                });
            });






            $(document).on('change', 'input[name="onoffswitchtwo"]', function() {
                var featured = 'no';
                var id = $(this).data('id')
                var isChecked = $(this).is(":checked");
                if (isChecked) {
                    featured = 'yes';
                }
                $.ajax({
                    url: "{{ route('ajax.update.animal.featured') }}",
                    method: "post",
                    dataType: "html",
                    data: {
                        'id': id,
                        'featured': featured
                    },
                    success: function(data) {
                        if (data === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });
                        }
                    }
                });
            });



            $(document).on('change', 'input[name="onoffswitchdeal"]', function() {
                var today_deal = 'no';
                console.log(today_deal);
                var id = $(this).data('id')
                console.log("log2", id);
                var isChecked = $(this).is(":checked");
                console.log("log3", id);
                if (isChecked) {
                    today_deal = 'yes';
                }
                $.ajax({
                    url: "{{ route('ajax.update.animal.today_deal') }}",
                    method: "post",
                    dataType: "html",
                    data: {
                        'id': id,
                        'today_deal': today_deal
                    },
                    success: function(data) {
                        if (data === "success") {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                {{--  text: 'Updated successfully.',  --}}
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000
                            });

                        }
                    }
                });
            });







            $(document).on('click', '.yes-btn', function() {
                var pid = $(this).data('id');
                var $this = $('.delete_' + pid)
                $.ajax({
                    url: "{{ route('animal.destroy') }}",
                    method: "delete",
                    dataType: "html",
                    data: {
                        id: pid
                    },
                    success: function(data) {
                        if (data === "success") {
                            $('#userDeleteModal').modal('hide')
                            $this.closest('tr').css('background-color', 'red').fadeOut();
                        }
                    }
                });
            })

            $(document).on('click', '.btn-delete', function() {
                var pid = $(this).data('id');
                $('.yes-btn').data('id', pid);
                $('#userDeleteModal').modal('show')
            });
        })
    </script>
@endsection

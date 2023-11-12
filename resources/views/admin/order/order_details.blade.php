@extends('layouts.admin')

@section('stylesheet')
    <!-- DataTables -->
    <link href="{{ asset('assets/admin/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>
    <link href="{{ asset('assets/admin/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>

    <link href="{{ asset('assets/admin/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet"
          type="text/css"/>


@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Order Details</h2>
                        </header>
                        <div class="panel-body">
                            @if(session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif

                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                                    <a href="{{route('order.list')}}" class="brn btn-success btn-sm">Back to order List</a>
                                </div>
                            </div>




                            @foreach($orders as $key => $val)
                                <div class="main-content">

                                    <div class="page-content">
                                        <div class="container-fluid">
                    
                                            <div class="row">
                                                <div class="col-12">
                                                    <table class="body-wrap" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; background-color: transparent; color: #212529; margin: 0;" bgcolor="transparent">
                                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                            <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;" valign="top"></td>
                                                            <td class="container" width="600" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; display: block !important; max-width: 600px !important; clear: both !important; margin: 0 auto;" valign="top">
                                                                <div class="content" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
                                                                    <table class="main" width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px;  margin: 0; border: none;">
                                                                        <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                            <td class="content-wrap aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0;padding: 20px;border: 3px solid #1d1e3a;border-radius: 7px; background-color: #fff;" align="center" valign="top">
                                                                                <table width="100%" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                   
                                                                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td class="content-block aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
                                                                                            <table class="invoice" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; text-align: left; width: 80%; margin: 40px auto;">
                                                                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                    <td style="text-align: center;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top"><b>Product Information</b>
                                                                                                        {{--  <br style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">August 01 2017  --}}
                                                                                                    </td>
                                                                                                </tr>
                                                                                                <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                    <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top">
                                                                                                        <table class="invoice-items" cellpadding="0" cellspacing="0" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; width: 100%; margin: 0;">
                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b> Product Name </b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->animal_name}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b> Quantity </b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->quantity}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"><b> Payment Type </b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->payment_type}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"><b>Total Price</b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->subtotal}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr class="total" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td class="alignright" width="80%" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 2px; border-top-color: #333; border-top-style: solid; border-bottom-color: #333; border-bottom-width: 2px; border-bottom-style: solid; font-weight: 700; margin: 0; padding: 5px 0;" align="right" valign="top">
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                           


                                                                                                            <tr style="margin-to: '50px'; font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="text-align: center;font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 5px 0;" valign="top"><b>Customer Information</b>
                                                                                                                </td>
                                                                                                            </tr>

                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b>Customer Name</b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->name}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b>Customer Email</b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->email}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b>Customer Phone</b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->phone}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b>Customer Shipment Address</b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->city}}
                                                                                                                </td>
                                                                                                            </tr>
                                                                                                            {{--  <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b>Customer Post Code</b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->post_code}}
                                                                                                                </td>
                                                                                                            </tr>  --}}
                                                                                                            {{--  <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                                                <td style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" valign="top"> <b>Customer Shipment Address</b>
                                                                                                                </td>
                                                                                                                <td class="alignright" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: right; border-top-width: 1px; border-top-color: #eee; border-top-style: solid; margin: 0; padding: 5px 0;" align="right" valign="top">{{$val->order->shipping_address}}
                                                                                                                </td>
                                                                                                            </tr>  --}}
                                                                                                           
                                                                                                        </table>
                                                                                                    </td>
                                                                                                </tr>
                                                                                            </table>
                                                                                        </td>
                                                                                    </tr>
                                                                                    <tr style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                                                                        <td class="content-block aligncenter" style="font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; text-align: center; margin: 0; padding: 0 0 20px;" align="center" valign="top">
                                                                                            <button class="btn btn-success">{{$val->order->status}}</button>
                                                                                        </td>
                                                                                    </tr>
                    
                                                                            
                                                                                </table>
                                                                            </td>
                                                                        </tr>
                                                                    </table>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                    
                                            
                    
                                        </div> <!-- container-fluid -->
                                    </div>
                                    <!-- End Page-content -->
                    
                                @endforeach
                           







                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="userDeleteModal" tabindex="-1" role="dialog" aria-labelledby="userDeleteModal"
         aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
{{--                    <h4>{{__('admin.animal.delete_user')}}</h4>--}}
                    <h4>Delete animal</h4>
                </div>
                <div class="modal-body">
                    <strong>Are You Sure Delete animal</strong>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">No</button>
                    <button type="button" class="btn btn-success btn-sm yes-btn">Yes</button>
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
        $(document).ready(function () {
            // $('#datatable-buttons').DataTable();

             var table = $('#datatable-buttons').DataTable({
               lengthChange: false,
               buttons: ['copy', 'excel', 'pdf', 'colvis']
             });

             table.buttons().container()
               .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');


            $(document).on('change', 'input[name="onoffswitch"]', function () {
                var status = 'inactive';
                var id = $(this).data('id')
                var isChecked = $(this).is(":checked");
                if (isChecked) {
                    status = 'active';
                }
                $.ajax({
                    url: "{{ route('ajax.update.animal.status') }}",
                    method: "post",
                    dataType: "html",
                    data: {'id': id, 'status': status},
                    success: function (data) {
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






            $(document).on('change', 'input[name="onoffswitchtwo"]', function () {
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
                    data: {'id': id, 'featured': featured},
                    success: function (data) {
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



            $(document).on('change', 'input[name="onoffswitchdeal"]', function () {
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
                    data: {'id': id, 'today_deal': today_deal},
                    success: function (data) {
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


            




            $(document).on('click', '.yes-btn', function () {
                var pid = $(this).data('id');
                var $this = $('.delete_' + pid)
                $.ajax({
                    url: "{{ route('animal.destroy') }}",
                    method: "delete",
                    dataType: "html",
                    data: {id: pid},
                    success: function (data) {
                        if (data === "success") {
                            $('#userDeleteModal').modal('hide')
                            $this.closest('tr').css('background-color', 'red').fadeOut();
                        }
                    }
                });
            })

            $(document).on('click', '.btn-delete', function () {
                var pid = $(this).data('id');
                $('.yes-btn').data('id', pid);
                $('#userDeleteModal').modal('show')
            });
        })
    </script>
@endsection

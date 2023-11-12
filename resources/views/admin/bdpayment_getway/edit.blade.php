@extends('layouts.admin')

@section('stylesheet')
@endsection


@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <section class="panel">
                        <header class="panel-heading">
                            <h2 class="panel-title">Create New Category</h2>
                        </header>
                        <div class="panel-body">
                            @if (\App\Helper\CustomHelper::canView('List Of User', 'Super Admin'))
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-xl-12 text-right mb-3">
                                        <a href="{{ route('category.list') }}" class="brn btn-success btn-sm">List Of
                                            Categories</a>
                                    </div>
                                </div>
                            @endif

                            @if (session()->has('status'))
                                {!! session()->get('status') !!}
                            @endif
                            {{--  <form action="{{ route('paymentgatway.payment.gateway') }}" method="post" enctype="multipart/form-data">
                                @csrf  --}}
                                <section class="content">
                                    <div class="container-fluid">
                                        <!-- Info boxes -->
                                        <div class="row">
                                            <div class="col-4">
                                                <div class="card card-primary">
                                                    <div class="card-header">
                                                        <h3 class="card-title">Aamarpay Payment gateway</h3>
                                                    </div>
                                                    <!-- /.card-header -->
                                                    <!-- form start -->
                                                    <form role="form" action="{{ route('paymentgatway.update.aamarpay') }}"
                                                        method="post">
                                                        @csrf
                                                        <input type="hidden" name="id" value="{{$aamarpay->id}}">
                                                        <div class="card-body">
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">StoreID</label>
                                                                <input type="text" class="form-control" name="store_id"
                                                                    value="{{ $aamarpay->store_id }}" required>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="exampleInputEmail1">Signature KEY</label>
                                                                <input type="text" class="form-control"
                                                                    name="signature_key"
                                                                    value="{{ $aamarpay->signature_key }}" required>
                                                            </div>
                                                        </div>
                                                        <!-- /.card-body -->
                                                        <div class="card-footer">
                                                        <button type="submit" class="btn btn-success">Update</button>
                                                        
                                                        </div>
                            </form>
                        </div> </div>
                        </div>
                </div>
                </section>
                

                <div class="row mt-4">
                    <div class="col-sm-12 text-right">
                        <button class="btn btn-danger btn-sm" type="submit">Submit</button>
                    </div>
                </div>
                {{--  </form>  --}}
            </div>
            </section>
        </div>
    </div>
    </div>
    </div>
@endsection


@section('script')
@endsection

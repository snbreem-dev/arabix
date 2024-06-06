@extends('layouts.master')
@section('title')
    @lang('Transactions')
@stop
@section('content')
    <main class="app-main"> <!--begin::App Content Header-->
        <div class="app-content-header"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">@lang('Transactions')</h3>
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content Header--> <!--begin::App Content-->
        <div class="app-content"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row"> <!--begin::Col-->
                    <div class="card mb-4">
                        <div class="card-header border-0">
                            <h3 class="card-title">@lang('Transaction details')</h3>
                            <div class="card-tools"> <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-download"></i> </a> <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-list"></i> </a> </div>
                        </div>
                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped align-middle">
                                <tbody>

                                <tr>
                                    <td>@lang('Customer')</td>
                                    <td>{{$transaction->customer->name}}</td>
                                </tr>

                                <tr>
                                    <td>@lang('Quantity')</td>
                                    <td>{{$transaction->quantity}}</td>
                                </tr>

                                <tr>
                                    <td>@lang('Price')</td>
                                    <td>{{$transaction->price}}</td>
                                </tr>


                                <tr>
                                    <td>@lang('Discount')</td>
                                    <td>{{$transaction->discount}}</td>
                                </tr>

                                <tr>
                                    <td>@lang('Taxes')</td>
                                    <td>{{$transaction->taxes}}</td>
                                </tr>

                                <tr>
                                    <td>@lang('Total price')</td>
                                    <td>{{$transaction->total_price.' ('.$transaction->currency->code.')'}}</td>
                                </tr>

                                </tbody>
                            </table>
                        </div>
                    </div> <!-- /.card -->

                    <div class="card mb-4">
                        <div class="card-header border-0">
                            <h3 class="card-title">Other transactions</h3>
                            <div class="card-tools"> <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-download"></i> </a> <a href="#" class="btn btn-tool btn-sm"> <i class="bi bi-list"></i> </a> </div>
                        </div>

                        <div class="card-body table-responsive p-0">
                            <table class="table table-striped align-middle">
                                <thead>
                                <tr>
                                    <th>@lang('Quantity')</th>
                                    <th>@lang('Price')</th>
                                    <th>@lang('Discount')</th>
                                    <th>@lang('Taxes')</th>
                                    <th>@lang('Total price')</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach(json_decode($customer_transactions) as $transaction)
                                    <tr>
                                        <td>{{$transaction->quantity}}</td>
                                        <td>{{$transaction->price}}</td>
                                        <td>{{$transaction->discount}}</td>
                                        <td>{{$transaction->taxes}}</td>
                                        <td>{{$transaction->total_price.' ('.$currencies[$transaction->currency_id].')'}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> <!-- /.card -->

                </div> <!--end::Row--> <!--begin::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content-->
    </main> <!--end::App Main--> <!--begin::Footer-->

@endsection

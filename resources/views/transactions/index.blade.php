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
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h3 class="card-title">@lang('Transactions')</h3>
                            </div> <!-- /.card-header -->
                            <div class="card-body">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th style="width: 3%">#</th>
                                        <th>@lang('Customer')</th>
                                        <th>@lang('Currency')</th>
                                        <th>@lang('Quantity')</th>
                                        <th>@lang('Price')</th>
                                        <th>@lang('Total price')</th>
                                        <th>@lang('Discount')</th>
                                        <th>@lang('Taxes')</th>
                                        <th></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($transactions as $transaction)
                                        <tr class="align-middle">
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$transaction->customer->name}}</td>
                                            <td>{{$transaction->currency->name}}</td>
                                            <td>{{$transaction->price}}</td>
                                            <td>{{$transaction->total_price.' ('.$transaction->currency->code.')'}}</td>
                                            <td>{{$transaction->discount}}</td>
                                            <td>{{$transaction->taxes}}</td>
                                            <td>
                                                <a href="{{route('dashboard.transactions.show',$transaction->id)}}">
                                                    <i class="bi bi-folder2-open me-2"></i>
                                                </a>

                                                <a class="confirm-delete" href="{{route('dashboard.transactions.destroy',$transaction->id)}}">
                                                    <i class="bi bi-trash me-2 link-danger"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                            </div> <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                    {{$transactions->links()}}
                            </div>
                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!--end::Row--> <!--begin::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content-->
    </main> <!--end::App Main--> <!--begin::Footer-->

@endsection

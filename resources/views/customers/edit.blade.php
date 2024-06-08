@extends('layouts.master')
@section('title')
    @lang('Customers')
@stop
@section('content')
    <main class="app-main"> <!--begin::App Content Header-->
        <div class="app-content-header"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="mb-0">@lang('Customers')</h3>
                    </div>
                </div> <!--end::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content Header--> <!--begin::App Content-->
        <div class="app-content"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Row-->
                <div class="row"> <!--begin::Col-->
                    <div class="col-md-12">
                        <div class="card mb-4">
                            <div class="card card-primary card-outline mb-4"> <!--begin::Header-->
                                <div class="card-header">
                                    <div class="card-title">@lang('Edit customer')</div>
                                </div> <!--end::Header--> <!--begin::Form-->
                                <form id="update-customer-form"> <!--begin::Body-->
                                    @csrf
                                    <div class="card-body">
                                        <div class="row g-3">
                                            <div class="col-md-6">
                                                <label for="name" class="form-label">@lang('Name')</label>
                                                <input type="text" class="form-control" name="name"
                                                       value="{{$customer->name}}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="email" class="form-label">@lang('Email')</label>
                                                <input type="email" class="form-control" name="email"
                                                       value="{{$customer->email}}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">@lang('Phone')</label>
                                                <input type="text" class="form-control" name="phone"
                                                       value="{{$customer->phone}}">
                                            </div>

                                            <div class="col-md-6">
                                                <label for="language_id" class="form-label">@lang('Language')</label>
                                                <select class="form-select select2" name="language_id" required>
                                                    @foreach($languages as $language)
                                                        <option
                                                            value="{{$language->id}}" {{$language->id == $customer->language_id ? 'selected' : ''}}>{{$language->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="currency_id" class="form-label">@lang('Currency')</label>
                                                <select class="form-select select2" name="currency_id" required>
                                                    @foreach($currencies as $currency)
                                                        <option
                                                            value="{{$currency->id}}" {{$currency->id == $customer->currency_id ? 'selected' : ''}}>{{$currency->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            <div class="col-md-6">
                                                <label for="phone" class="form-label">@lang('Communication')</label>
                                                @php
                                                    // convert customer cummunication from json to array
                                                    $customerCommunications = json_decode($customer->communications,true);
                                                @endphp
                                                @foreach($communications as $communication)

                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" name="communication[{{$communication->id}}]"
                                                        {{array_key_exists($communication->id, $customerCommunications) && $customerCommunications[$communication->id] == (integer)true ? 'checked' : ''}}>
                                                        <label class="form-check-label" for="communication[{{$communication->id}}]">
                                                            {{$communication->name}}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div> <!--end::Body--> <!--begin::Footer-->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary"
                                                id="update-customer-btn">@lang('Update')</button>
                                    </div> <!--end::Footer-->
                                </form> <!--end::Form-->
                            </div> <!--end::Quick Example--> <!--begin::Input Group-->

                        </div> <!-- /.card -->
                    </div> <!-- /.col -->
                </div> <!--end::Row--> <!--begin::Row-->
            </div> <!--end::Container-->
        </div> <!--end::App Content-->
    </main> <!--end::App Main--> <!--begin::Footer-->

@endsection

@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet"/>
@endsection

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        $('.select2').select2();

        $('#update-customer-btn').click(function (e) {
            e.preventDefault();
            url = '{{route('dashboard.customers.update',$customer->id)}}'
            data = $('#update-customer-form').serialize();

            updateRecord(url, data);
        });

    </script>
@endsection

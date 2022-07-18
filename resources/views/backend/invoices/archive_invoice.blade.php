@extends('layouts.backend.master')

@section('css')
@endsection

@section('title')
    {{__('website/invoice.archive invoices')}}
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0">{{__('website/invoices.invoice')}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{__('website/invoice.invoice-title')}}</a></li>
                    <li class="breadcrumb-item active">{{__('website/invoice.invoice')}}</li>
                </ol>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">

                    @include('backend.message')

                    @can('create invoice')
                     <div class="row">
                        <div class="col mb-3">
                            <h3>{{__('website/invoice.archive invoices')}}</h3>
                        </div>
                    </div>
                    @endcan

                    <div class="table-responsive">
                        <table id="datatable" class="table table-striped table-bordered p-0 text-center table-hover">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>{{__('website/invoice.invoice-num')}}</th>
                                <th>{{__('website/invoice.invoice-date')}}</th>
                                <th>{{__('website/invoice.category')}}</th>
                                <th> {{__('website/invoice.product')}} </th>
                                <th>{{__('website/invoice.price')}}</th>
                                <th>{{__('website/invoice.discount')}}</th>
                                <th>{{__('website/invoice.tax-rate')}}</th>
                                <th>{{__('website/invoice.tax-value')}}</th>
                                <th>{{__('website/invoice.tax-status')}}</th>
                                <th>{{__('website/invoice.total')}}</th>
                                <th>{{__('website/invoice.operation')}}</th>
                                {{-- <th>{{__('website/invoice.print')}}</th> --}}
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($invoices as $invoice)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$invoice->invoice_number}}</td>
                                    <td>{{$invoice->invoice_date}}</td>
                                    <td>{{$invoice->categorie->name}}</td>
                                    <td>{{$invoice->product->name}}</td>
                                    <td>{{$invoice->price}}</td>
                                    <td>{{$invoice->discount}}</td>
                                    <td>{{$invoice->tax_rate}}</td>
                                    <td>{{$invoice->tax_value}}</td>
                                    <td class={{$invoice->status == 1 ? 'text-danger':'text-success'}}>{{$invoice->status == 1 ? __('website/invoice.unpaid'):__('website/invoice.paid')}}</td>
                                    <td>{{$invoice->total}}</td>
                                    <td>
                                        <div class="btn-group mb-1">
                                            <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{__('website/invoice.operation')}}</button>
                                        <div class="dropdown-menu">

                                            <a class="dropdown-item" href="#" data-invoice_id="{{ $invoice->id }}" data-toggle="modal"
                                                 data-target="#Transfer_invoice"><i class="text-primary ti-files"></i> {{__('website/invoice.restore')}}</a>
                                            {{-- <a class="dropdown-item" href="#"><i class="text-secondary ti-info"></i> details</a> --}}
                                            <a class="dropdown-item" data-invoice_id="{{$invoice->id}}" data-toggle="modal" data-target="#deletedinvoice" 
                                                href="#"><i class="fa fa-trash" title="{{__('website/invoice.delete')}}"></i>{{__('website/invoice.delete')}}</a>
                                        </div>
                                        </div>
                                    </td>
                                    {{-- <td>
                                        <a href="{{route('print',$invoice->id)}}" class="btn btn-success btn-sm"
                                           title="{{__('website/invoice.print')}}" role="button" aria-pressed="true">{{__('website/invoice.print')}}</a>
                                    </td> --}}
                                </tr>
                                @include('backend.invoices.change_status')
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('backend.invoices.deleted')

        <div class="modal fade" id="Transfer_invoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">{{__('website/invoice.cancel archive invoices')}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    <form action="{{ route('archive.update', 'test') }}" method="post">
                            {{ method_field('patch') }}
                            {{ csrf_field() }}
                    </div>
                    <div class="modal-body">
                        {{__('website/invoice.sure archive invoices')}}
                        <input type="hidden" name="invoice_id" id="invoice_id" value="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{__('website/invoice.cancel')}}</button>
                        <button type="submit" class="btn btn-success">{{__('website/invoice.confirm')}}</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection

@section('js')
    <script>
        $('#deletedinvoice').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>

    <script>
        $('#Transfer_invoice').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })
    </script>
@endsection

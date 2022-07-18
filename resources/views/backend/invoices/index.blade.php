@extends('layouts.backend.master')

@section('css')
@endsection

@section('title')
    {{__('website/invoice.invoice-title')}}
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
                            <a href="{{route('invoice.create')}}" class="btn btn-success" role="button" aria-pressed="true">{{__('website/invoice.create-invoice')}}</a>
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
                                <th>{{__('website/invoice.print')}}</th>
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
                                        @can('edit invoice')                                            
                                        <a href="{{route('invoice.edit',$invoice->id)}}" class="btn btn-info btn-sm"
                                           title="{{__('website/invoice.edit')}}" role="button" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        @endcan
                                        
                                        @can('payment invoice')
                                        @php
                                            $array_of_invoices_ids = App\Models\invoice_details::groupBy('invoice_id')->pluck('invoice_id');
                                            // dd($array_of_invoices_ids)
                                        @endphp
                                        @if(in_array($invoice->id,$array_of_invoices_ids->toArray()))
                                        <button class="btn btn-warning btn-sm" title="{{__('website/invoice.change payment stat')}}" 
                                            data-toggle="modal" data-target="#Payment_status_change{{$invoice->id}}"><i class="fa fa-trash"></i>
                                        </button>
                                        @endif
                                        @endcan 
                                        {{-- @can('archive invoice')                                            
                                        <button class="btn btn-warning btn-sm" data-invoice_id="{{$invoice->id}}"
                                                data-toggle="modal" data-target="#archiveinvoice"><i class="fa fa-trash" title="{{__('website/invoice.delete')}}"></i></button>
                                        @endcan --}}
                                        @can('delete invoice')                                            
                                        <button class="btn btn-danger btn-sm" data-invoice_id="{{$invoice->id}}"
                                            data-toggle="modal" data-target="#archiveinvoice"><i class="fa fa-trash" title="{{__('website/invoice.delete')}}"></i></button>
                                        @endcan
                                    </td>
                                    <td>
                                        @can('print invoice')                                            
                                        <a href="{{route('print',$invoice->id)}}" class="btn btn-success btn-sm"
                                           title="{{__('website/invoice.print')}}" role="button" aria-pressed="true">{{__('website/invoice.print')}}</a>
                                        @endcan        
                                    </td>
                                @include('backend.invoices.change_status')
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        @include('backend.invoices.deleted')

    </div>
    <!-- row closed -->
@endsection

@section('js')
    <script>
        $('#archiveinvoice').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget)
            var invoice_id = button.data('invoice_id')
            var modal = $(this)
            modal.find('.modal-body #invoice_id').val(invoice_id);
        })

        $( function() {
            $('.datapicker_test').datepicker();        
        });
    </script>
@endsection

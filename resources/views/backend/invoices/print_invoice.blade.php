@extends('layouts.backend.master')
@section('css')
    <style>
        @media print {
            #print_Button {
                display: none;
            }
        }
    </style>
@endsection
@section('title')
    {{__('website/invoice.print invoice')}}
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">{{__('website/invoice.invoice')}}</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ {{__('website/invoice.print invoice')}}</span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row row-sm">
        <div class="col-md-12 col-xl-12">
            <div class=" main-content-body-invoice" id="print">
                <div class="card card-invoice">
                    <div class="card-body">
                        <div class="invoice-header">
                            <h1 class="invoice-title">{{__('website/invoice.print invoice')}}</h1>
                            <div class="billed-from">
                                @php
                                    $data = Auth::user();
                                @endphp
                                <h6>{{$data->name}}</h6>
                                <p>{{__('website/invoice.address')}} :<br>
                                    {{__('website/invoice.phone')}} : 324 445-4544<br>
                                    {{__('website/users.Email')}}: {{$data->email}}</p>
                            </div><!-- billed-from -->
                        </div><!-- invoice-header -->
                        <div class="row mg-t-20">
                            <div class="col-md">
                                <label class="tx-gray-600">Billed To</label>
                                <div class="billed-to">
                                    <h6>Juan Dela Cruz</h6>
                                    <p>{{__('website/invoice.address')}} :<br>
                                         {{__('website/invoice.phone')}} : 324 445-4544<br>
                                        {{__('website/users.Email')}}: youremail@companyname.com</p>
                                </div>
                            </div>
                            <div class="col-md">
                                {{-- <label class="tx-gray-800"></label> --}}
                                <h6>{{__('website/invoice.invoice information')}}</h6>
                                <p class="invoice-info-row"><span>{{__('website/invoice.invoice-num')}}</span> : <span>{{ $invoices->invoice_number }}</span></p>
                                <p class="invoice-info-row"><span> {{__('website/invoice.invoice date')}}</span> : <span>{{ $invoices->invoice_date }}</span></p>
                                <p class="invoice-info-row"><span> {{__('website/invoice.payment date')}}</span> : <span>{{ $invoices->invoice_details->payment_date }}</span></p>
                                <p class="invoice-info-row"><span>{{__('website/invoice.category')}}</span> : <span>{{ $invoices->categorie->name }}</span></p>
                            </div>
                        </div>
                        <div class="table-responsive mg-t-40">
                            <table class="table table-invoice border text-md-nowrap mb-0">
                                <thead>
                                    <tr>
                                        <th class="wd-20p">#</th>
                                        <th class="wd-40p">{{__('website/invoice.product')}}</th>
                                        <th class="tx-center">{{__('website/invoice.price')}}</th>
                                        <th class="tx-right">{{__('website/invoice.discount')}}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td class="">{{ $invoices->product->name }}</td>
                                        <td class="tx-center">{{ number_format($invoices->product->price, 2) }}</td>
                                        <td class="tx-right">{{ number_format($invoices->discount, 2) }}</td>
                                        @php
                                        $total_dis = $invoices->price - $invoices->discount ;
                                        @endphp
                                    </tr>

                                    <tr>
                                        <td class="valign-middle" colspan="2" rowspan="4">
                                            <div class="invoice-notes">
                                                <label class="main-content-label tx-13 text-center"></label>
                                                {{-- <p>{{$invoices->notes}}</p> --}}
                                            </div><!-- invoice-notes -->
                                        </td>
                                        <th class="tx-right">{{__('website/invoice.total-after-dis')}}</th>
                                        <td class="tx-right" colspan="2"> {{ number_format($total_dis, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="tx-right">{{__('website/invoice.tax-rate')}}</th>
                                        <td class="tx-right" colspan="2">{{$invoices->tax_rate}}</td>
                                    </tr>
                                    <tr>
                                        <th class="tx-right">{{__('website/invoice.tax-value')}}</th>
                                        <td class="tx-right" colspan="2"> {{ number_format($invoices->tax_value, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <th class="tx-right tx-uppercase tx-bold tx-inverse"><h4>{{__('website/invoice.total')}}</h4></th>
                                        <td class="tx-right" colspan="2">
                                            @php    
                                                $total = $total_dis + $invoices->tax_value;
                                            @endphp 
                                            <h4 class="tx-primary tx-bold">{{ number_format($invoices->total, 2) }} EGP</h4>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                        <hr class="mg-b-40">
                        
                        <button class="btn btn-danger  float-left mt-3 mr-2" id="print_Button" onclick="printDiv()"> <i
                                class="mdi mdi-printer ml-1"></i>{{__('website/invoice.print')}}</button>
                    </div>
                </div>
            </div>
        </div><!-- COL-END -->
    </div>
    <!-- row closed -->
@endsection
@section('js')
    <!--Internal  Chart.bundle js -->
    <script src="{{ URL::asset('backend/assets/js/chart.js/Chart.bundle.min.js') }}"></script>


    <script type="text/javascript">
        function printDiv() {
            var printContents = document.getElementById('print').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
            location.reload();
        }
    </script>

@endsection
@extends('layouts.backend.master')

@section('title')
    {{__('website/invoice.update invoice num')}} {{$invoice->invoice_number}}
@endsection

@section('css')

@endsection

@section('content')

    <div class="page-title">
        <div class="row">
            <div class="col-sm-6">
                <h4 class="mb-0"> {{__('website/invoice.update invoice num')}} {{$invoice->invoice_number}}</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                    <li class="breadcrumb-item"><a href="#" class="default-color">{{__('website/dashboard.Home')}}</a></li>
                    <li class="breadcrumb-item active">{{__('website/invoice.invoices menu')}}</li>
                </ol>
            </div>
        </div>
    </div>

    @include('backend.message')

    <!-- main body -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <form action="{{route('invoice.update',$invoice->id)}}" method="post" autocomplete="off">
                        @method('PUT')
                        @csrf
                        <div class="row">
                            <div class="col">
                                <label>{{__('website/invoice.invoice-num')}}</label>
                                <input type="text" name="invoice_number" value="{{$invoice->invoice_number}}"
                                       class="form-control @error('invoice_number') is-invalid @enderror" required>
                                @error('invoice_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col">
                                <label>{{__('website/invoice.invoice-date')}}</label>
                                <input class="form-control" type="text" value="{{$invoice->invoice_date}}" id="datepicker-action" name="invoice_date" data-date-format="yyyy-mm-dd" title="يرجي ادخال تاريخ الفاتورة" required>
                                @error('invoice_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div><br>

                        <div class="row">

                            <div class="col">
                                <label>{{__('website/category.categories')}}</label>
                                <select name="categorie_id" class="form-control p-1  @error('categorie_id') is-invalid @enderror" required>
                                    <option value="" disabled selected> {{__('website/invoice.choose-menu')}}</option>
                                    @foreach($categories as $categorie)
                                        <option value="{{$categorie->id}}" {{$invoice->categorie_id == $categorie->id ? 'selected':'' }}>{{$categorie->name}}</option>
                                    @endforeach
                                </select>
                                @error('categorie_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{__('website/invoice.product')}}</label>
                                <select name="product_id"  class="form-control p-1 @error('product_id') is-invalid @enderror">
                                    <option value="{{$invoice->product_id}}" selected>{{$invoice->product->name}}</option>
                                </select>
                                @error('product_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{__('website/invoice.price')}}</label>
                                <input type="number" name="price" id="price" value="{{$invoice->price}}" readonly  class="form-control @error('amount_collection') is-invalid  @enderror">
                                @error('price')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{__('website/invoice.discount')}}</label>
                                <input type="number" name="discount" id="discount" value="{{$invoice->discount}}" onkeyup="myFunction2()"  class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{__('website/invoice.total-after-dis')}}</label>
                                <input type="number" name="total_after_discount" id="total_after_discount" value="0" readonly  class="form-control @error('discount') is-invalid @enderror">
                                @error('discount')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div><br>

                        <div class="row">

                            <div class="col-6">

                                <label>{{__('website/invoice.tax-rate')}}</label>
                                <select name="tax_rate" id="tax_rate" class="form-control p-1" onchange="myFunction1()">
                                    <option value="" selected disabled>{{__('website/invoice.select-tax-rate')}}</option>
                                    <option value="{{$invoice->tax_rate}}" {{$invoice->tax_rate == "5%" ? 'selected':''}}>5%</option>
                                    <option value="{{$invoice->tax_rate}}" {{$invoice->tax_rate == "10%" ? 'selected':''}}>10%</option>
                                </select>
                                @error('tax_rate')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>


                            <div class="col">
                                <label>{{__('website/invoice.tax-value')}}</label>
                                <input type="number" name="tax_value" value="{{$invoice->tax_value}}" id="tax_value" class="form-control @error('value_vat') is-invalid @enderror">
                                @error('tax_value')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col">
                                <label>{{__('website/invoice.total')}}</label>
                                <input type="number" name="total" id="total" value="{{$invoice->total}}" class="form-control @error('total') is-invalid @enderror">
                                @error('total')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                        </div>
                        <br>

                        <div class="row">
                            <div class="col">
                                <label>{{__('website/category.notes')}}</label>
                                <textarea rows="5" class="form-control" name="notes"></textarea>
                            </div>
                        </div><br>
                        <div class="row">
                            <div class="col">
                                <button class="btn btn-success">{{__('website/category.save')}}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endsection

            @section('js')

                {{-- get products --}}
                <script>
                    $(document).ready(function() {
                        $('select[name="categorie_id"]').on('change', function() {
                            var categorie_id = $(this).val();
                            if (categorie_id) {
                                $.ajax({
                                    url: "{{ URL::to('product') }}/" + categorie_id
                                    , type: "GET"
                                    , dataType: "json"
                                    , success: function(data) {
                                        $('select[name="product_id"]').empty();
                                        $('input[name="price"]').val(0);
                                        $('select[name="product_id"]').append('<option selected disabled > -- اختر من القائمه --</option>');
                                        $.each(data, function(key, value) {
                                            $('select[name="product_id"]').append('<option value="' + key + '">' + value + '</option>');
                                        });
                                    }
                                    , });

                            } else
                            {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
                </script>

                {{-- get price --}}
                <script>
                    $(document).ready(function() {
                        $('select[name="product_id"]').on('change', function() {
                            var product_id = $(this).val();
                            if (product_id) {
                                $.ajax({
                                    url: "{{ URL::to('product/price') }}/" + product_id
                                    , type: "GET"
                                    , dataType: "json"
                                    , success: function(data) {
                                        $('input[name="price"]').val(data);
                                    }
                                });

                            } else
                            {
                                console.log('AJAX load did not work');
                            }
                        });
                    });
                </script>


                {{-- get price --}}
                <script>
                    function myFunction1(){
                        var total_after_discount = parseFloat(document.getElementById("total_after_discount").value);
                        var tax_rate = parseFloat(document.getElementById("tax_rate").value);
                        {{-- tax_value --}}
                        var cal_tax_value = total_after_discount * tax_rate /100;
                        {{-- total with tax --}}
                        var final_total = parseFloat(cal_tax_value + total_after_discount);
                        document.getElementById("tax_value").value = parseFloat(cal_tax_value).toFixed(2);
                        document.getElementById("total").value = parseFloat(final_total).toFixed(2);
                    }

                    function myFunction2() {
                        var price =  parseFloat(document.getElementById("price").value);
                        var discount =  parseFloat(document.getElementById("discount").value);
                        document.getElementById("total_after_discount").value = price-discount;
                    }

                </script>

@endsection

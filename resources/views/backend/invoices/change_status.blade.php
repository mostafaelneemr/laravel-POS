<!-- change status -->
<div class="modal fade" id="Payment_status_change{{$invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('website/invoice.change payment stat')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('Payment_status_change')}}" method="post" autocomplete="off">
                @csrf
                <div class="modal-body">
                    <input type="hidden" name="invoice_id" id="invoice_id" value="{{$invoice->id}}">

                    <div class="col">
                        <label for="exampleFormControlSelect1">{{__('website/invoice.payment status')}}</label>
                        <select class="form-control" name="status" id="status">
                            <option value="" selected disabled>{{__('website/invoice.choose-menu')}}</option>
                            <option value=1>{{__('website/invoice.unpaid')}}</option>
                            <option value=2>{{__('website/invoice.done payment')}}</option>
                        </select>
                    </div>

                    <div id="payment">
                        <div class="col">
                            <label>{{__('website/invoice.payment date')}}</label>
                            <input class="form-control datapicker_test" type="text"  id="datepicker-action" name="payment_date" data-date-format="yyyy-mm-dd" title="{{__('website/invoice.enter payment date')}}">
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('website/category.close')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('website/invoice.confirm')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

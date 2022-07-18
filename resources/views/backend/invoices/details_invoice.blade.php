<!-- delete -->
<div class="modal fade" id="detailsinvoice" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h2>payment date </h2>
            </div>
            <div class="modal-body">                    
                <span class={{$invoice->status == 1 ? 'text-danger':'text-success'}}>
                    {{$invoice->status == 1 ? __('website/invoice.unpaid'): $invoice->invoice_details->payment_date}}
                </span>
                <input type="text" name="invoice_id" id="invoice_id" value="">
            </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              </div>

        </div>
    </div>
</div>

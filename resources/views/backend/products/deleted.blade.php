<!-- delete -->
<div class="modal fade" id="deletedproduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{__('website/product.delete product')}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{route('products.destroy','test')}}" method="post">
                {{method_field('delete')}}
                {{csrf_field()}}
                <div class="modal-body">
                    <p class="text-center">
                    <h6 style="color:red">{{__('website/product.confirm from delete')}}</h6>
                    </p>
                    <input type="hidden" name="pro_id" id="pro_id" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{__('website/product.cancel')}}</button>
                    <button type="submit" class="btn btn-danger">{{__('website/product.confirm')}}</button>
                </div>
            </form>
        </div>
    </div>
</div>

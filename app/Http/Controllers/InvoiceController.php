<?php
namespace App\Http\Controllers;

use App\Http\Requests\invoice\StoreInvoiceRequest;
use App\Http\Requests\invoice\UpdateInvoiceRequest;
use App\Models\category;
use App\Models\invoice;
use App\Models\invoice_details;
use App\Models\product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Notifications\AddInvoice;
use Illuminate\Support\Facades\Notification;

class InvoiceController extends Controller
{

    function __construct()
    {
        $this->middleware('permission:invoices|create invoice|edit invoice|delete invoice', ['only' => ['index','store']]);
        $this->middleware('permission:create invoice', ['only' => ['create','store']]);
        $this->middleware('permission:print invoice', ['only' => ['print_invoice']]);
        $this->middleware('permission:edit invoice', ['only' => ['edit','update']]);
        $this->middleware('permission:delete invoice', ['only' => ['destroy']]);
    }

    public function index()
    {
        $invoices = invoice::all();
        return view('backend.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $categories = category::all();
        return view('backend.invoices.create', compact('categories'));
    }

    public function store(StoreInvoiceRequest $request)
    {
        DB::beginTransaction();
        try {

          $invoice = invoice::create([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'categorie_id' => $request->categorie_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);

            invoice_details::create([
                'invoice_id'=>$invoice->id,
                'status'=>1,
                'user_id'=>auth()->user()->id,
            ]);
            // notify add invoice
            $user = User::get();
            $invoice = invoice::latest()->first();
            Notification::send($user, new AddInvoice($invoice));
            // $user->notify(new AddInvoice($invoice));

            DB::commit();
            session()->flash('Add', __('backend/message.add invoice'));
            return redirect()->back();

        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $invoice = invoice::findorFail($id);
        $categories = category::all();
        return view('backend.invoices.edit', compact('categories', 'invoice'));
    }

    public function update(UpdateInvoiceRequest $request, $id)
    {
        try {
            $invoice = invoice::findorFail($id);

            $invoice->update([
                'invoice_number' => $request->invoice_number,
                'invoice_date' => $request->invoice_date,
                'categorie_id' => $request->categorie_id,
                'product_id' => $request->product_id,
                'price' => $request->price,
                'discount' => $request->discount,
                'tax_rate' => $request->tax_rate,
                'tax_value' => $request->tax_value,
                'total' => $request->total,
                'status' => 1,
                'notes' => $request->notes,
            ]);
            session()->flash('edit', __('backend/message.edit invoice'));
            return redirect()->route('invoice.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try{
            $id = $request->invoice_id;
            $invoices = invoice::where('id', $id)->where('status',2)->first();
            if($invoices){
            $invoices->Delete();
            session()->flash('Deleted', __('website/invoice.delete invoice'));
            return redirect()->back();
            }else{
                return redirect()->back()->withErrors(['error' => __('website/invoice.cant delete')]);
            }
        } catch(\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // get proudect with category
    public function getProduct($id)
    {
        $products = product::where('categorie_id', $id)->pluck('name', 'id');
        return $products;
    }

     // get proudect with category
    public function getPrice($id)
    {
        $price = product::where('id', $id)->first()->price;
        return $price;
    }

     public function payment_statusChange(Request $request)
    {
        DB::beginTransaction();
        try {

            $invoice= invoice::findorFail($request->invoice_id);
            $invoice->update([
                'status'=>$request->status,
            ]);
            // validate payment
            // $todayDate = date('m/d/Y');
            // $this->validate($request, [

            //     'payment_date' => 'before_or_equal:'.$todayDate,
            // ]);

            $Details = invoice_details::findOrFail($request->invoice_id);
            $Details->update([
                'invoice_id'=>$request->invoice_id,
                'status'=>$request->status,
                'payment_date'=>$request->payment_date,
                'user_id'=>auth()->user()->id,
            ]);

            DB::commit();
            session()->flash('Edit', __('backend/message.change stat invoice'));
            return redirect()->back();

        }
        catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // print invoice
    public function print_invoice($id)
    {
        $status = invoice::where('id', $id)->where('status', 2)->first();
        if($status){
            $invoices = invoice::with('invoice_details')->where('id', $id)->first();
            return view('backend.invoices.print_invoice', compact('invoices'));
        }else {
            session()->flash('Deleted', 'error can\'t print after paid');
            return redirect()->back();
        }
    }

    // read all notification
    public function markAsRead_All(Request $request)
    {
        $userUnreadNotification = auth()->user()->unreadNotifications;
        if ($userUnreadNotification) {
            $userUnreadNotification->markAsRead();
            return back();
        }
    }

}

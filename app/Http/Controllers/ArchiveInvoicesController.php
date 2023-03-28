<?php

namespace App\Http\Controllers;

use App\Models\invoice;
use Illuminate\Http\Request;

class ArchiveInvoicesController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:invoices|archive invoice', ['only' => ['index', 'update', 'destroy']]);
    }

    public function index()
    {
        $invoices = invoice::onlyTrashed()->get();
        return view('backend.invoices.archive_invoice', compact('invoices'));
    }

    public function update(Request $request, $id)
    {
        $id = $request->invoice_id;
        invoice::withTrashed()->where('id', $id)->restore();
        session()->flash('Edit', __('website/invoice.invoice restore'));
        return redirect(route('invoice.index'));
    }

    public function destroy(Request $request)
    {
        $id = $request->invoice_id;
        invoice::withTrashed()->where('id', $id)->forceDelete();
        session()->flash('Deleted', __('website/invoice.delete invoice'));
        return redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:Products|create product|edit product|delete product', ['only' => ['index','store']]);
        $this->middleware('permission:create product', ['only' => ['create','store']]);
        $this->middleware('permission:edit product', ['only' => ['edit','update']]);
        $this->middleware('permission:delete product', ['only' => ['destroy']]);
    }

    public function index()
    {
        $products = product::get();
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $categories = category::get();
        return view('backend.products.create',compact('categories'));
    }

    public function store(StoreProductRequest $request)
    {
        try {
            product::create([
                'name'=> ['ar' =>$request->name, 'en' => $request->name_en],
                'price'=>$request->price,
                'categorie_id'=>$request->categorie_id,
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', __('backend/message.add product'));
            return redirect()->back();

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function edit($id)
    {
        $product = product::findorfail($id);
        $categories = category::get();
        return view('backend.products.edit',compact('product' , 'categories'));
    }

    public function update(StoreProductRequest $request, $id)
    {
        $products = product::findorfail($id);

        try {

            $products->update([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'price'=>$request->price,
                'categorie_id'=>$request->categorie_id,
                'notes'=>$request->notes,
            ]);
            session()->flash('edit', __('backend/message.edit product'));
            return redirect()->route('products.index');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            product::destroy($request->pro_id);
            session()->flash('Deleted', __('backend/message.delete product'));
            return redirect('products');
        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}

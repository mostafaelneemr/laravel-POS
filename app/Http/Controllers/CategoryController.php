<?php

namespace App\Http\Controllers;

use App\Http\Requests\storeCategoryRequest;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{ 
    public function index()
    {
        $categories = category::all();
        return view('backend.categories.index', compact('categories') );
    }
   
    public function store(storeCategoryRequest $request)
    {
        try {

            category::create([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);
            session()->flash('Add',  __('backend/message.add category') );
            return redirect('categories');
        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function update(storeCategoryRequest $request)
    {
        $categorie = category::findorfail($request->id);

        try {

            $categorie->update([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);

            session()->flash('edit', __('backend/message.edit category'));
            return redirect()->back();

        }
        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function destroy($id)
    {
        try {
            category::destroy($id);
            session()->flash('Deleted', __('backend/message.delete category'));
            return redirect('categories');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
            }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::all();
        $section = Section::get();
        return view('products.index',compact('products','section'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $section = Section::get();
        return view('products.add',compact('section'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        $products = new Product();
        $products->product_name = $request->product_name;
        $products->section_id = $request->section_id;
        $products->description = $request->description;

        $products->save();
        return redirect()->route('products.index')->with('success', 'تم أضافة المنتج بنجاح');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $section = Section::get();
        return view('products.edit',compact('section'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, string $id)
    {

        $products = $request->validate([
            'product_name'=>'required|min:3|max:200',
            'section_id'=>'nullable|exists:sections,id',
            'description'=>'nullable',
        ],[
            'product_name.required'=>'أسم المنتج مطلوب',
            'product_name.min'=>'يجب ان يكون أسم المنتج أكثر من 3 أحرف',
            'section_name.max'=>'يجب ان يكون أسم المنتج أقل من 200 حرف',
            ########################################################
            'description.min'=>'يجب ان يكون حقل الموبايل 3 رقم',
            'description.max'=>'يجب ان يكون حقل الموبايل 200 رقم',
        ]);
        $products = Product::find($request->id);

        $products->update([
            $products->product_name = $request->product_name,
            $products->section_id = $request->section_id,
            $products->description = $request->description,
        ]);



        return redirect()->route('products.index')->with('success', 'تم تعديل المنتج بنجاح');
    }

    /**
     * Remove the specified resource from storage.
     */

     public function destroy(Request $request)
     {
         Product::findOrFail($request->id)->delete();

         // Return a response indicating success
         session()->flash('success', 'تم حذف المنتج بنجاح');
         return redirect()->route('products.index');
     }
}

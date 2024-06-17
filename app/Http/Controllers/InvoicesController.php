<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoicesController extends Controller
{

    public function index()
    {
        return view('invoices.index');
    }


    public function create()
    {
        $sections = Section::all();
        $products = Product::all();
        return view('invoices.add', compact('products', 'sections'));

    }


    public function store(Request $request)
    {
        //
    }

 
    public function show(string $id)
    {
        //
    }

 
    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }

    public function getProducts($id)
    {                                                                                         //يقطف
        $products = DB::table("products")->where("section_id", $id)->pluck("product_name", "id");
        return json_encode($products);
    }
    
}

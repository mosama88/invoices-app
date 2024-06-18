<?php

namespace App\Http\Controllers;

use App\Models\Invoices;
use App\Models\InvoicesDetail;
use App\Models\Product;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        Invoices::create([
            'invoice_number'=>$request->invoice_number,
            'invoice_date'=>$request->invoice_date,
            'due_date'=>$request->due_date,
            'product'=>$request->product,
            'section_id'=>$request->section_id,
            'amount_collection'=>$request->amount_collection,
            'amount_Commission'=>$request->amount_Commission,
            'discount'=>$request->discount,
            'rate_vat'=>$request->rate_vat,
            'value_vate'=>$request->value_vate,
            'total'=>$request->total,
            'status'=>'غير مدفوعه',
            'value_status'=>2,
            'note'=>$request->note,
        ]);

        $invoices_id = Invoices::latest()->first()->id;
        InvoicesDetail::create([
            'invoice_id' => $invoices_id,
            'invoice_number' => $request->invoice_number,
            'product' => $request->product,
            'section_id' => $request->section_id,
            'status' => 'غير مدفوعة',
            'value_Status' => 2,
            'note' => $request->note,
            'user' => (Auth::user()->name),
        ]);


//payment_Date

        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        return back();
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

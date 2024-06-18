<?php

namespace App\Http\Controllers;

use App\Models\invoiceAttachment;
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
        $invoices = Invoices::orderBy('created_at', 'desc')->get();
        return view('invoices.index', compact('invoices'));
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

        if ($request->hasFile('pic')) {
            $invoice_id = Invoices::latest()->first()->id;
            $image = $request->file('pic');
            $file_name = $image->getClientOriginalName();
            $invoice_number = $request->invoice_number;

            $attachments = new invoiceAttachment();
            $attachments->file_name = $file_name;
            $attachments->invoice_number = $invoice_number;
            $attachments->created_by = Auth::user()->name;
            $attachments->invoice_id = $invoice_id;
            $attachments->save();

            // move pic
            $imageName = $request->pic->getClientOriginalName();
            $request->pic->move(public_path('Attachments/' . $invoice_number), $imageName);
        }

//payment_Date

        session()->flash('Add', 'تم اضافة الفاتورة بنجاح');
        return redirect()->route('Invoices');
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

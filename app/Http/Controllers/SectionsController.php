<?php

namespace App\Http\Controllers;

use App\Models\Sections;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\SectionsRequest;

class SectionsController extends Controller
{
   
    public function index()
    {
        $sections = Sections::orderBy('created_at', 'desc')->get();
        return view('sections.index', ['sections'=>$sections]);
    }

   
    public function create()
    {
        return view('sections.add');

    }

  
    public function store(SectionsRequest $request)
    {
        $sections = new Sections();
        $sections->section_name = $request->section_name;
        $sections->description = $request->description;
        $sections->created_by = Auth::user()->name;
        
        $sections->save();
        return redirect()->route('sections.index')->with('success', 'تم أضافة قسم بنجاح');
        // $input = $request->all();
        // $b_exists = Sections::where('section_name', '=',$input['section_name'])->exists();


        // if($b_exists){
        //     session()->flash('Error','خطأ. القسم مسجل مسبقآ');
        //     return redirect('sections');
        // }else{
        //     Sections::create([
        //         'section_name'=>$request->section_name,
        //         'description'=>$request->description,
        //         'created_by'=>Auth::user()->name,
        //     ]);
        //     session()->flash('success','تم أضافة القسم بنجاح');
        //     return redirect('sections');
        // }



    }

 
    public function show(Sections $sections)
    {
        //
    }


    public function edit(Sections $sections)
    {
        return view('sections.edit');
    }


    public function update(Request $request)
    {

        // $input = $request->all();
        // $b_exists = Sections::where('section_name', '=',$input['section_name'])->exists();


        // if($b_exists){
        //     session()->flash('Error','خطأ. القسم مسجل مسبقآ');
        //     return redirect('sections');
        // }else{
        //     Sections::create([
        //         'section_name'=>$request->section_name,
        //         'description'=>$request->description,
        //         'created_by'=>Auth::user()->name,
        //     ]);
        //     session()->flash('success','تم أضافة القسم بنجاح');
        //     return redirect('sections');
        // }


        $id=$request->id;
        
        $sections = $request->validate([
            'section_name'=>'required|min:3|max:200|unique:sections,section_name,'.$id,
            'description'=>'nullable|min:3|max:200',
            'created_by'=>'nullable',
        ],[
            'section_name.required'=>'أسم القسم مطلوب',
            'section_name.min'=>'يجب ان يكون أسم القسم أكثر من 3 أحرف',
            'section_name.unique'=>'القسم مسجل بالفعل',
            'section_name.max'=>'يجب ان يكون أسم القسم أقل من 200 حرف',
            ########################################################
            'description.min'=>'يجب ان يكون حقل الموبايل 3 رقم',
            'description.max'=>'يجب ان يكون حقل الموبايل 200 رقم',
        ]);
        $sections = Sections::find($request->id);

        $sections->update([
            $sections->section_name = $request->section_name,
            $sections->description = $request->description,
        ]);
         
        
       
        return redirect()->route('sections.index')->with('success', 'تم تعديل قسم بنجاح');
        
    }

   
    public function destroy(Request $request)
    {
        Sections::findOrFail($request->id)->delete();

        // Return a response indicating success
        session()->flash('success', 'تم حذف القسم بنجاح');
        return redirect()->route('sections.index');
    }
}

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
        // $sections = new Sections();
        // $sections->section_name = $request->section_name;
        // $sections->description = $request->description;
        // $sections->created_by = Auth::user()->name;
        
        // $sections->save();
        // return redirect()->route('sections.index')->with('success', 'تم أضافة قسم بنجاح');
        $input = $request->all();
        $b_exists = Sections::where('section_name', '=',$input['section_name'])->exists();


        if($b_exists){
            session()->flash('Error','خطأ. القسم مسجل مسبقآ');
            return redirect('sections');
        }else{
            Sections::create([
                'section_name'=>$request->section_name,
                'description'=>$request->description,
                'created_by'=>Auth::user()->name,
            ]);
            session()->flash('success','تم أضافة القسم بنجاح');
            return redirect('sections');
        }
    }

 
    public function show(Sections $sections)
    {
        //
    }


    public function edit(Sections $sections)
    {
        return view('sections.edit');
    }


    public function update(SectionsRequest $request, Sections $sections)
    {
        $input = $request->all();
        $b_exists = Sections::where('section_name', '=',$input['section_name'])->exists();


        if($b_exists){
            session()->flash('Error','خطأ. القسم مسجل مسبقآ');
            return redirect('sections');
        }else{
            Sections::create([
                'section_name'=>$request->section_name,
                'description'=>$request->description,
                'created_by'=>Auth::user()->name,
            ]);
            session()->flash('success','تم أضافة القسم بنجاح');
            return redirect('sections');
        }
    }

   
    public function destroy(Sections $sections)
    {
        //
    }
}

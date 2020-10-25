<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use Illuminate\Http\Request;

class TreatmentController extends Controller
{
    public function index()
    {
        $data['treatments']=Treatment::all();
        // dd($data);
        return view('treatments.index',$data);
    }

    public function add()
    {
        return view('treatments.add');
    }

    public function store(Request $request)
    {
        $treatment=new Treatment();
        $treatment->kd_treatment=$request->kd_perawatan;
        $treatment->nama=$request->perawatan;
        $treatment->save();
        return redirect()->route('treatments');
    }
}

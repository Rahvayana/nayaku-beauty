<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Treatment;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $data['complaints']=Complaint::all();
        return view('complaints.index',$data);
    }

    public function add()
    {
        $data['treatments']=Treatment::all();
        return view('complaints.add',$data);
    }

    public function store(Request $request)
    {
        
        // dd($request->keluhan);
        foreach($request->keluhan as $keluhan){
            $complaint=new Complaint();
            $complaint->kd_treatment=$keluhan;
            $complaint->keluhan=$request->perawatan;
            $complaint->save();
        }
        
        return redirect()->route('complaints');
    }
}

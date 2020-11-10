<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\Treatment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplaintController extends Controller
{
    public function index()
    {
        // $data['complaints']=Complaint::all();
        $data['complaints']=DB::table('complaints')->select('complaints.keluhan','treatments.nama','complaints.kd_treatment')
        ->leftJoin('treatments','treatments.kd_treatment','complaints.kd_treatment')->get();
        // dd($data);
        
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
            // $complaint->kd_treatment=$keluhan;
            $complaint->keluhan=$keluhan;
            $complaint->kd_treatment=$request->perawatan;
            $complaint->save();
        }
        
        return redirect()->route('complaints');
    }
}

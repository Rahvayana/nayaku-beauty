<?php

namespace App\Http\Controllers;

use App\Models\History;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HistoryController extends Controller
{
    public function index()
    {
        $data['histories']=DB::table('histories')->select('users.name','histories.*')
        ->leftJoin('users','users.id','histories.user_id')->get();
        // dd($data);
        
        return view('history.index',$data);
    }

    public function detail($id)
    {
        $data['history']=DB::table('histories')->select('users.name','histories.*')
        ->leftJoin('users','users.id','histories.user_id')->where('histories.id',$id)->first();
        // dd($data);
        return view('history.detail',$data);
    }
}

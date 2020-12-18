<?php

namespace App\Http\Controllers;

use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Image;

class ProductController extends Controller
{
    public function index()
    {
        $data['products']=Products::all();
        // dd($data);
        return view('products.index',$data);
    }

    public function add()
    {
        return view('products.add');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'produk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $image = $request->file('foto');
        $input['imagename'] = time().'.'.$image->extension();     
        $destinationPath = public_path('/thumbnail');
        $img = Image::make($image->path());
        $img->resize(100, 100, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);
   
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $input['imagename']);

        $product = new Products();
        $product->nama=$request->produk;
        $product->foto=$input['imagename'];
        $product->deskripsi=$request->deskripsi;
        $product->harga=$request->harga;
        $product->save();

        return redirect()->route('products');
    }

    public function edit($id)
    {
        $data['product']=Products::find($id);
        return view('products.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $validatedData = $request->validate([
            'produk' => 'required',
            'harga' => 'required',
            'deskripsi' => 'required'
        ]);

        if($request->file('foto')!=null){
            $image = $request->file('foto');
            $input['imagename'] = time().'.'.$image->extension();     
            $destinationPath = public_path('/thumbnail');
            $img = Image::make($image->path());
            $img->resize(100, 100, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath.'/'.$input['imagename']);
    
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $input['imagename']);

        }
        
        $product = new Products();
        $product=Products::find($id);
        $product->nama=$request->produk;
        if($request->file('foto')!=null){
            $product->foto=$input['imagename'];
        }
        $product->deskripsi=$request->deskripsi;
        $product->harga=$request->harga;
        $product->save();

        return redirect()->route('products');
    }

    public function delete($id)
    {
        DB::table('products')->where('id', $id)->delete();
        return response()->json([
            'status'=>200,
            'message'=>'Sukses',
        ]);
    }
}

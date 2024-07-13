<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    public function index(){
        // $prods=Product::get();
        $prods=Product::orderBy('id')->paginate(9);
        return view('products.index',compact('prods'));
    }

    public function show($id){
        $prod=Product::findOrFail($id);
        return view('products.show',compact('prod'));
    }

    public function create(){
       
        $cat=Product::select('category')->distinct()->get();
         return view('products.create',compact('cat'));
    }

    public function store(Request $request){
        $request->validate([
            'title'=>'required | string | max:100',
            'description'=>'required | string',
            'price'=>'required | numeric',
            'category'=>'required | string |max:100',
            'img'=>'required | mimes:jpg,jpeg,png,gif,bmp | max:2048 | min:1',
        ]);

        $ext=$request->file('img')->getClientOriginalExtension();
        $imgName='prod' . uniqid() . ".$ext";
        Product::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'category'=>$request->category,
            'img'=>$imgName,
            'seller_id'=>101,
        ]);
        $request->file('img')->move(public_path('Uploads/products/'),$imgName);

        return  redirect (route('products_index'));

    }

    public function delconfirm($id){
        $prod=Product::findOrFail($id);
        return view('products.delconfirm',compact('prod'));
    }

    public function delete($id){
        $prod=Product::findOrFail($id);
        $imgName=$prod->img;
        $prod->delete();
        unlink(public_path('Uploads/products/').$imgName);
        return redirect(route('products_index'));

    }

    public function edit($id){
        $prod=Product::findOrFail($id);
        $cat=Product::select('category')->distinct()->get();
        return view('products.edit',compact('prod','cat'));
  
    }

    public function update(Request $request,$id){
        $request->validate([
            'title'=>'required | string | max:100',
            'description'=>'required | string',
            'price'=>'required | numeric',
            'category'=>'required | string |max:100',
            'img'=>'nullable | mimes:jpg,jpeg,png,gif,bmp | max:2048 | min:1',
        ]);
        
        $imgName="";
        $data=Product::findOrFail($id);
        if($request->hasFile('img')){
            $ext=$request->file('img')->getClientOriginalExtension();
            $imgName='prod' . uniqid() . ".$ext";
            $request->file('img')->move(public_path('Uploads/products/'),$imgName);
            unlink(public_path('Uploads/products/').$data->img);
        }else{
            $imgName=$data->img;
        }
            
            $data->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            'category'=>$request->category,
            'img'=> $imgName,
            'seller_id'=>101,
        ]);
       

        
        return redirect(route('products_index'));
    }
}

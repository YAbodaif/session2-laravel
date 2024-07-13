<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Seller;
use  Illuminate\Support\Facades\Hash;

class SellerController extends Controller
{
    //
    public function index(){
        $sellers=Seller::orderBy('id')->paginate(9);
        return view('sellers.index',compact('sellers'));
    }

    public function show($id){
        $seller=Seller::findOrFail($id);
        return view('sellers.show',compact('seller'));
    }

    public function create(){ 
         return view('sellers.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required | string | max:100',
            'nId'=>'required | string | max:100',
            'prand'=>'required | string | max:100',
            'email'=>'required | email | max:100',
            'mobile'=>'required | string | max:25',
            'password'=>'required | string | min:8 | regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'img'=>'required | mimes:jpg,jpeg,png,gif,bmp | max:2048 | min:1',
        ]);

        $ext=$request->file('img')->getClientOriginalExtension();
        $imgName='seller' . uniqid() . ".$ext";
        Seller::create([
            'name'=>$request->name,
            'nId'=>$request->name,
            'prand'=>$request->name,
            'email'=>$request->name,
            'mobile'=>$request->name,
            'password'=>Hash::make($request->name),
            'img'=>$imgName,
        ]);
        $request->file('img')->move(public_path('Uploads/seller/'),$imgName);
        return  redirect (route('seller_index'));
    }

    public function delconfirm($id){
        $seller=Seller::findOrFail($id);
        return view('sellers.delconfirm',compact('seller'));
    }

    public function delete($id){
        $seller=Seller::findOrFail($id);
        $imgName=$seller->img;
        $seller->delete();
        unlink(public_path('Uploads/seller/').$imgName);
        return redirect(route('seller_index'));

    }

    public function edit($id){
        $seller=Seller::findOrFail($id);
        return view('sellers.edit',compact('seller'));
  
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required | string | max:100',
            'nId'=>'required | string | max:100',
            'prand'=>'required | string | max:100',
            'email'=>'required | email | max:100',
            'mobile'=>'required | string | max:25',
            'password'=>'required | string | min:8 | regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,}$/',
            'img'=>'nullable | mimes:jpg,jpeg,png,gif,bmp | max:2048 | min:1',
        ]);
        
        $imgName="";
        $data=Seller::findOrFail($id);
        if($request->hasFile('img')){
            $ext=$request->file('img')->getClientOriginalExtension();
            $imgName='seller' . uniqid() . ".$ext";
            $request->file('img')->move(public_path('Uploads/seller/'),$imgName);
            unlink(public_path('Uploads/seller/').$data->img);
        }else{
            $imgName=$data->img;
        }
            
            $data->update([
                'name'=>$request->name,
                'nId'=>$request->name,
                'prand'=>$request->name,
                'email'=>$request->name,
                'mobile'=>$request->name,
                'password'=>Hash::make($request->name),
                'img'=>$imgName,
        ]);
       

        
        return redirect(route('seller_index'));
    }
}

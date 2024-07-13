<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function index(){
        $cats=Category::paginate(3);
        return view('categories.index',compact('cats'));
    }

    public function show($id){
        $cat=Category::findOrFail($id);
        return view('categories.show',compact('cat'));
    }

    public function create(){
         return view('categories.create');
    }

    public function store(Request $request){
        $request->validate([
            'name'=>'required | string | max:100',
        ]);

        Category::create([
            'name'=>$request->name,
        ]);

        return  redirect (route('categories_index'));

    }

    public function delconfirm($id){
        $cat=Category::findOrFail($id);
        return view('categories.delconfirm',compact('cat'));
    }

    public function delete($id){
        $cat=Category::findOrFail($id)->delete();
        return redirect(route('categories_index'));

    }

    public function edit($id){
        $cat=Category::findOrFail($id);
        return view('categories.edit',compact('cat'));
  
    }

    public function update(Request $request,$id){
        $request->validate([
            'name'=>'required | string | max:100',
        ]);
        Category::findOrFail($id)->update([
            'name'=>$request->name,
        ]);
       

        
        return redirect(route('categories_index'));
    }
}

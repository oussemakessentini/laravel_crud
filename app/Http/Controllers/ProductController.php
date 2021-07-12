<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;

class ProductController extends Controller
{
    //
    public function index(){

        $product= DB::table('products')->latest()->paginate(2);

        return view('product.index', compact('product'));
    }

    public function create(){

       // $product= DB::table('products')->get();

        return view('product.create'/*, compact('product')*/);
    }

    public function store(Request $request){
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if($image){
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext; 
            $upload_path = 'images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['logo'] = $image_url;
            $product = DB::table('products')->insert($data);
            return redirect()->route('product.index')->with('success','product created successfully');
        }
        else{
            $image_url = 'images/logo.jpg';
            $data['logo'] = $image_url;
            $product = DB::table('products')->insert($data);
            return redirect()->route('product.index')->with('success','product created successfully');
        }

        
    }


    public function edit($id){
        $product=DB::table('products')->where('id',$id)->first();
    return view('product.edit', compact('product'));
    }

    public function update(Request $request,$id){

        $oldlogo = $request->old_logo;

        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_code'] = $request->product_code;
        $data['details'] = $request->details;

        $image = $request->file('logo');
        if($image){
            unlink($oldlogo);
            $image_name = date('dmy_H_s_i');
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name.'.'.$ext; 
            $upload_path = 'images/';
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path,$image_full_name);

            $data['logo'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            return redirect()->route('product.index')->with('success','product updated successfully');
        }
        else{
            $image_url = 'images/logo.jpg';
            $data['logo'] = $image_url;
            $product = DB::table('products')->where('id',$id)->update($data);
            return redirect()->route('product.index')->with('success','product updated successfully');
        }

    }


    public function delete ($id){
        $data = DB::table('products')->where('id',$id)->first();
        $image = $data->logo;
        unlink($image);
        $product = DB::table('products')->where('id',$id)->delete();
        return redirect()->route('product.index')->with('success','product deleted successfully');
    }

    public function show ($id){
        $data=DB::table('products')->where('id',$id)->first();
        return view('product.show', compact('data'));
    }
}

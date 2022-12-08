<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use DB;
use Illuminate\Support\Str;

class subcategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        // query builder
        // $subcategory = DB::table('subcategories')->leftjoin('categories','subcategories.category_id','categories.id')->select('categories.category_name','subcategories.*')->get();

        // eleoquent ORM
        $subcategory = subcategory::all();
        return view('admin.subcategory.index',compact('subcategory'));
    }

    public function create(){
        // query builder
        // $subcategory = DB::table('subcategories')->get();

        // eleoquent ORM
        $category = category::all();
        return view('admin.subcategory.create',compact('category'));
    }

    // store method
    public function store(Request $request){

        $validated = $request->validate([
            'category_id' => 'required|max:25',
            'subcategory_name' => 'required|unique:subcategories|max:25',
        ]);

        // $subcategory = new subcategory;
        // $subcategory->category_id = $request->category_id;
        // $subcategory->subcategory_name = $request->subcategory_name;
        // $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        // $subcategory->save();

        subcategory::insert([
            'category_id' => $request->category_id,
            'subcategory_name' => $request->subcategory_name,
            'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        ]);
        $notification = array('messege' => 'Sub Category Inserted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }

    // edit method

    public function edit($id){
        // $subcategory = DB::table('subcategories')->where('id',$id)->first();
        // $subcategory = subcategory::where('id',$id)->first();
        $category = category::all();
        $subcategory = subcategory::find($id);

        return view('admin.subcategory.update',compact('subcategory','category'));
    }

    public function update(Request $request,$id){

        $subcategory = subcategory::find($id);

        $subcategory->category_id = $request->category_id;
        $subcategory->subcategory_name = $request->subcategory_name;
        $subcategory->subcategory_slug = Str::of($request->subcategory_name)->slug('-');
        $subcategory->save();

        // $subcategory->update([
        //     'category_id' => $request->category_id,
        //     'subcategory_name' => $request->subcategory_name,
        //     'subcategory_slug' => Str::of($request->subcategory_name)->slug('-'),
        // ]);

        $notification = array('messege' => 'Category Updated Successfully!', 'alert-type' => 'success');
        return redirect()->route('subcategory.index')->with($notification);

    }


    // delete method

    public function destroy($id){
        // $subcategory = DB::table('subcategories')->where('id',$id)->delete();
        subcategory::destroy($id);
        $notification = array('messege' => 'Sub Category Deleted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }
}

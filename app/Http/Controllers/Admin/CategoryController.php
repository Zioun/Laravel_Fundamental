<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use DB;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(){
        // query builder
        // $category = DB::table('categories')->get();

        // eleoquent ORM
        $category = Category::all();
        return view('admin.category.index',compact('category'));

    }

    // create method

    public function create(){
        return view('admin.category.create');
    }

    // store method
    public function store(Request $request){

        $validated = $request->validate([
            'category_name' => 'required|unique:categories|max:25',
        ]);

        $category = new Category;
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        // Category::insert([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);

        $notification = array('messege' => 'Category Inserted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


    // edit method

    public function edit($id){
        // $data = DB::table('categories')->where('id',$id)->first();
        // $data = Category::where('id',$id)->first();
        $data = Category::find($id);
        return view('admin.category.update',compact('data'));
    }

    // update method

    public function update(Request $request,$id){
        $category = Category::find($id);
        
        $category->category_name = $request->category_name;
        $category->category_slug = Str::of($request->category_name)->slug('-');
        $category->save();

        // $category->update([
        //     'category_name' => $request->category_name,
        //     'category_slug' => Str::of($request->category_name)->slug('-'),
        // ]);

        $notification = array('messege' => 'Category Updated Successfully!', 'alert-type' => 'success');
        return redirect()->route('category.index')->with($notification);

    }

    // delete method

    public function destroy($id){
        // $delete = DB::table('categories')->where('id',$id)->delete();
        Category::destroy($id);
        $notification = array('messege' => 'Category Deleted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }



}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\category;
use App\Models\subcategory;
use App\Models\Post;
use DB;
use Illuminate\Support\Str;
use Auth;
use Illuminate\Support\Facades\File;


class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // index
    public function index(){
        // model
        $posts = Post::all();
        // query
        // $posts = DB::table('posts')
        //         ->leftjoin('categories','posts.category_id','categories.id')
        //         ->leftjoin('subcategories','posts.subcategory_id','subcategories.id')
        //         ->leftjoin('users','posts.user_id','users.id')
        //         ->select('posts.*','categories.category_name','subcategories.subcategory_name','users.name')
        //         ->get();
        return view('admin.post.index',compact('posts'));
    }

    // view
    public function view($id){
        $posts = post::find($id);
        return view('admin.post.view',compact('posts'));
    }

    // create
    public function create(){
        $category = Category::all();
        return view('admin.post.create',compact('category'));
    }

    // edit
    public function edit($id){
        $category = Category::all();
        $posts = post::find($id);
        return view('admin.post.update',compact('posts','category'));
    }

    // store

    public function store(Request $request){

        $validated = $request->validate([
            'subcategory_id' => 'required',
            'post_title' => 'required',
            'post_date' => 'required',
            'post_tags' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $categoryid = DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->post_title)->slug('-');

        $data = array();
        $data['category_id'] = $categoryid;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->post_title;
        $data['slug'] = $slug;
        $data['post_date']= $request->post_date;
        $data['tags'] = $request->post_tags;
        $data['description'] = $request->description;
        $data['user_id'] = Auth::id();
        $data['status'] = $request->status;

        if($request->hasfile('image')){
            
            $file = $request->image;
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('media/',$filename);

            $data['image'] = $filename;

            DB::table('posts')->insert($data);
            
            $notification = array('messege' => 'Post Inserted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            DB::table('posts')->insert($data);
            $notification = array('messege' => 'Post Inserted Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }   

    }


    // Update

    public function update(Request $request,$id){

        $validated = $request->validate([
            'subcategory_id' => 'required',
            'post_title' => 'required',
            'post_date' => 'required',
            'post_tags' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:png,jpg,jpeg',
        ]);

        $categoryid = DB::table('subcategories')->where('id',$request->subcategory_id)->first()->category_id;
        $slug = Str::of($request->post_title)->slug('-');

        $data = array();
        $data['category_id'] = $categoryid;
        $data['subcategory_id'] = $request->subcategory_id;
        $data['title'] = $request->post_title;
        $data['slug'] = $slug;
        $data['post_date']= $request->post_date;
        $data['tags'] = $request->post_tags;
        $data['description'] = $request->description;
        $data['user_id'] = Auth::id();
        $data['status'] = $request->status;

        if($request->hasfile('image')){
            
            $file = $request->image;
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('media/',$filename);

            $data['image'] = $filename;

            DB::table('posts')->where('id',$id)->update($data);
            // delete old image
            $destination = 'media/'.$request->old_image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            
            $notification = array('messege' => 'Post Updated Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }else{
            DB::table('posts')->where('id',$id)->update($data);
            $notification = array('messege' => 'Post Updated Successfully!', 'alert-type' => 'success');
            return redirect()->back()->with($notification);
        }   

    }


    // delete method

    public function destroy($id){
        // model
        // $post = post::find($id);
        // $destination = 'media/'.$post->image;
        //     if(File::exists($destination)){
        //         File::delete($destination);
        //     }
        // $post->delete();

        // query
        $post = DB::table('posts')->where('id',$id)->first();
         $destination = 'media/'.$post->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
        $post = DB::table('posts')->where('id',$id)->delete();

        

        $notification = array('messege' => 'Post Deleted Successfully!', 'alert-type' => 'success');
        return redirect()->back()->with($notification);
    }


}

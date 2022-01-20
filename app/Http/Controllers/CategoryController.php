<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Auth;
use Illuminate\Support\Facades\DB;
use App\Models\News;

class CategoryController extends Controller
{
    public function AllCategories(){
        $categories = Category::latest()->paginate(5);
       // $categories = DB::table('categories')->latest()->paginate(5);
        return view('admin.category.index',compact('categories'));
    }

    public function AddCategories(Request $request){
        $category = new Category;
        if($category->where('category_name',$request->category_name)->first()){
            return Redirect()->back()->with('error','This category name already added');
        }
        $category->category_name = $request->category_name;
        $category->user_id = Auth::user()->id;
        $category->save();

        return Redirect()->back()->with('success','Category Inserted Successfully');
    }

    public function EditCategories($id){
        $categories = Category::find($id);
        return view('admin.category.edit',compact('categories'));
    }

    public function UpdateCategories(Request $request,$id){
        $update = Category::find($id)->update([
            'category_name' => $request->category_name,
            'user_id' => Auth::user()->id,
        ]);
        return Redirect()->route('all.categories')->with('success','Update is Successfully');
    }

    public function Delete($id){
        Category::find($id)->delete();
        News::where('category_id',$id)->delete();
        return Redirect()->back()->with('success','Category Deleted');
    }
}

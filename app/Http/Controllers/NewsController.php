<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;
use App\Models\Category;
use App\Models\Writer;
use Illuminate\Support\Carbon;
use Image;

class NewsController extends Controller
{
    public function allNews(){
        $news = News::latest()->paginate(5);
        $categories = Category::all();
        $writers = Writer::all();
        return view('admin.news.index',compact('news','categories','writers'));
    }

    public function addNews(Request $request){
        $news_image = $request->file('image');

        $name_gen = hexdec(uniqid()).'.'.$news_image->getClientOriginalExtension();
        Image::make($news_image)->resize(300,200)->save('image/news/'.$name_gen);
        $last_img = 'image/news/'.$name_gen;

        News::insert([
            'writer_id' => $request->writer_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'image'=> $last_img,
            'created_at'=> Carbon::now(),
        ]);
        return Redirect()->back()->with('success','News Inserted Successfully');
    }
    public function editNews($id){
        $categories = Category::all();
        $writers = Writer::all();
        $news = News::find($id);
        return view('admin.news.edit',compact('news','categories','writers'));
    }

    public function updateNews(Request $request,$id){
        $updateArray = [
            'writer_id' => $request->writer_id,
            'category_id' => $request->category_id,
            'title' => $request->title,
            'content' => $request->content,
            'created_at'=> Carbon::now(),
        ];
        if($request->has('image')){
            $news_image = $request->file('image');

            $name_gen = hexdec(uniqid()).'.'.$news_image->getClientOriginalExtension();
            Image::make($news_image)->resize(300,200)->save('image/news/'.$name_gen);
            $last_img = 'image/news/'.$name_gen;
            $updateArray['image'] = $last_img;
        }
        $news = News::find($id);
        $old_image = $news->image;
        unlink($old_image);
        $update = $news->find($id)->update($updateArray);
        return Redirect()->route('all.news')->with('success','Update is Successfully');
    }

    public function delete($id){
        $image = News::find($id);
        $old_image = $image->image;
        unlink($old_image);

        News::find($id)->delete();
        return Redirect()->back()->with('success','News Deleted Successfully');
    }
}

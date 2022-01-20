<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Writer;
use App\Models\News;
use Auth;
use Illuminate\Support\Facades\DB;

class WriterController extends Controller
{
    public function AllWriter(){
        $writers = Writer::latest()->paginate(5);
        return view('admin.writer.index',compact('writers'));
    }

    public function AddWriter(Request $request){
        $writer = new Writer;
        if($writer->where('writer_name',$request->writer_name)->first()){
            return Redirect()->back()->with('error','This writer name already added');
        }
        $writer->writer_name = $request->writer_name;
        $writer->user_id = Auth::user()->id;
        $writer->save();

        return Redirect()->back()->with('success','Writer Inserted Successfully');
    }

    public function EditWriter($id){
        $writers = Writer::find($id);
        return view('admin.writer.edit',compact('writers'));
    }

    public function UpdateWriter(Request $request,$id){
        $update = Writer::find($id)->update([
            'writer_name' => $request->writer_name,
            'user_id' => Auth::user()->id,
        ]);
        return Redirect()->route('all.writer')->with('success','Update is Successfully');
    }

    public function Delete($id){
        Writer::find($id)->delete();
        News::where('writer_id',$id)->delete();
        return Redirect()->back()->with('success','Writer Deleted');
    }
}

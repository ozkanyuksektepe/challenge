@extends('admin.admin_master')
@section('admin')
    <div class="block block-rounded">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <p class="mb-0">
                    <a class="alert-link" href="javascript:void(0)">{{session('success')}}</a>!
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="block-header block-header-default">
            <h3 class="block-title">News</h3>
        </div>
            <div class="card mx-auto" style="width: 18rem;">
                <img class="card-img-top" src="{{asset($news->image)}}"  alt="Card image cap">
            </div>
        <div class="block-content block-content-full">
            <form action="{{route('update.news',$news->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Title</label>
                        <input type="text" name="title" value="{{$news->title}}" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Content</label>
                        <textarea type="text" name="content" class="form-control" id="inputPassword4"> {{$news->content}}</textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">Image</label>
                        <input type="file" class="form-control" value="{{$news->image}}" name="image" id="inputAddress">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" name="category_id" class="form-select">
                            @foreach($categories as $category)
                                <option @if($category->id == $news->category_id) selected @endif value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Writer</label>
                        <select id="inputState" name="writer_id" class="form-select">
                            @foreach($writers as $writer)
                                <option @if($writer->id == $news->writer_id) selected @endif value="{{$writer->id}}">{{$writer->writer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 align-bottom">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

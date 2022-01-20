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
        <div class="block-content block-content-full">
            <form action="{{route('store.news')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <label for="inputEmail4" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control" id="inputEmail4">
                    </div>
                    <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Content</label>
                        <textarea type="text" name="content" class="form-control" id="inputPassword4"></textarea>
                    </div>
                    <div class="col-md-4">
                        <label for="inputAddress" class="form-label">Image</label>
                        <input type="file" class="form-control" name="image" id="inputAddress">
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Category</label>
                        <select id="inputState" name="category_id" class="form-select">
                            @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->category_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label for="inputState" class="form-label">Writer</label>
                        <select id="inputState" name="writer_id" class="form-select">
                            @foreach($writers as $writer)
                                <option value="{{$writer->id}}">{{$writer->writer_name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
            <div class="block block-rounded">
                <div class="block-content">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>Category Name</th>
                            <th>Writer Name</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>ımage</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($news as $new)
                            <tr>
                                <th class="text-center" scope="row"></th>
                                <td class="fw-semibold fs-sm">
                                    {{$new->category->category_name}}
                                </td>
                                <td>{{$new->writer->writer_name}}</td>
                                <td>{{$new->title}}</td>
                                <td>{{$new->content}}</td>
                                <td><img src="{{asset($new->image)}}" style="height:40px; width:70px;"></td>
                                <td><a href="{{ route('edit.news',$new->id) }}" class="btn btn-info">Edit</a></td>
                                <td><a href="{{ route('delete.news',$new->id) }}" onclick="return confirm('Are you sure to delete')" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            {{$news->links()}}
    </div>
@endsection

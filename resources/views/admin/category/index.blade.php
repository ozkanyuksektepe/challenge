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
            @elseif(session('error'))
            <div class="alert alert-warning alert-dismissible" role="alert">
                <p class="mb-0">
                    <a class="alert-link" href="javascript:void(0)">{{session('error')}}</a>!
                </p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="block-header block-header-default">
            <h3 class="block-title">Category</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('store.categories')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            Please enter the category name.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">Category Name</label>
                            <input type="text" class="form-control form-control-alt" id="example-text-input-alt" name="category_name" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
            <div class="block block-rounded">
                <div class="block-content">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>All Category</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $category)
                        <tr>
                            <th class="text-center" scope="row">{{$categories->firstItem()+$loop->index}}</th>
                            <td class="fw-semibold fs-sm">
                                {{$category->category_name}}
                            </td>
                            <td>{{$category->user->name}}</td>
                            <td><a href="{{ url('category/edit/'.$category->id) }}" class="btn btn-info">Edit</a></td>
                            <td><a href="{{ url('category/delete/'.$category->id) }}" onclick="return confirm('Are you sure to delete this category and news on this category ?')" class="btn btn-danger">Delete</a></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$categories->links()}}
                </div>
            </div>
</div>
@endsection

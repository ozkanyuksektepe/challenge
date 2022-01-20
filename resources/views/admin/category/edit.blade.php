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
            <h3 class="block-title">Category</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{url('category/update/'.$categories->id)}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            Please enter the category name.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">Update Category</label>
                            <input type="text" class="form-control form-control-alt" value="{{$categories->category_name}}" id="example-text-input-alt" name="category_name">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection

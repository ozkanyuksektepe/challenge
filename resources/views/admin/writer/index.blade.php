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
            <h3 class="block-title">Writer</h3>
        </div>
        <div class="block-content block-content-full">
            <form action="{{route('store.writer')}}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-4">
                        <p class="fs-sm text-muted">
                            Please enter the Writer name and surname.
                        </p>
                    </div>
                    <div class="col-lg-8 col-xl-5">
                        <div class="mb-4">
                            <label class="form-label" for="example-text-input-alt">Writer Name</label>
                            <input type="text" class="form-control form-control-alt" id="example-text-input-alt" name="writer_name" required>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Add Writer</button>
                </div>
            </form>
        </div>
            <div class="block block-rounded">
                <div class="block-content">
                    <table class="table table-striped table-vcenter">
                        <thead>
                        <tr>
                            <th class="text-center" style="width: 50px;">#</th>
                            <th>All Writer</th>
                            <th>Added By</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($writers as $writer)
                            <tr>
                                <th class="text-center" scope="row">{{$writers->firstItem()+$loop->index}}</th>
                                <td class="fw-semibold fs-sm">
                                    {{$writer->writer_name}}
                                </td>
                                <td>{{$writer->user->name}}</td>
                                <td><a href="{{ route('edit.write',$writer->id) }}" class="btn btn-info">Edit</a></td>
                                <td><a href="{{ route('delete.write',$writer->id) }}" onclick="return confirm('Are you Sure to delete this writer at this writers news ?')" class="btn btn-danger">Delete</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    {{$writers->links()}}
                </div>
            </div>
    </div>
@endsection

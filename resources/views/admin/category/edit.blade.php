@extends('layouts.admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-category/'.$category->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="category">Category Name</label>
                        <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Enter name category">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="category">Slug</label>
                        <input type="text" name="slug" value="{{$category->slug}}" class="form-control" placeholder="Enter...">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea name="description"  class="form-control" id="">{{$category->description}}</textarea>
                    </div>
    
                    <div class="form-group col-md-12">
                        <label>Content</label>
                        <textarea name="content"  id="content" class="form-control" id="">{{$category->content}}</textarea>
                    </div>
    
                    <div class="form-group col-md-2">
                        <label>Status</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" {{$category->status=='1'? 'checked':''}} type="radio" id="active" name="status" checked="">
                            <label for="active" class="custom-control-label">Yes</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" {{$category->status=='0'? 'checked':''}} type="radio" id="no_active" name="status">
                            <label for="no_active" class="custom-control-label">No</label>
                        </div>
                    </div>
                </div>
            <!-- /.card-body -->
    
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Edit</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection
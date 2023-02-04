@extends('layouts.admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>
                Category List
            <a href="{{route('admin.category.get')}}" data-bs-target="#AddCAtegoryModal" class="btn btn-primary float-end btn-sm" id="addNewCate">Add Category</a>
            </h3>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Content</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($category as $key=>$row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->description}}</td>
                            <td>{{$row->content}}</td>
                            <td>{{$row->status}}</td>
                            <td>
                                <a href="{{url('/edit-category/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{url('/delete-category/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
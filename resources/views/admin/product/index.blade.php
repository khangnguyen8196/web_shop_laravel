@extends('layouts.admin')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Products List</h4>
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $key=>$row)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$row->name}}</td>
                            <td>{{$row->description}}</td>
                            <td>
                                <img width="40" height="40" src="{{asset('assets/uploads/product/'.$row->image)}}">
                            </td>
                            <td>{{$row->status}}</td>
                            <td>
                                <a href="{{url('/edit-product/'.$row->id)}}" class="btn btn-sm btn-info">Edit</a>
                                <a href="{{url('/delete-product/'.$row->id)}}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
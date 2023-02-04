@extends('layouts.admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>Add Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('insert-product')}}" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="form-group col-md-12">
                        <select class="form-select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach ($category as $row )
                                <option value="{{$row->id}}">{{$row->name}}</option>  
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="product">Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter...">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Small_Description</label>
                        <textarea name="small_description" class="form-control" id=""></textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id=""></textarea>
                    </div>
    
                    <div class="form-group col-md-12">
                        <label>Original Price</label>
                        <input type="number" name="original_price" class="form-control" placeholder="Enter...">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Selling Price</label>
                        <input type="number" name="selling_price" class="form-control" placeholder="Enter...">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Quantity</label>
                        <input type="number" name="quantity" class="form-control" placeholder="Enter...">
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label required" for="language">Status</label>
                            <select class="form-select form-select-md @error('status') is-invalid @enderror" name="status">
                                @if(!empty($statusTextList))
                                    @foreach($statusTextList as $statusID => $name)
                                        @if($statusID != $statusList['deleted'])
                                            <option value="{{ $statusID }}" {{ old('status', @ $product['status']) == $statusID ? 'selected' : '' }}>{{ $name }}</option>
                                        @endif
                                    @endforeach
                                @endif
                            </select>
                            @error('status')
                            <div class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                    </div>
    
                    {{-- <div class="form-group col-md-2">
                        <label>Status</label>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="1" type="radio" id="active" name="status" checked="">
                            <label for="active" class="custom-control-label">Yes</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="2" type="radio" id="no_active" name="status">
                            <label for="no_active" class="custom-control-label">No</label>
                        </div>
                    </div> --}}
                    <div class="col-md-12">
                        <label>Image</label>
                        <input type="file" name="image">
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">ADD</button>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('script')
<!-- Constant init js -->
<script src="{{ asset('/backend/assets/js/constants.js') }}"></script>
<!-- Logic init js -->
<script src="{{ asset('/backend/assets/js/pages/product/product.js') }}"></script>
@endsection
@extends('layouts.admin.master')

@section('content')
    <div class="card">
        <div class="card-header">
            <h4>edit Product</h4>
        </div>
        <div class="card-body">
            <form action="{{url('update-product/'.$product->id)}}" method="post" enctype="multipart/form-data">
                @method('PUT')
                <div class="row">
                    <div class="form-group col-md-12">
                        <select class="form-select" name="cate_id">
                            <option value="">Select a Category</option>
                            @foreach ($category as $row )
                                <option
                                    {{$row->id == $product->cate_id ?'selected':''}}
                                    value="{{$row->id}}">{{$row->name}}
                                </option>  
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="prouct">Name</label>
                        <input type="text" name="name" value="{{$product->name}}" class="form-control" placeholder="Enter...">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Small_Description</label>
                        <textarea name="small_description" class="form-control" id="">{{$product->small_description}}</textarea>
                    </div>
                    <div class="form-group col-md-12">
                        <label>Description</label>
                        <textarea name="description" class="form-control" id="">{{$product->description}}</textarea>
                    </div>
    
                    <div class="form-group col-md-12">
                        <label>Original Price</label>
                        <input type="number" name="original_price" value="{{$product->original_price}}" class="form-control" placeholder="Enter...">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Selling Price</label>
                        <input type="number" name="selling_price" value="{{$product->selling_price}}" class="form-control" placeholder="Enter...">
                    </div>
                    <div class="form-group col-md-12">
                        <label>Quantity</label>
                        <input type="number" name="quantity" value="{{$product->quantity}}" class="form-control" placeholder="Enter...">
                    </div>

                    <div class="col-md-3">
                        <div class="mb-3">
                            <label class="form-label required" for="language">Status</label>
                            <select class="form-select form-select-md @error('status') is-invalid @enderror" name="status">
                                @if(!empty($statusTextList))
                                    @foreach($statusTextList as $statusID => $name)
                                        @if($statusID != $statusList['deleted'])
                                            <option value="{{ $statusID }}" {{ old('status', @$product['status']) == $statusID ? 'selected' : '' }}>{{ $name }}</option>
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
                            <input class="custom-control-input" value="1" {{$product->status=='1'? 'checked':''}} type="radio" id="active" name="status" checked="">
                            <label for="active" class="custom-control-label">Yes</label>
                        </div>
                        <div class="custom-control custom-radio">
                            <input class="custom-control-input" value="0" {{$product->status=='2'? 'checked':''}} type="radio" id="no_active" name="status">
                            <label for="no_active" class="custom-control-label">No</label>
                        </div>
                    </div> --}}
                    {{-- <div class="col-md-12">
                        <label>Image</label>
                        <input type="file" name="image" class="browse-file d-none" accept=".jpg,.png,jpeg,.gif">
                    </div> --}}
                    <div class="col-md-12">
                        <div class="mb-3 w-25">
                            <div id="msg"></div>
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="browse-file d-none" accept=".jpg,.png,jpeg,.gif">
                            <div class="input-group my-2">
                                <input type="text" class="form-control thumbnail">
                                <div class="input-group-append">
                                    <button type="button" class="btn btn-primary btn-browse">Browse</button>
                                </div>
                            </div>
                            @error('image')
                            <div class="invalid-feedback d-block mb-2" role="alert">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                            <img src="{{ !empty($data['image']) ? $data['image'] : '' }}" class="img-thumbnail" width="100%" alt="" class="rounded" id="media_img_preview">
                        </div>
                    </div>

                </div>
                <div class="card-footer">
                    <div class="col-12 mt-2 mb-5">
                        <a href="{{ route('admin.products') }}" class="btn btn-danger waves-effect waves-light btn-custom-width">Cancel</a>
                        <button type="submit" class="btn btn-primary text-white waves-effect waves-light btn-custom-width" id="saveBtn" data-status="1">Save</button>
                    </div>
                </div>
                @csrf
            </form>
        </div>
    </div>
@endsection

@section('script')

<!-- Logic init js -->
<script src="{{ asset('/backend/assets/js/pages/product/product.js') }}"></script>
@endsection
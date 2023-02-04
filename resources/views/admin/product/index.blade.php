@extends('layouts.admin.master')

@section('content')
    <div class="container-fluid">
        <div class="card-header mb-3">
            <h3>
                List Product
            <a href="{{route('admin.product.get')}}" data-bs-target="#AddUserModal" class="btn btn-primary float-end btn-sm" id="addNewUser">Add Product</a>
            </h3>
            <div class="col-md-12 px-0 pb-3">
                <div class="row align-items-end" id="search-form">
                    <div class="col-md-2">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control item-search" item-type="search" name="key_word" mapping-column="1" fdprocessedid="d63u1t">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Category</label>
                        <select class="form-select form-select-md item-search" item-type="search" name="cate_id" mapping-column="2" fdprocessedid="gkah7j">
                            <option value="">All</option>
                            <option value="{{ config('constants.CATEGORY_NAME.electronic')}}">Electronic</option>
                            <option value="{{ config('constants.CATEGORY_NAME.phone')}}">Phone</option>
                            <option value="{{ config('constants.CATEGORY_NAME.laptop')}}">Laptop</option>
                            <option value="{{ config('constants.CATEGORY_NAME.accessory')}}">Accessory</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Status</label>
                        <select class="form-select form-select-md item-search" item-type="search" name="status" mapping-column="4" fdprocessedid="gkah7j">
                            <option value="">All</option>
                            <option value="{{ config('constants.PRODUCT_STATUS.active')}}">Active</option>
                            <option value="{{ config('constants.PRODUCT_STATUS.inactive')}}">Inactive</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary text-white w-100 waves-effect waves-light btn_execute_search" type="button" fdprocessedid="18v2sd">Search</button>
                    </div>
                </div>
            </div>
        </div >
       
        <table id ="product_tbl" class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th width="5%">STT</th>
                    <th>Name</th>
                    <th>Category</th>
                    <th>Description</th>
                    <th width="5%">Status</th>
                    <th width="15%">Image</th>
                    <th width="15%">Created_at</th>
                    <th width="15%">Updated_at</th>
                    <th width="10%">Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    

    <div class="modal fade" id="delete-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <p>Are you sure you want to delete!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn col-md-2 btn-light cancel" data-bs-dismiss="modal">No</button>
                    <a href="javascript:void(0);" class="btn col-md-2 btn waves-effect waves-light text-white btn-primary confirm_delete">Yes</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script') 
<!-- Required datatable js -->
<script src="{{ asset('/backend/assets/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('/backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<!-- Responsive -->
<script src="{{ asset('/backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('/backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>
<!-- glightbox js -->
<script src="{{ URL::asset('/backend/assets/libs/glightbox/js/glightbox.min.js') }}"></script>
<!-- Common init js -->
<script src="{{ asset('/backend/assets/js/common.js') }}"></script>
<!-- Constant init js -->
<script src="{{ asset('/backend/assets/js/constants.js') }}"></script>
<!-- Logic init js -->
<script src="{{ asset('/backend/assets/js/pages/product/product.js') }}"></script>

@endsection
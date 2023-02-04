@extends('layouts.admin.master')

@section('content')
@section('title')
{{$title}}
@endsection
    <div class="container-fluid">
        <div class="card-header">
            <div>
                <h3>
                    List User
                <a href="javascript:void(0)" data-bs-target="#AddUserModal" class="btn btn-success float-end btn-sm" id="addNewUser">Add User</a>
                </h3>
            </div>
            <div class="col-md-12 px-0 pb-3">
                <div class="row align-items-end" id="search-form">
                    <div class="col-md-2">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control item-search" item-type="search" name="name" mapping-column="1" fdprocessedid="d63u1t">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control item-search" item-type="search" name="email" mapping-column="2" fdprocessedid="o2sauqg">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Role</label>
                        <select class="form-select form-select-md item-search" item-type="search" name="role" mapping-column="4" fdprocessedid="gkah7j">
                            <option value="">All</option>
                                                                    <option value="1">Customer</option>
                                                                    <option value="2">Admin</option>
                                                                   =
                                                            </select>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary text-white w-100 waves-effect waves-light btn_execute_search" type="button" fdprocessedid="18v2sd">Search</button>
                    </div>
                </div>
            </div>
        </div>
        <table id ="user_tbl" class="table table-bordered table-striped data-table">
            <thead>
                <tr>
                    <th >Number</th>
                    <th >Name</th>
                    <th >Email</th>
                    <th >Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
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
<script src="{{ asset('/backend/assets/js/pages/user/user.js') }}"></script>
@endsection
    
    <div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
        <div class="logo">
            <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            K-cil Shop
            </a>
        </div>
        <div class="sidebar-wrapper">
            <ul class="nav">
                <li class="nav-item active  ">
                <a class="nav-link" href="{{route('admin.dashboard')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{url('users')}}">
                        <i class="material-icons">person</i>
                        <p>List Users</p>
                    </a>
                </li>

                <li class="nav-item ">
                    <a class="nav-link" href="{{url('categories')}}">
                        <i class="material-icons">content_paste</i>
                        <p>Categories</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('products')}}">
                        <i class="material-icons">content_paste</i>
                        <p>Products</p>
                    </a>
                </li>
                <li class="nav-item ">
                    <a class="nav-link" href="{{url('logs')}}">
                        <i class="material-icons">content_paste</i>
                        <p>Logs</p>
                    </a>
                </li>       
            </ul>
        </div>
    </div>
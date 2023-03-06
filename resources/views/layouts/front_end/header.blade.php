    <header class="py-3 border shadow">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <h1>Shop</h1>
                </div>
                <div class="col-8 d-flex justify-content-end align-items-center">
                    <ul class="nav">
                        <li class="nav-item">
                            @if( request()->route()->getName() == 'front.home' || request()->route()->getName() == 'www.front.home')
                                <a class="nav-link active" aria-current="page" href="{{url('/')}}">Trang chủ</a>
                            @endif     
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#">Giới thiệu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Sản phẩm</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Dịch vụ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Tin tức</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Liên hệ</a>
                        </li>
                        @if(Auth::guard('customer')->check())
                            <li class="nav-item">
                                <span class="nav-link">{{ Auth::guard('customer')->user()->name }}</span>
                            </li>
                            <li class="nav-item">
                                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-link">{{ __('Logout') }}</button>
                                </form>
                            </li>
                        @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('customer.login') }}">{{ __('Login') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('customer.register') }}">{{ __('Register') }}</a>
                                </li>
                        @endif                    
                    </ul>
                </div>
            </div>
        </div>
    </header>
<style>
   
</style>
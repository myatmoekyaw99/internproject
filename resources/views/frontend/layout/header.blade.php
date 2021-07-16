<!-- Navigation-->
<div class="toast" id="alert_toast" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body text-white">
        </div>
</div>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="/">Food Ordering System</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/cart"><span><span class="badge badge-danger item_count">{{$cart}}</span> <i class="fa fa-shopping-cart"></i></span>Cart</a></li>
                        <!--?php $c=0;if(session('cart')){$t=count(session('cart'));echo $t;}else{echo $c;}?-->
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/food">Food</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/about">About</a></li>
                        <!-- if(isset(Auth::user()->id )) -->
                        @if(session('cid'))
                        <li class="nav-item">
                          <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}">{{session('cname')}}<i class="fa fa-power-off"></i></a>
                        </li>
                        @else
                        <li class="nav-item dropdown">
                          <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Customer<span class="caret"></span>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="/login/customer">Login</a>
                            <a class="dropdown-item" href="/register/customer">Register</a>
                          </div>
                        </li>
                        @endif
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/login/admin"><i class="fa fa-user-cog"></i>Admin</a></li>
                    </ul>
                </div>
            </div>
        </nav>
       
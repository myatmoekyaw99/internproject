@extends('frontend.layout.master')
@section('title','Home')
@section('content')
     <!-- Masthead-->
    <header class="masthead">
        <div class="container h-100">
            <div class="row h-100 align-items-center justify-content-center text-center">
                <div class="col-lg-10 align-self-end mb-4 page-title">
                    <h3 class="text-white">Welcome to Our Restaurant</h3>
                    <hr class="divider my-4" />
                    <a class="btn btn-primary btn-xl js-scroll-trigger" href="#menu">Order Now</a>
                </div>
            </div>
        </div>
    </header>
    @if(session('success'))
	<div class="alert alert-success">
		{{ session('success') }}
	</div>
    @endif
	<section class="page-section">
        <div class="containerc">
            <h2 class="text-center">Explore Categories</h2>
            @foreach($c as $cat)
            <div class="food-menu-box" >
                <a href="/food/{{$cat->id}}">
                    <!-- <div class="box-3 float-container">
                        <img src="{{asset('/uploads/'.$cat->image)}}" alt="Burger" class="img-responsive img-curve">
                        <h3 class="float-text text-white">{{$cat->name}}</h3>
                    </div> style="width:30%; padding:3%;" -->
                    <div class="food-menu-img" style="width:40%">
                        <img src="{{asset('/uploads/'.$cat->image)}}" alt="Burger" class="img-responsive img-curve">
                    </div>
                    <div><h5 class="float-text text-danger">{{$cat->name}}</h5></div>
                </a>
            </div>
            @endforeach
            <div class="clearfix"></div>
            
            <!--?php endwhile; ?-->
            
        </div>
    </section>
    <!-- <section class="page-section" id="menu" style="background-color:#ececec"> -->
        <!-- <div id="menu-field" class="card-deck">
                <div class="col-lg-3">
                    <div class="card menu-item ">
                        <img src="front/assets/img/checken2.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Namae</h5>
                            <p class="card-text truncate">Namae</p>
                            <div class="text-center">
                                <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id=><i class="fa fa-eye"></i> View</button>
                            </div>
                        </div>   
                    </div>
                </div>
        </div> -->
    <section class="food-menu" id="menu">
        <div class="containerc">
            <h2 class="text-center">Popular Food Menu</h2>

            @foreach($t as $it)
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <img src="{{asset('/uploads/'.$it->image)}}" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                </div>

                <div class="food-menu-desc">
                    <h5>{{$it->name}}</h5>
                    <p class="food-price">{{$it->price}}</p>
                    <p class="food-price">{{$it->cname}}</p>
                    <p class="food-detail">
                        {{$it->description}}
                    </p>

                    <div class="text-center">
                        <button class="btn btn-sm btn-outline-primary view_prod btn-block" data-id="{{$it->id}}"><i class="fa fa-eye"></i> View</button>
                    </div>
                    <!-- <a href="order.html" class="btn btn-primary">Order Now</a> -->
                </div>
            </div>
            @endforeach
            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="/food">See All Foods</a>
        </p>
    </section>
    <script>  
        $('.view_prod').click(function(){
            // var id= $(this).attr('data-id');
            uni_modal_right('Items','/viewprod/'+$(this).attr('data-id'))
        })
    </script> 
@endsection
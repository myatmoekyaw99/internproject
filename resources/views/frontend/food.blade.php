@extends('frontend.layout.master')
@section('title','Home')
@section('content')
     <!-- Masthead-->
     <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h3 class="text-uppercase text-white font-weight-bold">Foods</h3>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
    </header>
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

        <div class="search-wrapper" style="float:right;">
            <form action="/foodsearch" method="GET" role="search" class="form-inline mt-2">
                @csrf
            <input class="form-control" type="search" placeholder="Type to search" name="search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
            </form>
        </div> <br>
        
        <div class="containerc" style="width:90%;">
            <h2 class="text-center">Food Menu</h2>

            @foreach($t as $it)
            <div class="food-menu-box" style="width:30%;">
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
        
    </section>
    <script>  
        $('.view_prod').click(function(){
            // var id= $(this).attr('data-id');
            uni_modal_right('Items','/viewprod/'+$(this).attr('data-id'))
        })
    </script> 
@endsection
@extends('frontend.layout.master')
@section('title','Cart list')
@section('content')
 <!-- Masthead-->
 @if(session('success'))

	<div class="alert alert-success">
		{{ session('success') }}
	</div>

@endif
 	<header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4 page-title">
                    	<h3 class="text-white">Cart List</h3>
                        <hr class="divider my-4" />
                    </div>
                    
                </div>
            </div>
     </header>
	<section class="page-section" id="menu">
        <div class="container">
        	<div class="row">
        	<div class="col-lg-8">
        		<div class="sticky">
	        		<div class="card">
	        			<div class="card-body">
	        				<div class="row">
		        				<div class="col-md-8"><b>Cart</b></div>
		        				<div class="col-md-4 text-right"><b>Total</b></div>
	        				</div>
	        			</div>
	        		</div>
	        	</div>
        		<?php $total = 0; ?>
				
            	@foreach($c as $details)
 					<?php $img=$details->cimage; ?>
					<?php $total += $details->price * $details->qty ?>
					<div class="card">
						<div class="card-body">
							<div class="row">
								<div class="col-md-4" style="text-align: -webkit-center">
									<button class="btn btn-outline-danger btn-sm remove-from-cart" data-id="{{$details->id}}"><i class="fa fa-trash"></i></button>
									<!-- <a href="" class="rem_cart btn btn-sm btn-outline-danger" data-id=""><i class="fa fa-trash"></i></a> -->
									<img src="{{asset('/uploads/'.$img)}}" alt="">
								</div>
								<div class="col-md-4">
									<p><b><large>{{ $details->cname}}</large></b></p>
									<!-- <p class='truncate'> <b><small>Desc :</small></b></p> -->
									<p> <b><small>Unit Price : {{ $details->price}}</small></b></p>
									<p><small>QTY : </small></p>
									<div class="input-group mb-3">
										<input type="number" value="{{ $details->qty }}" class="form-control quantity text-center" name="qty" />
										<button class="btn btn-info btn-sm update-cart" data-id="{{$details->id}}"><i class="fa fa-edit"></i></button>
									<!-- <div class="input-group-prepend">
										<button class="btn btn-outline-secondary qty-minus" type="button"   data-id=""><span class="fa fa-minus"></button>
									</div> -->
									<!-- <input type="number" readonly value="" min = 1 class="form-control " > -->
									<!-- <div class="input-group-prepend">
										<button class="btn btn-outline-secondary qty-plus" type="button" id=""  data-id=""><span class="fa fa-plus"></span></button>
									</div> -->
									</div>
								</div>
								<div class="col-md-4 text-right">
									<b><large> {{ $details->price * $details->qty }}</large></b>
								</div>
							</div>
						</div>
					</div>
				@endforeach
        	</div>
        	<div class="col-md-4">
        		<div class="sticky">
        			<div class="card">
        				<div class="card-body">
        					<p><large>Total Amount</large></p>
        					<hr>
        					<p class="text-right"><b>{{ $total }}</b></p>
        					<hr>
							@if(session('cid'))
								<div class="text-center">
									<button class="btn btn-block btn-outline-primary" type="button" id="checkout">
										<a href="/checkout" id="checkout">Proceed to Checkout</a>
									</button>
								</div>
							@else
								<div class="text-center">
									<!-- Button trigger modal -->
									<button type="button" class="btn btn-block btn-outline-primary" data-toggle="modal" data-target="#exampleModal">
										Checkout
									</button>
								</div>
							@endif
        				</div>
        			</div>
        		</div>
        	</div>
        	</div>
        </div>
    </section>

	<!-- Modal -->
	<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
		<div class="modal-header">
			<h5 class="modal-title" id="exampleModalLabel">Welcome....!</h5>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<div class="row">
			<div class="col-md-6  text-center">
				<p class="text-center">Already have an account?</p>
				<button type="button" class="btn btn-secondary"><a href="/login/customer" class="text-white">Login</a></button>
			</div>
			<div class="col-md-6 text-center">
				<p class="text-center">Are you a new customer?</p>
				<button type="button" class="btn btn-primary "><a href="/register/customer" class="text-white">Register</a></button>
			</div>
			</div>
		</div>
		<div class="modal-footer">
		</div>
		</div>
	</div>
	</div>

    <style>
    	.card p {
    		margin: unset
    	}
    	.card img{
		    max-width: calc(100%);
		    max-height: calc(59%);
    	}
    	div.sticky {
		  position: -webkit-sticky; /* Safari */
		  position: sticky;
		  top: 4.7em;
		  z-index: 10;
		  background: white
		}
		.rem_cart{
		   position: absolute;
    	   left: 0;
		}
    </style>
    <script>
		$(".remove-from-cart").click(function (e) {
            e.preventDefault();

            var ele = $(this);

            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('removecart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
        // $('.view_prod').click(function(){
        //     uni_modal_right('Product','view_prod.php?id='+$(this).attr('data-id'))
        // })
        // $('.qty-minus').click(function(){
		// var qty = $(this).parent().siblings('input[name="qty"]').val();
		// update_qty(parseInt(qty) -1,$(this).attr('data-id'))
		// if(qty == 1){
		// 	return false;
		// }else{
		// 	 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) -1);
		// }
		// })
		// $('.qty-plus').click(function(){
		// 	var qty =  $(this).parent().siblings('input[name="qty"]').val();
		// 		 $(this).parent().siblings('input[name="qty"]').val(parseInt(qty) +1);
		// update_qty(parseInt(qty) +1,$(this).attr('data-id'))
		// })
		$(".update-cart").click(function (e) {
           e.preventDefault();

           var ele = $(this);

			//start_load()
			$.ajax({
				url:'{{ url('updatecart') }}',
				method:"PATCH",
				data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id"), quantity: ele.parents("div").find('.quantity').val()},
				success:function(response){
					window.location.reload();
				}
			});

		});
		// $('#checkout').click(function(){
		// 	// if('' == 1){
		// 	// 	location.replace("/checkout")
		// 	// }else{
		// 	uni_modal("Checkout","")
		// 	// }
		// })
    </script>
@endsection
	

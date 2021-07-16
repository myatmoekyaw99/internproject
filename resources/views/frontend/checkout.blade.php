@extends('frontend.layout.master')
@section('title','Checkout')
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
                	<h3 class="text-white">Checkout</h3>
                    <hr class="divider my-4" />

                </div>
                
            </div>
        </div>
</header>
    <div class="container">
        <div class="card">
            <div class="card-body">
            
                <form action="/order/{{$c->id}}" method="POST" id="checkout-frm">
                    @csrf
                    <h4>Confirm Delivery Information</h4>
                    <div class="form-group">
                        <label for="" class="control-label">Name</label>
                        <input type="text" name="name" required="" class="form-control" value="{{$c->name}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Phone no:</label>
                        <input type="text" name="phone" required="" class="form-control" value="{{$c->phone}}">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Address</label>
                        <textarea cols="30" rows="3" name="address" required="" class="form-control">{{$c->address}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Email</label>
                        <input type="email" name="email" required="" class="form-control" value="{{$c->email}}">
                    </div>  

                    <div class="text-center">
                        <button type="submit" class="btn btn-block btn-outline-primary">Place Order</button>
                    </div>

                </form>
            
            </div>
        </div>
    </div>

    <script>
    // $(document).ready(function(){
        //   $('#checkout-frm').submit(function(e){
        //     e.preventDefault()
          
        //     start_load()
        //     $.ajax({
        //         url:"admin/ajax.php?action=save_order",
        //         method:'POST',
        //         data:$(this).serialize(),
        //         success:function(resp){
        //             if(resp==1){
        //                 alert_toast("Order successfully Placed.")
        //                 setTimeout(function(){
        //                     location.replace('index.php?page=home')
        //                 },1500)
        //             }
        //         }
        //     })
        // })
        // })
    </script>
    @endsection
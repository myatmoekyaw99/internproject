@extends('backlayouts.master')
@section('title','Show Orders')
@section('orderactive','mm-active')
@section('content')
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
        <div class="col-lg">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3 class="card-title">Show Orders</h3>
                <div class="search-wrapper" style="float:right;">
                    <!-- <div class="input-holder">
                        <input type="text" class="search-input" name="search" placeholder="Type to search">
                        <a class="btn search-icon" href=""><span></span></a>
                    </div>
                    <button class="close"></button> -->
                        <form action="/ordersearch" method="GET" role="search" class="form-inline mt-2">
                            @csrf
                        <input class="form-control" type="search" placeholder="Type to search" name="search">
                        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                        </form>
                </div>    
                    <table class="mb-0 table table-hover">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                            @foreach($o as $order)
                                <tr><th scope="row">{{$i}}</th><td>{{$order->name}}</td><td>{{$order->email}}</td>
                                <td>{{$order->phone}}</td><td>{{$order->address}}</td>
                                <td>
                                    <form action="/deleteorder/{{$order->id}}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>&nbsp;&nbsp;&nbsp;
                                    </form>    
                                    <a class="btn btn-primary" href="/vieworderlist/{{$order->id}}">View Order</a></td></tr>
                                <!-- <td><button class="btn btn-sm btn-primary view_order" data-id="" >View Order</button></td></tr> -->
                                <?php $i++; ?>
                            @endforeach
                    
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
<script>
	// $('.view_order').click(function(){
    //     // $id = $(this).attr('data-id');
	// 	uni_modal('Order','/vieworderlist/'+$(this).attr('data-id'))
	// });
</script>
@endsection


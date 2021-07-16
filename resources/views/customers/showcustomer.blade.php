@extends('backlayouts.master')
@section('title','Show Customers')
@section('customeractive','mm-active')
@section('content')
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
        <div class="col-lg">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3 class="card-title">Show Customers</h3>
                <div class="search-wrapper" style="float:right;">
                        <form action="/customersearch" method="GET" role="search" class="form-inline mt-2">
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
                            <th>Password</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                            @foreach($c as $customer)
                                <tr><th scope="row">{{$i}}</th><td>{{$customer->name}}</td><td>{{$customer->email}}</td>
                                <td>{{$customer->phone}}</td><td>{{$customer->password}}</td><td>{{$customer->address}}</td>
                                <td>
                                    <form action="/deletecustomer/{{$customer->id}}" method="POST" class="d-inline">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>&nbsp;&nbsp;&nbsp;
                                    </form>    
                                    <!-- <a class="btn btn-primary" href="/editcustomer/{{$customer->id}}">Edit</a>--></td></tr>
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


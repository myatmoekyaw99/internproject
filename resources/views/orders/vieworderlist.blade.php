@extends('backlayouts.master')
@section('title','Show Orders')

@section('content')
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
        <div class="col-lg">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3 class="card-title">View Orders</h3>
<!-- <div class="container-fluid">
	 --><!-- <table class="table table-bordered"> -->
                    <table class="mb-0 table table-hover">
                        <thead>
                            <tr>
                                <th>Order</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $total = 0;?>

                            @foreach($list as $lists)
                            <?php $total += $lists->price * $lists->oqty ; ?>
                            <tr>
                                <td>{{$lists->name}}</td>
                                <td>{{$lists->price}}</td>
                                <td>{{$lists->oqty}}</td>
                                <td>{{ $lists->price * $lists->oqty }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="3" class="text-right">TOTAL</th>
                                <th ><?php echo number_format($total,2) ?></th>
                            </tr>

                        </tfoot>
                        
                    </table>
                    <div class="text-center">
                    <a class="btn btn-primary" href="/showorder">Back</a></td>
                    </div>
                </div>
            </div>
        </div>        
    </div>
<style>
	/* #uni_modal .modal-footer{
		display: none
	} */
</style>
@endsection

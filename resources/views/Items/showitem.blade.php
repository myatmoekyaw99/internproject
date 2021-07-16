@extends('backlayouts.master')
@section('title','Show Item')

@section('content')
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
        <div class="col-lg">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3 class="card-title">Show Items</h3>
                    <div class="search-wrapper" style="float:right;">
                            <form action="/itemsearch" method="GET" role="search" class="form-inline mt-2">
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
                            <th>Price</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Image</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $i=1; ?>
                            @foreach($t as $ts)
                                <tr><th scope="row">{{$i}}</th><td>{{$ts->name}}</td><td>{{$ts->price}}</td>
                                <td>{{$ts->cname}}</td><td>{{$ts->description}}</td>
                                <td><img src="{{asset('/uploads/'.$ts->image)}}" width="80" height="80" class="ml-10"/></td>
                                <td>

                                <form action="/items/{{$ts->id}}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>&nbsp;&nbsp;&nbsp;
                                </form>
                                <a class="btn btn-primary" href="/items/{{$ts->id}}/edit">Edit</a></td></tr>
                                <?php $i++; ?>
                            @endforeach
                    
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@endsection


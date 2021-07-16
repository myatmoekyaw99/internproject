@extends('backlayouts.master')
@section('title','Show Category')

@section('content')
<!-- <h1>Show Grade</h1>

    <table class="table table-stripped">
        <thead class="bg-primary">
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Description</th>
            <th scope="col">Image</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
            <tbody>
            </tbody>
    </table> -->
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
    <div class="col-lg">
        <div class="main-card mb-3 card">
            <div class="card-body"><h3 class="card-title">Show Category</h3>
                <div class="search-wrapper" style="float:right;">
                        <form action="/categorysearch" method="GET" role="search" class="form-inline mt-2">
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
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $i=1; ?>
                        @foreach($c as $cs)
                            <tr><th scope="row">{{$i}}</th><td>{{$cs->name}}</td>
                            <td>{{$cs->description}}</td>
                            <td><img src="{{asset('/uploads/'.$cs->image)}}" width="80" height="80" class="ml-10"/></td>
                            <td>

                            <form action="/categories/{{$cs->id}}" method="POST" class="d-inline">
                                @csrf
                                <input type="hidden" name="_method" value="DELETE">
                                <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>&nbsp;&nbsp;&nbsp;
                            </form>
                            <a class="btn btn-primary" href="/categories/{{$cs->id}}/edit">Edit</a></td></tr>
                            <?php $i++; ?>
                        @endforeach
                
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection


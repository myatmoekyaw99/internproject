@extends('backlayouts.master')
@section('title','Show Admin')
@section('adminactive','mm-active')

@section('content')
    @if(session('status'))
        <p class="alert alert-success">{{session('status')}}</p>
    @endif
    <div class="row">
        <div class="col-lg">
            <div class="main-card mb-3 card">
                <div class="card-body"><h3 class="card-title">Show Admin</h3>
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
                            @foreach($a as $aa)
                                <tr><th scope="row">{{$i}}</th><td>{{$aa->name}}</td><td>{{$aa->email}}</td>
                                <td>{{$aa->phone}}</td><td>{{$aa->address}}</td>
                                <td>
                                <form action="/adminshow/{{$aa->id}}" method="POST" class="d-inline">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')" value="Delete"/>&nbsp;&nbsp;&nbsp;
                                </form>
                                </tr>
                                <?php $i++; ?>
                            @endforeach
                    
                        </tbody>
                    </table>
                    
                </div>
                <div class="text-center">
                    <a href="/adminregister" class="btn btn-primary">+ Add Admin</a>
                </div>
            </div>
        </div>
    </div>
@endsection


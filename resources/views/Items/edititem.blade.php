@extends('backlayouts.master')
@section('title','Edit item')

@section('content')
@if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-md">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h4 class="card-title">EDIT ITEMS</h4>

                        <form action="/items/{{$i->id}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name : </label>
                                <div class="col-sm-11">
                                    <input type="text" id="name" name="name" value="{{$i->name}}" class="form-control" placeholder="Enter item name" class="@error('name') is-required @enderror">
                                </div>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price : </label>
                                <div class="col-sm-11">
                                    <input type="int" id="price" name="price" value="{{$i->price}}" class="form-control" placeholder="Enter item price" class="@error('price') is-required @enderror">
                                </div>
                            </div>
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="category" class="col-sm-2 col-form-label">Category : </label>
                                <div class="col-sm-11">
                                <select class="form-control" id="category" name="category" class="@error('select') is-required @enderror">
                                    <option selected disabled>Choose category</option>
                                    @foreach($cat as $c)
                                        <option value="{{$c->id}}" 
                                            @if($c->id==$i->category)
                                            selected = "selected";
                                            @endif   
                                        >{{$c->name}}</option>
                                    @endforeach
                                </select>
                                </div>
                            </div>
                            @error('select')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="image" class="col-sm-2 col-form-label">Image : </label>
                                <div class="col-sm-11">
                                    <input type="file" id="image" name="image" class="form-control" class="@error('image') is-required @enderror">
                                </div>
                            </div>
                            @error('image')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror


                            <div class="form-group row">
                                <label for="description" class="col-sm-2 col-form-label">Description : </label>
                                <div class="col-sm-11">
                                <textarea class="form-control rounded-0" id="description" name="description" rows="3" class="@error('description') is-required @enderror">{{$i->description}}</textarea>
                                </div>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="popular" class="col-sm-2 col-form-label">Popular : </label>
                                <div class="col-sm-11">
                                    <input type="number" id="popular" name="popular" class="form-control" min="0" max="1" value="{{$i->popular}}" class="@error('popular') is-required @enderror">
                                </div>
                            </div>
                            @error('popular')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <div class="col-sm offset-sm">
                                    <button type="submit" name="submit" class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
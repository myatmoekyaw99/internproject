@extends('backlayouts.master')
@section('title','Add item')

@section('content')
@if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-md">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h4 class="card-title">ADD ITEMS</h4>
                        <!-- <form class="">
                            <div class="position-relative form-group"><label for="exampleEmail" class="">Email</label>
                                <input name="email" id="exampleEmail" placeholder="with a placeholder" type="email" class="form-control"></div>
                            <div class="position-relative form-group"><label for="examplePassword" class="">Password</label>
                                <input name="password" id="examplePassword" placeholder="password placeholder" type="password"
                                                                                                                                   class="form-control"></div>
                            <div class="position-relative form-group"><label for="exampleSelect" class="">Select</label>
                            <select name="select" id="exampleSelect" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select></div>
                            <div class="position-relative form-group"><label for="exampleSelectMulti" class="">Select Multiple</label>
                            <select multiple="" name="selectMulti" id="exampleSelectMulti" class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select></div>
                            <div class="position-relative form-group"><label for="exampleText" class="">Text Area</label>
                                <textarea name="text" id="exampleText" class="form-control"></textarea>
                            </div>
                            <div class="position-relative form-group"><label for="exampleFile" class="">File</label>
                                <input name="file" id="exampleFile" type="file" class="form-control-file">
                                <small class="form-text text-muted">This is some placeholder block-level help text for the above input. It's a bit lighter and easily wraps to a new line.</small>
                            </div>
                            <button class="mt-1 btn btn-primary">Submit</button>
                        </form> -->

                        <form action="/items" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name : </label>
                                <div class="col-sm-11">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter item name" class="@error('name') is-required @enderror">
                                </div>
                            </div>
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <div class="form-group row">
                                <label for="price" class="col-sm-2 col-form-label">Price : </label>
                                <div class="col-sm-11">
                                    <input type="int" id="price" name="price" class="form-control" placeholder="Enter item price" class="@error('price') is-required @enderror">
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
                                        <option value="{{$c->id}}">{{$c->name}}</option>
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
                                <textarea class="form-control rounded-0" id="description" name="description" rows="3" class="@error('description') is-required @enderror"></textarea>
                                </div>
                            </div>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror

                            <!-- <div class="form-group row">
                                <label for="popular" class="col-sm-2 col-form-label">Popular : </label>
                                <div class="col-sm-11">
                                    <input type="number" id="popular" name="popular" class="form-control" min="0" max="1" class="@error('popular') is-required @enderror">
                                </div>
                            </div>
                            @error('popular')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror -->

                            <div class="form-group row">
                                <div class="col-sm offset-sm">
                                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
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
@extends('backlayouts.master')
@section('title','Add category')

@section('content')
@if(session('status'))
<p class="alert alert-success">{{session('status')}}</p>
@endif

<div class="tab-content">
    <div class="tab-pane tabs-animation fade show active" id="tab-content-0" role="tabpanel">
        <div class="row">
            <div class="col-md">
                <div class="main-card mb-3 card">
                    <div class="card-body"><h4 class="card-title">ADD CATEGORY</h4>

                        <form action="/categories" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label for="name" class="col-sm-2 col-form-label">Name : </label>
                                <div class="col-sm-11">
                                    <input type="text" id="name" name="name" class="form-control" placeholder="Enter category name" class="@error('name') is-required @enderror">
                                </div>
                            </div>
                            @error('name')
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
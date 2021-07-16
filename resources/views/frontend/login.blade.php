@extends('frontend.layout.master')
@section('title','Login')
@section('content')
     <!-- Masthead-->
    <header class="masthead">
            <div class="container h-100">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end mb-4" style="background: #0000002e;">
                    	 <h3 class="text-uppercase text-white font-weight-bold">Login</h3>
                        <hr class="divider my-4" />
                    </div>   
                </div>
            </div>
    </header>

    <section class="page-section" style="background-color:#ececec">
        <div class="container">
        <h2 class="text-center font-italic">Sign in to your Account</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                <strong class="text-center" style="color:red">{{Session::get('success')}}</strong>
                <div class="card">
                    <div class="card-header">Customer Login </div>
                        <div class="card-body">
                            <form action="/login/customer" method="POST" >
                                @csrf
                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right">EMAIL :</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-md-4 col-form-label text-md-right">PASSWORD :</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <!-- <div class="form-group row">
                                    <div class="col-md-6 offset-md-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                </div> -->

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">Login</button>
                                        <!-- @if (Route::has('password.request'))
                                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                                {{ __('Forgot Your Password?') }}
                                            </a>
                                        @endif -->

                                    </div>
                                </div>
                            </form>
                        </div>

                    </div> 
                </div> 
            </div>

        </div>
        </section>
@endsection
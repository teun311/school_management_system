
@extends('front.master')
@section('title')
    Login
@endsection

@section('body')
    <div class="container py-5">
        <div class="col-lg-6 mx-auto">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title mb-4 text-uppercase">Login Form </h6>
                    <p class="text-center text-danger">{{Session::get('message')}}</p>

                    <form action="{{route('new-login')}}" method="POST">
                        @csrf
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="email" id="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="password" id="">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label for="" class="col-sm-3 col-form-label">Login As</label>
                            <div class="col-sm-9">
                                <label><input type="radio" name="check" value="1"/>Teacher</label>
                                <label><input type="radio" name="check" value="0"/>Student</label>
                            </div>
                        </div>

                        <div class="form-group row justify-content-end">
                            <div class="col-sm-9">

                                <div>
                                    <button type="submit" class="btn btn-primary w-md">Login</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

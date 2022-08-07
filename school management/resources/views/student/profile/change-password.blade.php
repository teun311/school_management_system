@extends('front.master')
@section('title')
    change Password
@endsection

@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                @include('student.menu')
                <div class="col-md-9">
                    <div class="card ">
                        <div class="card-header border font-weight-bold">Change Password</div>
                        <div class="card-body border">
                            <p class="text-center text-warning">{{Session::get('message')}}</p>
                            <form action="{{route('update-student-password', ['id'=>$id])}}" method="post" >
                                @csrf
                                <div class="row mb-3">
                                    <label class="col-md-3">Previous Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="prev_password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3">New Password</label>
                                    <div class="col-md-9">
                                        <input type="password" class="form-control" name="password"/>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-md-3"></label>
                                    <div class="col-md-9">
                                        <input type="submit" value="Update Password" class="btn btn-outline-success" name=""/>
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

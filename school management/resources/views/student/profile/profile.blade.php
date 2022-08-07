@extends('front.master')
@section('title')
    {{session::get('student_name')}}
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
               @include('student.menu')
                <div class="col-md-9">
                    <div class="card ">
                        <div class="card-header border font-weight-bold">My Profile information </div>
                        <div class="card-body border">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <form action="{{route('update-student-profile', ['id'=>$student->id])}}" method="post" enctype="multipart/form-data">
                                @csrf
                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <img src="{{asset($student->image)}}" alt="{{$student->name}}" height="200">
                                    <input type="file" class="form-control-file" name="image" accept="image/*"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Full Name</label>
                                <div class="col-md-9">
                                    <input type="text" value="{{$student->name}}" class="form-control" name="name"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Email</label>
                                <div class="col-md-9">
                                    <input type="email" value="{{$student->email}}" class="form-control" name="email"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3">Mobile</label>
                                <div class="col-md-9">
                                    <input type="number" value="{{$student->mobile}}" class="form-control" name="mobile"/>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-md-3"></label>
                                <div class="col-md-9">
                                    <input type="submit" value="Update Profile" class="btn btn-outline-success" name=""/>
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

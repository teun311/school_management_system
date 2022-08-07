@extends('front.master')
@section('title')
    enroll subject
@endsection

@section('body')
    <div class="container py-5">
        <div class="row">
            <div class="col-lg-8 mx-auto">
                <div class="card">
                    <div class="card-header border">
                        <h4>Enroll Form</h4>
                    </div>
                    <div class="card-body">
                        <p class="text-center text-danger">{{Session::get('message')}}</p>

                        <form action="{{route('new-enroll',['id'=> $id])}}" method="POST">
                            @csrf
                            <div class="form-group row mb-4">
                                <label for="" class="col-sm-3 col-form-label">Student Name</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" name="name" id="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control" name="email" id="">
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label for="" class="col-sm-3 col-form-label">Phone Number</label>
                                <div class="col-sm-9">
                                    <input type="number" class="form-control" name="mobile" id="">
                                </div>
                            </div>
                            <div class="form-group row justify-content-end">
                                <div class="col-sm-9">

                                    <div>
                                        <button type="submit" class="btn btn-primary w-md">Confirm Enroll</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

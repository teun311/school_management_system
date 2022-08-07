@extends('front.master')

@section('title')
    {{$subject->title}}
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                </div>
            </div>
            <div class="row ">
                <div class="col-md-6 ">
                    <div class="card card-body border">
                        <img src="{{asset($subject->image)}}" alt="">
                    </div>
                </div>

                <div class="col-md-6 ">
                    <div class="card card-body border">
                        <h1>{{$subject->title}}</h1>
                        <p>Course Fee :{{$subject->fee}}</p>
                        <a href="{{route('enroll-now',['id'=>$subject->id])}}" class="btn btn-success w-25 mx-auto {{$check == true ? 'disabled btn-danger' : ''}}">{{$check == true ? 'Applyed' : 'Enroll Now'}}</a>
                        <hr/>
                        <h2>Trainer Name:{{$subject->teacher->name }}</h2>
                        <img  src="{{asset($subject->teacher->image)}}" alt="" height="75"; width="100"/>
                        <hr/>
                        <div>{!! $subject->short_description !!}</div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card card-body rounded-0">
                        <h1>Course Module Details</h1>
                        <hr/>
                       <div>{!! $subject->long_description !!}</div>
                        <hr/>
                        <a href="" class="btn btn-outline-success w-25 mx-auto">Enroll Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

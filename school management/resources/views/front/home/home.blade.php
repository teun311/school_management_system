@extends('front.master')

@section('title')
    home
@endsection

@section('body')
    <section class="">
        <div class="container-fluid  "style="height: 300px;background: #0e9f6e;">
            <h4 class="text-center text-warning">{{Session::get('message')}}</h4>
        </div>
    </section>

    <div class="">
        <div class="container">
            <div class="row">
                @foreach($subjects as $subject)
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="row ">
                            <div class="col-md-5 ">
                                <img src="{{asset($subject->image)}}" class="image-fluid w-100 h-100" alt="">
                            </div>
                            <div class="col-md-7">
                                <div class="card-body ">
                                    <figure class="figure">
                                        <blockquote class="blockquote">
                                            <p>{{$subject->title}}</p>
                                        </blockquote>
                                        <figcaption class="blockquote-footer">
                                            {{$subject->teacher->name}}
                                        </figcaption>
                                    </figure>
                                   <div>{!! $subject->short_description !!}</div>
                                    <p class="card-text"><small class="text-muted">Last update 3 mins ago</small></p>
                                    <a href="{{route('course-detail',['id'=>$subject->id])}}" class="btn btn-outline-success">Read More</a>
                                    <a href="" class=" float-right btn btn-outline-info  ">Apply Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>


    <section class="py-5 bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-12 h-100 w-100">
                    <div class="card card-body">
                        <div class="row">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection



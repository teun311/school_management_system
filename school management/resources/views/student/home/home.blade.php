@extends('front.master')

@section('title')
    home
@endsection
@section('body')
    <section class="py-5">
        <div class="container">
            <div class="row">
               @include('student.menu')
                <div class="col-md-9">
                    <div class="card ">
                        <div class="card-header border font-weight-bold">My Applied Recent Course</div>
                        <div class="card-body border">
                            <p class="text-center text-success">{{Session::get('message')}}</p>
                            <table class="table table-bordered table-hover">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Course Title</th>
                                    <th>Trainer Name</th>
                                    <th>Course Fee</th>
                                    <th>Enroll Status</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($enrolls as $enroll)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$enroll->subject->title}}</td>
                                    <td>{{$enroll->subject->teacher_name}}</td>
                                    <td>{{$enroll->subject->fee}}</td>
                                    <td>{{$enroll->enroll_status}}</td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

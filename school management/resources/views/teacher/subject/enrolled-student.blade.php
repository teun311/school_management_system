@extends('teacher.master')
@section('title')
    Enrolled All Students
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Approved Subject</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Subject Title</th>
                                <th>Student ID</th>
                                <th>Student Name</th>
                                <th>Enroll Status</th>
                                <th>Payment Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($enrolls as $enroll)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$enroll->subject->title}}</td>
                                    <td>{{$enroll->student->id}}</td>
                                    <td>{{$enroll->student->name}}</td>
                                    <td>{{$enroll->enroll_status}}</td>
                                    <td>{{$enroll->payment_status}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
@endsection

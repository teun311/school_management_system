@extends('admin.master')
@section('title')
  Student Manage Course
@endsection

@section('body')
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">Manage Student Course</div>
                        <p class="text-center text-success">{{Session::get('message')}}</p>
                        <div class="card-body">
                            <div class="">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Course Title</th>
                                        <th>Teacher Name</th>
                                        <th>Student Name</th>
                                        <th>Enroll status</th>
                                        <th>Payment Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($enrolls as $enroll)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$enroll['course_title']}}</td>
                                            <td>{{$enroll['teacher_name']}}</td>
                                            <td>{{$enroll['student_name']}}</td>
                                            <td>{{$enroll['enroll_status']}}</td>
                                            <td>{{$enroll['payment_status']}}</td>
                                            <td>
                                                <a href="{{route('update-enroll-status',['id' => $enroll['enroll_id']])}}" class="btn {{$enroll['enroll_status'] == 'Pending' ? 'btn-warning' : 'btn-success disabled'}} btn-sm">
                                                    <i class="fa fa-upload"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection

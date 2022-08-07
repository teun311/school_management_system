@extends('admin.master')
@section('title')
    manage Student
@endsection

@section('body')
    <section class="py-3">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header bg-dark text-white">Manage Student</div>
                        <p class="text-center text-success">{{Session::get('message')}}</p>
                        <div class="card-body">
                            <div class="">
                                <table class="table table-bordered table-hover mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Student ID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Mobile</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($students as $student)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$student->id}}</td>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>{{$student->mobile}}</td>
                                        <td>{{$student->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{route('student-status', ['id' => $student->id])}}" class=" btn  {{$student->status == 1 ? 'btn-success' : 'btn-warning'}} btn-sm">
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

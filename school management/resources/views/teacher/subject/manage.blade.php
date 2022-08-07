
@extends('teacher.master')

@section('title')
Manage Subject
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Subject</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>code</th>
                                <th>Fee</th>
                                <th>Teacher ID</th>
                                <th>Teacher Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$subject->title}}</td>
                                    <td>{{$subject->code}}</td>
                                    <td>{{number_format($subject->fee)}}</td>
                                    <td>{{$subject->teacher_id}}</td>
                                    <td>{{$subject->teacher_name}}</td>
                                    <td>{{$subject->status == 1 ? 'active' : 'Inactive'}}</td>
                                    <td>
                                        <a href="{{route('edit-teacher',['id'=>$subject->id])}}" class="btn btn-success btn-sm">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="{{route('delete-teacher',['id'=>$subject->id])}}" onclick="return confirm('Are you sure to delete this?')" class="btn btn-danger btn-sm" >
                                            <i class="fa fa-trash"></i>
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
@endsection

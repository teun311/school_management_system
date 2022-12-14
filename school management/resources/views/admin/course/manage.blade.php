
@extends('admin.master')

@section('title')
    manage teacher subject
@endsection

@section('body')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Manage Teacher Course</h4>
                    <p class="text-center text-success">{{Session::get('message')}}</p>
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover mb-0">

                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Course Title</th>
                                <th>Course fee</th>
                                <th>Trainer Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($subjects as $subject)
                                <tr>
                                    <th scope="row">{{$loop->iteration}}</th>
                                    <td>{{$subject->title}}</td>
                                    <td>{{$subject->fee}}</td>
                                    <td>{{$subject->teacher->name}}</td>
                                    <td>{{$subject->status == 1 ? 'active' : 'Inactive'}}</td>
                                    <td>
                                        <a href="{{route('view-detail',['id'=>$subject->id])}}" class="btn btn-success btn-sm">
                                            <i class="fa fa-book-open"></i>
                                        </a>
                                        <a href="{{route('update-status',['id'=>$subject->id])}}" class="btn btn-{{$subject->status == 1 ? 'info' : 'warning'}} btn-sm" >
                                            <i class="fa fa-arrow-{{$subject->status == 1 ? 'up' : 'down'}}"></i>
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

@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Class</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right";>
                        <a href="{{ url('admin/assign_subject/add') }}" class="btn btn-primary">Add Assign Class</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <form action="" method="get">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputEmail1">Class Name</label>
                                                    <input type="text" name="class_name"
                                                        value="{{ Request::get('class_name') }}" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter Name">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputEmail1">Subject Name</label>
                                                    <input type="text" name="subject_name"
                                                        value="{{ Request::get('subject_name') }}" class="form-control"
                                                        id="exampleInputEmail1" placeholder="Enter Name">
                                                </div>

                                                <div class="form-group col-md-3">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="margin-top:23px">Search</button>
                                                    <a href="{{ url('admin/class/index') }}" class="btn btn-success"
                                                        style="margin-top:23px">Reset</a>
                                                </div>
                                            </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Class</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Class Name</th>
                                        <th>Subject Name</th>
                                        <th>Status</th>
                                        <th>Created By</th>
                                        <th>Created Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getRecord as $value)
                                        <tr class="text-center">
                                            <td>{{ $value->id }}</td>
                                            <td>{{ $value->class_name }}</td>
                                            <td>{{ $value->subject_name }}</td>
                                            <td>
                                                @if ($value->status == 0)
                                                    Active
                                                @else
                                                    Inactive
                                                @endif
                                            </td>
                                            <td>{{ $value->created_by_name }}</td>
                                            <td>{{ date('d-m-Y H:i:A', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{ url('admin/assign_subject/edit/' . $value->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{ url('admin/assign_subject/edit_single/' . $value->id) }}"
                                                    class="btn btn-outline btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{ url('admin/assign_subject/delete/' . $value->id) }}"
                                                    class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div style="padding:10px; float: right">
                                {!! $getRecord->appends(Illuminate\Support\Facades\Request::except('page'))->links() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

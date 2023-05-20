@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Student</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right";>
                        <a href="{{ url('admin/student/add') }}" class="btn btn-primary">Add Student</a>
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

                                @include('_message')
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Student</h3>
                                    </div>
                                    <div class="card-body">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getRecord as $value)
                                                    <tr>
                                                        <td>{{ $value->id }}</td>
                                                        <td>{{ $value->name }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>{{ date('d-m-Y H:i:A', strtotime($value->created_at)) }}</td>
                                                        <td>
                                                            <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                                                class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                            <a href="{{ url('admin/student/delete/' . $value->id) }}"
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

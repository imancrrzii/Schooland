@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>DataTables</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right";>
                        <a href="{{ url('admin/admin/add') }}" class="btn btn-primary">Add Admin</a>
                    </div>
                </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->
                                <div class="card">
                                    <form action="" method="get">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" name="name" value="{{ Request::get('name') }}"
                                                        class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Name">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputEmail1">Email</label>
                                                    <input type="email" name="email" value="{{ Request::get('email') }}"
                                                        class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter email">
                                                    <div style="color:red">{{ $errors->first('email') }}</div>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="margin-top:23px">Search</button>
                                                    <a href="{{ url('admin/admin/list') }}" class="btn btn-success"
                                                        style="margin-top:23px">Reset</a>
                                                </div>
                                            </div>
                                            <!-- /.card-body -->
                                    </form>
                                </div>
                                <!-- /.card -->
                            </div>
                            <!--/.col (right) -->
                        </div>
                    </div>

                    @include('_message')
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Admin</h3>
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
                                                <a href="{{ url('admin/admin/edit/' . $value->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{ url('admin/admin/delete/' . $value->id) }}"
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
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
    </div>
@endsection

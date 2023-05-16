@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Subject</h1>
                    </div>
                    <div class="col-sm-6" style="text-align: right";>
                        <a href="{{ url('admin/subject/add') }}" class="btn btn-primary">Add Subject</a>
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
                                                    <label for="exampleInputEmail1">Name</label>
                                                    <input type="text" name="name" value="{{ Request::get('name') }}"
                                                        class="form-control" id="exampleInputEmail1"
                                                        placeholder="Enter Name">
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <label for="exampleInputEmail1">Subject Type</label>
                                                    <select class="form-control" name="type">
                                                        <option {{ (Request::get('type') == 'Theory') ?'selected' : '' }} value="">Select Type</option>
                                                        <option value="Theory">Theory</option>
                                                        <option {{ (Request::get('type') == 'Practical') ?'selected' : '' }}value="Practical">Practical</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-3">
                                                    <button class="btn btn-primary" type="submit"
                                                        style="margin-top:23px">Search</button>
                                                    <a href="{{ url('admin/subject/index') }}" class="btn btn-success"
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
                            <h3 class="card-title">Data Subject</h3>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Type</th>
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
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->type }}</td>
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
                                                <a href="{{ url('admin/subject/edit/' . $value->id) }}"
                                                    class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                                <a href="{{ url('admin/subject/delete/' . $value->id) }}"
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

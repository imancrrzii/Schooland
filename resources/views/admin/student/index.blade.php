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
                                    <div class="card-body p-0" style="overflow: auto;">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Profile Photo</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Admission Number</th>
                                                    <th>Roll Number</th>
                                                    <th>Class</th>
                                                    <th>Gender</th>
                                                    <th>Date of Birth</th>
                                                    <th>Caste</th>
                                                    <th>Religion</th>
                                                    <th>Mobile Number</th>
                                                    <th>Admission Date</th>
                                                    <th>Blood Group</th>
                                                    <th>Height</th>
                                                    <th>Weight</th>
                                                    <th>Status</th>
                                                    <th>Created Date</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($getRecord as $value)
                                                    <tr class= "text-center">
                                                        <td>{{ $value->id }}</td>
                                                        <td>
                                                            @if (!empty($value->getProfile()))
                                                                <img src="{{ $value->getProfile() }}"
                                                                    style="height: 50px; width:50px;border-radius:15px;">
                                                            @endif
                                                        </td>
                                                        <td>{{ $value->name }} {{ $value->last_name }}</td>
                                                        <td>{{ $value->email }}</td>
                                                        <td>{{ $value->admission_number }}</td>
                                                        <td>{{ $value->roll_number }}</td>
                                                        <td>{{ $value->class_name }}</td>
                                                        <td>{{ $value->gender }}</td>
                                                        <td>{{ $value->date_of_birth }}</td>
                                                        <td>{{ $value->caste }}</td>
                                                        <td>{{ $value->religion }}</td>
                                                        <td>{{ $value->mobile_number }}</td>
                                                        <td>{{ $value->admission_date }}</td>
                                                        <td>{{ $value->blood_group }}</td>
                                                        <td>{{ $value->height }}</td>
                                                        <td>{{ $value->weight }}</td>
                                                        <td>{{ ($value->status == 0) ? 'Active' : 'Inactive' }}</td>
                                                        <td>{{ date('d-m-Y H:i:A', strtotime($value->created_at)) }}</td>
                                                        <td style="min-width:90px">
                                                            <a href="{{ url('admin/student/edit/' . $value->id) }}"
                                                                class="btn btn-warning btn-sm"><i class="fas fa-pen"></i></a>
                                                            <a href="{{ url('admin/student/delete/' . $value->id) }}"
                                                                class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
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

@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Add Class</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="" enctype="multipart/form-data" method="POST" >
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name<span style="color:red">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name') }}" placeholder="First Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name<span style="color:red">*</span></label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ old('last_name') }}" placeholder="Last Name">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Admission Number<span style="color:red">*</span></label>
                                            <input type="text" name="admission_number" class="form-control"
                                                value="{{ old('admission_number') }}" placeholder="Admission Number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Roll Number<span style="color:red">*</span></label>
                                            <input type="text" name="roll_number" class="form-control"
                                                value="{{ old('roll_number') }}" placeholder="Roll Number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Class <span style="color:red">*</span></label>
                                            <select class="form-control" name="class_id" value="{{ old('class_id') }}"
                                                required>
                                                <option value="">Select Class</option>
                                                @foreach ($getClass as $value)
                                                    <option value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color:red">*</span></label>
                                            <select class="form-control" name="gender" value="{{ old('gender') }}"
                                                required>
                                                <option value="">Select Gender</option>
                                                <option value="Male">Male</option>
                                                <option value="Female">Female</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth<span style="color:red">*</span></label>
                                            <input type="date" name="date_of_birth" class="form-control"
                                                value="{{ old('date_of_birth') }}" placeholder="Date of Birth">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Caste<span style="color:red">*</span></label>
                                            <input type="text" name="caste" class="form-control"
                                                value="{{ old('caste') }}" placeholder="Caste">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Religion<span style="color:red">*</span></label>
                                            <input type="text" name="religion" class="form-control"
                                                value="{{ old('religion') }}" placeholder="Religion">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number<span style="color:red">*</span></label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                value="{{ old('mobile_number') }}" placeholder="Mobile Number">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Admission Date<span style="color:red">*</span></label>
                                            <input type="date" name="admission_date" class="form-control"
                                                value="{{ old('admission_date') }}" placeholder="Admission Date">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Profile Picture<span style="color:red">*</span></label>
                                            <input type="file" name="profile_pic" class="form-control">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Blood Group<span style="color:red">*</span></label>
                                            <input type="text" name="blood_group" class="form-control"
                                                value="{{ old('blood_group') }}" placeholder="Blood Group">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Height<span style="color:red">*</span></label>
                                            <input type="text" name="height" class="form-control"
                                                value="{{ old('height') }}" placeholder="Height">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Weight<span style="color:red">*</span></label>
                                            <input type="text" name="weight" class="form-control"
                                                value="{{ old('weight') }}" placeholder="Weight">
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status<span style="color:red">*</span></label>
                                            <select class="form-control" name="status" required>
                                                <option value="">Select Status</option>
                                                <option value="0">Active</option>
                                                <option value="1">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email <span style="color:red">*</span></label>
                                        <input type="email" name="email" value="{{ old('email') }}"
                                            class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                                        <div style="color:red">{{ $errors->first('email') }}</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password <span
                                                style="color:red">*</span></label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

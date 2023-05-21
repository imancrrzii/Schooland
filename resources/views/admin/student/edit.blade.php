@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Student</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label>First Name<span style="color:red">*</span></label>
                                            <input type="text" name="name" class="form-control"
                                                value="{{ old('name', $getRecord->name) }}" placeholder="First Name">
                                            <div style="color:red">{{ $errors->first('name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Last Name<span style="color:red">*</span></label>
                                            <input type="text" name="last_name" class="form-control"
                                                value="{{ old('last_name', $getRecord->last_name) }}"
                                                placeholder="Last Name">
                                            <div style="color:red">{{ $errors->first('last_name') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Admission Number<span style="color:red">*</span></label>
                                            <input type="text" name="admission_number" class="form-control"
                                                value="{{ old('admission_number', $getRecord->admission_number) }}"
                                                placeholder="Admission Number">
                                            <div style="color:red">{{ $errors->first('admission_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Roll Number<span style="color:red">*</span></label>
                                            <input type="text" name="roll_number" class="form-control"
                                                value="{{ old('roll_number', $getRecord->roll_number) }}"
                                                placeholder="Roll Number">
                                            <div style="color:red">{{ $errors->first('roll_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Class <span style="color:red">*</span></label>
                                            <select class="form-control" name="class_id" required>
                                                <option value="">Select Class</option>
                                                @foreach ($getClass as $value)
                                                    <option
                                                        {{ old('class_id', $getRecord->class_id) == $value->id ? 'selected' : '' }}
                                                        value="{{ $value->id }}">{{ $value->name }}</option>
                                                @endforeach
                                            </select>
                                            <div style="color:red">{{ $errors->first('class_id') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Gender <span style="color:red">*</span></label>
                                            <select class="form-control" name="gender" required>
                                                <option value="">Select Gender</option>
                                                <option
                                                    {{ old('gender', $getRecord->gender) == 'Male' ? 'selected' : '' }}
                                                    value="Male">Male</option>
                                                <option
                                                    {{ old('gender', $getRecord->gender) == 'Demale' ? 'selected' : '' }}
                                                    value="Female">Female</option>
                                            </select>
                                            <div style="color:red">{{ $errors->first('gender') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Date of Birth<span style="color:red">*</span></label>
                                            <input type="date" name="date_of_birth" class="form-control"
                                                value="{{ old('date_of_birth', $getRecord->date_of_birth) }}"
                                                placeholder="Date of Birth">
                                            <div style="color:red">{{ $errors->first('date_of_birth') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Caste<span style="color:red">*</span></label>
                                            <input type="text" name="caste" class="form-control"
                                                value="{{ old('caste', $getRecord->caste) }}" placeholder="Caste">
                                            <div style="color:red">{{ $errors->first('caste') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Religion<span style="color:red">*</span></label>
                                            <input type="text" name="religion" class="form-control"
                                                value="{{ old('religion', $getRecord->religion) }}"
                                                placeholder="Religion">
                                            <div style="color:red">{{ $errors->first('religion') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Mobile Number<span style="color:red">*</span></label>
                                            <input type="text" name="mobile_number" class="form-control"
                                                value="{{ old('mobile_number', $getRecord->mobile_number) }}"
                                                placeholder="Mobile Number">
                                            <div style="color:red">{{ $errors->first('mobile_number') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Admission Date<span style="color:red">*</span></label>
                                            <input type="date" name="admission_date" class="form-control"
                                                value="{{ old('admission_date', $getRecord->admission_date) }}"
                                                placeholder="Admission Date">
                                            <div style="color:red">{{ $errors->first('admission_date') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Profile Picture<span style="color:red">*</span></label>
                                            <input type="file" name="profile_pic" class="form-control">
                                            <div style="color:red">{{ $errors->first('profile_pic') }}</div>
                                            @if (!empty($getRecord->getProfile()))
                                                <img src="{{ $getRecord->getProfile() }}" style="width: auto; height: 50px;">
                                            @endif
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Blood Group<span style="color:red">*</span></label>
                                            <input type="text" name="blood_group" class="form-control"
                                                value="{{ old('blood_group', $getRecord->blood_group) }}"
                                                placeholder="Blood Group">
                                            <div style="color:red">{{ $errors->first('blood_group') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Height<span style="color:red">*</span></label>
                                            <input type="text" name="height" class="form-control"
                                                value="{{ old('height', $getRecord->height) }}" placeholder="Height">
                                            <div style="color:red">{{ $errors->first('height') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Weight<span style="color:red">*</span></label>
                                            <input type="text" name="weight" class="form-control"
                                                value="{{ old('weight', $getRecord->weight) }}" placeholder="Weight">
                                            <div style="color:red">{{ $errors->first('weight') }}</div>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <label>Status<span style="color:red">*</span></label>
                                            <select class="form-control" name="status" required>
                                                <option value="">Select Status</option>
                                                <option {{ old('status', $getRecord->status) == 0 ? 'selected' : '' }}
                                                    value="0">Active</option>
                                                <option {{ old('status', $getRecord->status) == 1 ? 'selected' : '' }}
                                                    value="1">Inactive</option>
                                            </select>
                                            <div style="color:red">{{ $errors->first('status') }}</div>
                                        </div>
                                    </div>
                                    <hr />
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email <span style="color:red">*</span></label>
                                        <input type="email" name="email"
                                            value="{{ old('email', $getRecord->email) }}" class="form-control"
                                            id="exampleInputEmail1" placeholder="Enter email">


                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Password <span
                                                style="color:red">*</span></label>
                                        <input type="password" name="password" value="{{ old('password') }}"
                                            class="form-control" id="exampleInputPassword1" placeholder="Enter Password">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

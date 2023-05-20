@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1>Edit Assign Subject</h1>
                    </div>
                </div>
            </div>
        </section>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Class Name</label>
                                        <select class="form-control" name="class_id" required>
                                            <option value="">Select Class</option>
                                            @foreach ($getClass as $class)
                                                <option {{ ($getRecord->class_id == $class->id) ? 'selected' : ''}} value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Subject Name</label>
                                            @foreach ($getSubject as $subject)
                                            @php
                                                $checked = "";
                                            @endphp
                                            @foreach ($getAssignSubjectID as $subjectAssign)
                                                @if($subjectAssign->subject_id == $subject->id)
                                                    @php
                                                        $checked = "checked";
                                                    @endphp
                                                @endif
                                            @endforeach
                                                <div>
                                                    <label style="font-weight: normal;">
                                                        <input {{$checked}} type="checkbox" value="{{ $subject->id }}"name="subject_id[]""> {{ $subject->name}}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Status</label>
                                        <select class="form-control" name="status">
                                            <option {{ ($getRecord->status == 0) ? 'selected' : ''}} value="0">Active</option>
                                            <option {{ ($getRecord->status == 1) ? 'selected' : ''}} value="1">Inactive</option>
                                        </select>
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

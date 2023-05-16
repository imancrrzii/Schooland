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
                            <form action="" method="POST">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Class Name</label>
                                        <input type="text" name="name" value="{{ $getRecord->name }}" class="form-control" id="exampleInputEmail1"
                                            placeholder="Enter Class Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Type Name</label>
                                        <select class="form-control" name="type">
                                            <option {{ ($getRecord->type == '') ? 'selected' : ''}} value="Theory">Theory</option>
                                            <option {{ ($getRecord->type == '') ? 'selected' : ''}} value="Practical">Practical</option>
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

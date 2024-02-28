@extends('admin.layouts.master')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Create Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="" class="btn btn-primary"></a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
    @if(session()->has('success'))
        {{session()->get('success')}}
    @endif
    @if(session()->has('error'))
        {{session()->get('error')}}
    @endif
    <!-- Main content -->
        <section class="content">
            <form action="{{url('class/add')}}"
                  method="post">
            @csrf
            <!-- Default box -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">title</label>
                                        <input type="text" name="title" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">age</label>
                                        <input type="text" name="age" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">time</label>
                                        <input type="text" name="time" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name">money</label>
                                        <input type="text" name="money" id="name" class="form-control" placeholder="Name">
                                    </div>
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">seats</label>
                                    <input type="text" name="seats" id="metaKeyword" class="form-control" placeholder="metaKeyword">
                                </div>
                            </div>




                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary">Create</button>
                    <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
    </div>
    </form>
    <!-- /.card -->
    </section>
    <!-- /.content -->
    </div>
@stop

@extends('admin.layouts.master')


@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid my-2">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>update Category</h1>
                    </div>
                    <div class="col-sm-6 text-right">
                        <a href="{{url('category/update'.$category->id)}}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="container-fluid">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="name">Name</label>
                                    <input type="text" value="{{$category->name}}" name="name" id="name" class="form-control" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">Slug</label>
                                    <input type="text" name="slug" value="{{$category->slug}}" id="slug" class="form-control" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">title</label>
                                    <input type="text" name="slug" id="slug" value="{{$category->title}}"class="form-control" placeholder="Slug">
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">mataTitle</label>
                                    <input type="text" name="slug" id="slug"value="{{$category->mataTitle}}" class="form-control" placeholder="Slug">
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">mataDescription</label>
                                    <input type="text" name="slug" id="slug"  value="{{$category->mataDescription}}" class="form-control" placeholder="Slug">
                                </div>
                            </div><div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email">mataKeyword</label>
                                    <input type="text" name="slug" id="slug" value="{{$category->mataKeyword}}" class="form-control" placeholder="Slug">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label for="name">status</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>



                        </div>
                    </div>
                </div>
                <div class="pb-5 pt-3">
                    <button class="btn btn-primary">Create</button>
                    <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
                </div>
            </div>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@stop

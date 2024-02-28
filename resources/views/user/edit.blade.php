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
            <form action="{{url('blog/update/'.$blog->id)}}"
                  method="post" enctype="multipart/form-data" >
            @csrf
            <!-- Default box -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">

                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">Slug</label>
                                        <input type="text" name="slug" value="{{$blog->slug}}" id="slug" class="form-control" placeholder="Slug">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">title</label>
                                        <input type="text" name="title" id="title" value="{{$blog->title}}" class="form-control" placeholder="title">
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">description</label>
                                        <input type="text" name="description" value="{{$blog->description}}" id="metaTitle" class="form-control" placeholder="metaTitle">
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">metaDescription</label>
                                        <input type="text" name="meta description" id="metaDescription" class="form-control" placeholder="metaDescription">
                                    </div>
                                </div><div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email">metaKeyword</label>
                                        <input type="text" name="meta keyword" id="metaKeyword" class="form-control" placeholder="metaKeyword">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">status</label>
                                    <select name="status" id="category" class="form-control">
                                        <option
                                       @if($blog->status==0)selected @endif
                                                 value="0">
                                            not active</option>
                                        <option                                          @if($blog->status==0)selected @endif
                                        @if($blog->status==1)selected @endif
                                        value="1">active</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">publish</label>
                                    <select name="is_publish" id="category" class="form-control">
                                        <option value="0">not published </option>
                                        <option value="1">published</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="name">category</label>
                                    <select name="category_id" id="category" class="form-control">
                                        @foreach($category as $category)
                                            <option value="0">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>  </label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file" name="image">
                                        <span class="file-custom"></span>
                                    </label>

                                </div>


                            </div>
                        </div>
                    </div>
                    <div class="pb-5 pt-3">
                        <button class="btn btn-primary">update</button>
                        <a href="brands.html" class="btn btn-outline-dark ml-3">Cancel</a>
                    </div>
                </div>
            </form>
            <!-- /.card -->
        </section>
        <!-- /.content -->
    </div>
@stop

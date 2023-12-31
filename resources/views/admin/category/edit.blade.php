@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit
                        <a href="javascript:history.back()" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{url("admin/category/$category->id")}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="">Name</label>
                                <input type="text" value="{{$category->name}}" name="name" class="form-control">
                                @error('name') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Slug</label>
                                <input type="text" value="{{$category->slug}}" name="slug" class="form-control">
                                @error('slug') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control" rows="3">{{$category->description}}</textarea>
                                @error('description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control">
                                <img src="{{asset("uploads/category/$category->image")}}" alt="" width="60px" height="60px">
                            </div>
                          
                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" {{$category->status == "1" ? "checked" : ""}}>
                            </div>
                            <div class="col-md-12 my-4">
                                <h4>SEO Tags</h4>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" value="{{$category->meta_title}}" name="meta_title" class="form-control">
                                @error('meta_title') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" id="description" class="form-control" rows="3">{{$category->meta_keyword}}</textarea>
                                @error('meta_keyword') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" id="description" class="form-control" rows="3">{{$category->meta_description}}</textarea>
                                @error('meta_description') <small class="text-danger">{{$message}}</small> @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary float-end">
                                    Update
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
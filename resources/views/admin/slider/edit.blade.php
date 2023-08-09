@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Slider
                        <a href="{{ url("admin/sliders/") }}" class="btn btn-danger btn-sm text-white float-end">Back</a>
                    </h3>
                </div>
                <div class="card-body">
                    <form action="{{ url("admin/sliders/$slider->id") }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")

                        <div class="mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="{{$slider->title}}" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"> {{$slider->description}}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control">
                            <img src="{{asset($slider->image)}}" alt="" width="50px" height="50px">
                        </div>

                        <div class="mb-3">
                            <label>Status</label> <br />
                            <input type="checkbox" name="status" style="width: 50px; height:50px;" {{$slider->status == "1" ? "checked" : ""}}>
                            Checked=Hidden, Unchecked=Visible
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
@endsection

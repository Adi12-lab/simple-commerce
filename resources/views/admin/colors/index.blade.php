@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">

            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif

            <div class="card">
                <div class="card-header">
                    <h3>Color List
                        <a href="{{ url('admin/colors/create') }}" class="btn btn-primary btn-sm text-white float-end">Add
                            Color</a>
                    </h3>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Color Name</th>
                                <th>Color Code</th>
                                <th>Color Status</th>
                                <th>Color Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($colors as $color)
                                <tr>
                                    <td>{{$color->id}}</td>
                                    <td>{{$color->name}}</td>
                                    <td>{{$color->code}}</td>
                                    <td>{{$color->status == "1" ? "hidden" : "visible"}}</td>
                                    <td>
                                        <a href="{{url("admin/colors/$color->id/edit")}}" class="btn btn-sm btn-primary">Edit</a>    
                                        <a href="{{url("admin/colors/$color->id/delete")}}" onClick="return confirm('Are sure about that ?')" class="btn btn-sm btn-danger">Delete</a>    
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

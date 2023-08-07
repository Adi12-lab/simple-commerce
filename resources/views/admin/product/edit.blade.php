@extends('layouts.admin')

@section('content')
    <div class="row">
        <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product
                        <a href="{{ url('admin/product/create') }}"
                            class="btn btn-primary btn-sm text-white float-end">BACK</a>
                    </h3>
                </div>
                <div class="card-body">
                    @if(session("message"))

                    <div class="alert alert-success">
                        <h5>{{session("message")}}</h5>
                    </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-warning">
                            @foreach ($errors->all() as $error)
                                <div>{{ $error }}</div>
                            @endforeach
                        </div>
                    @endif

                    <form action="{{ url('admin/product/' . $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                                    data-bs-target="#home-tab-pane" type="button" role="tab"
                                    aria-controls="home-tab-pane" aria-selected="true">
                                    Home
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="seotag" data-bs-toggle="tab" data-bs-target="#seotag-pane"
                                    type="button" role="tab" aria-controls="seotag-pane" aria-selected="false">
                                    SEO Tags
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="details-tab" data-bs-toggle="tab"
                                    data-bs-target="#details-tab-pane" type="button" role="tab"
                                    aria-controls="details-tab-pane" aria-selected="false">
                                    Details
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="image-tab" data-bs-toggle="tab"
                                    data-bs-target="#image-tab-pane" type="button" role="tab"
                                    aria-controls="image-tab-pane" aria-selected="false">
                                    Product Image
                                </button>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade border p-3 show active" id="home-tab-pane" role="tabpanel"
                                aria-labelledby="home-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Select Category</label>
                                    <select name="category_id" id="">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>



                                <div class="mb-3">
                                    <label for="">Product name</label>
                                    <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="">Product slug</label>
                                    <input type="text" name="slug" value="{{ $product->slug }}" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Select Brands</label>
                                    <select name="brand">
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->name }}"
                                                {{ $brand->name == $product->brand ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label for="">Small Description (500 words)</label>
                                    <textarea name="small_description" class="form-control" rows="4">
                                        {{ $product->small_description }}
                                    </textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="">Description</label>
                                    <textarea name="description" class="form-control" rows="4">
                                        {{ $product->description }}
                                    </textarea>
                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="seotag-pane" role="tabpanel" aria-labelledby="seotag"
                                tabindex="0">

                                <div class="mb-3">
                                    <label for="">Meta title</label>
                                    <input type="text" name="meta_title" class="form-control"
                                        value="{{ $product->meta_title }}">
                                </div>

                                <div class="mb-3">
                                    <label for="">Meta description</label>
                                    <textarea name="meta_description" class="form-control" rows="4">{{ $product->meta_description }}</textarea>
                                </div>

                                <div class="mb-3">
                                    <label for="">Meta keyword</label>
                                    <textarea name="meta_keyword" class="form-control" rows="4">{{ $product->meta_keyword }}</textarea>
                                </div>

                            </div>
                            <div class="tab-pane fade border p-3" id="details-tab-pane" role="tabpanel"
                                aria-labelledby="details-tab" tabindex="0">
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Original price</label>
                                            <input type="text" name="original_price" class="form-control"
                                                value="{{ $product->original_price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Selling price</label>
                                            <input type="text" name="selling_price" class="form-control"
                                                value="{{ $product->selling_price }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Quantity</label>
                                            <input type="number" name="quantity" class="form-control"
                                                value="{{ $product->quantity }}">
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Trending</label>
                                            <input type="checkbox" name="trending" style="width: 50px; height: 50px;"
                                                {{ $product->trending == '1' ? 'checked' : '' }}>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="">Status</label>
                                            <input type="checkbox" name="trending" style="width: 50px; height: 50px;"
                                                {{ $product->status == '1' ? 'checked' : '' }}>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="tab-pane fade border p-3" id="image-tab-pane" role="tabpanel"
                                aria-labelledby="image-tab" tabindex="0">
                                <div class="mb-3">
                                    <label for="">Upload Product Image</label>
                                    <input type="file" name="image[]" multiple class="form-control">
                                </div>
                                <div>
                                    @if ($product->productImages)
                                        <div class="row">
                                            @foreach ($product->productImages as $image)
                                                <div class="col-md-2">
                                                    <img src="{{ asset($image->image) }}" height="80" width="80"
                                                        class="me-4" alt="img">
                                                    <a href="{{url("admin/product-image/$image->id/delete")}}" class="d-block">Remove</a>
                                                </div>
                                            @endforeach
                                        </div>
                                    @else
                                        <h5>No image Added</h5>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div>
                            <button class="btn btn-primary" type="submit">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
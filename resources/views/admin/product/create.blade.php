@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Add Product
                    <a href="{{ route('products-index') }}" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">
                
                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif


                <form action="{{route('products-store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane" type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">
                                Home
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="seotag-tab" data-bs-toggle="tab" data-bs-target="#seotag-tab-pane" type="button" role="tab" aria-controls="seotag-tab-pane" aria-selected="false">
                                SEO Tags
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="details-tab" data-bs-toggle="tab" data-bs-target="#details-tab-pane" type="button" role="tab" aria-controls="details-tab-pane" aria-selected="false">
                                Details
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="image-tab" data-bs-toggle="tab" data-bs-target="#image-tab-pane" type="button" role="tab" aria-controls="image-tab-pane" aria-selected="false">
                                Product Image
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">

                        <!-- home -->
                        <div class=" p-3 tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                            <!-- category filed -->
                            <div class="mb-3">
                                <label for="">Category</label>
                                <select name="category_id" id="" class="form-control">
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- product name filed -->
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <!-- product slug filed -->
                            <div class="mb-3">
                                <label for="">Product Slug</label>
                                <input type="text" name="slug" class="form-control">
                            </div>
                            <!-- Brand -->
                            <div class="mb-3">
                                <label for="">Brand</label>
                                <select name="brand" id="" class="form-control">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->name }}">{{ $brand->name }}</option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- small desc filed -->
                            <div class="mb-3">
                                <label for="">Small Description</label>
                                <input type="text" name="small_description" class="form-control">
                            </div>
                            <!-- description filed -->
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                        <!-- SEO Tags -->
                        <div class="p-3 tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <!-- meta title filed -->
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" class="form-control">
                            </div>
                            <!-- meta desc filed -->
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4"></textarea>
                            </div>
                            <!-- meta keyword filed -->
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                        <!-- details -->
                        <div class="p-3 tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <!-- Original price filed -->
                            <div class="mb-3">
                                <label for="">Original Price</label>
                                <input type="number" name="original_price" class="form-control">
                            </div>
                            <!-- selling price filed -->
                            <div class="mb-3">
                                <label for="">Selling Price</label>
                                <input type="number" name="selling_price" class="form-control">
                            </div>
                            <!-- Quantity filed -->
                            <div class="mb-3">
                                <label for="">Quantity</label>
                                <input type="number" name="quantity" class="form-control">
                            </div>
                            <!-- trending filed -->
                            <div class="mb-3">
                                <label for="">Trending</label>
                                <input type="checkbox" name="trending" style="width: 30px; height:30px">
                            </div>
                            <!-- Status filed -->
                            <div class="mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status" style="width: 30px; height:30px">
                            </div>
                        </div>
                        <!-- image -->
                        <div class="p-3 tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary text-white">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
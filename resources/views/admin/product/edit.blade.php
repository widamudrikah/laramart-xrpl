@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12 grid-margin">
        <div class="card">
            <div class="card-header">
                <h3>Edit Product
                    <a href="" class="btn btn-primary btn-sm text-white float-end">BACK</a>
                </h3>
            </div>
            <div class="card-body">
                @if(session('message'))
                <h4 class="alert alert-success">{{session('message')}}</h4>
                @endif

                @if ($errors->any())
                <div class="alert alert-warning">
                    @foreach ($errors->all() as $error)
                    <div>{{$error}}</div>
                    @endforeach
                </div>
                @endif


                <form action="{{route('products-update', $product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
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
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="color-tab" data-bs-toggle="tab" data-bs-target="#color-tab-pane" type="button" role="tab" aria-controls="color-tab-pane" aria-selected="false">
                                Product Color
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
                                    <option value="{{ $category->id }}" {{$category->id == $product->category_id ? 'selected': ''}}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- product name filed -->
                            <div class="mb-3">
                                <label for="">Product Name</label>
                                <input type="text" value="{{$product->name}}" name="name" class="form-control">
                            </div>
                            <!-- product slug filed -->
                            <div class="mb-3">
                                <label for="">Product Slug</label>
                                <input type="text" value="{{$product->slug}}" name="slug" class="form-control">
                            </div>
                            <!-- Brand -->
                            <div class="mb-3">
                                <label for="">Brand</label>
                                <select name="brand" id="" class="form-control">
                                    @foreach($brands as $brand)
                                    <option value="{{ $brand->name }}" {{$brand->name == $product->brand ? 'selected': ''}}>
                                        {{ $brand->name }}
                                    </option>
                                    @endforeach

                                </select>
                            </div>
                            <!-- small desc filed -->
                            <div class="mb-3">
                                <label for="">Small Description</label>
                                <input type="text" value="{{$product->small_description}}" name="small_description" class="form-control">
                            </div>
                            <!-- description filed -->
                            <div class="mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="" rows="4" class="form-control">
                                {{$product->description}}
                                </textarea>
                            </div>
                        </div>

                        <!-- SEO Tags -->
                        <div class="p-3 tab-pane fade" id="seotag-tab-pane" role="tabpanel" aria-labelledby="seotag-tab" tabindex="0">
                            <!-- meta title filed -->
                            <div class="mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" value="{{$product->meta_title}}" name="meta_title" class="form-control">
                            </div>
                            <!-- meta desc filed -->
                            <div class="mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" class="form-control" rows="4">{{$product->meta_description}}</textarea>
                            </div>
                            <!-- meta keyword filed -->
                            <div class="mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" class="form-control" rows="4">{{$product->meta_keyword}}</textarea>
                            </div>
                        </div>
                        <!-- details -->
                        <div class="p-3 tab-pane fade" id="details-tab-pane" role="tabpanel" aria-labelledby="details-tab" tabindex="0">
                            <!-- Original price filed -->
                            <div class="mb-3">
                                <label for="">Original Price</label>
                                <input type="number" value="{{$product->original_price}}" name="original_price" class="form-control">
                            </div>
                            <!-- selling price filed -->
                            <div class="mb-3">
                                <label for="">Selling Price</label>
                                <input type="number" value="{{$product->selling_price}}" name="selling_price" class="form-control">
                            </div>
                            <!-- Quantity filed -->
                            <div class="mb-3">
                                <label for="">Quantity</label>
                                <input type="number" value="{{$product->quantity}}" name="quantity" class="form-control">
                            </div>
                            <!-- trending filed -->
                            <div class="mb-3">
                                <label for="">Trending</label>
                                <input type="checkbox" {{ $product->trending == '1' ? 'checked': '' }} name="trending" style="width: 30px; height:30px">
                            </div>
                            <!-- Status filed -->
                            <label for="">Status</label>
                            <div class="mb-3">
                                <input type="checkbox" {{ $product->status == '1' ? 'checked' : '' }} name="status" style="width: 30px; height:30px">
                            </div>
                        </div>
                        <!-- image -->
                        <div class="p-3 tab-pane fade" id="image-tab-pane" role="tabpanel" aria-labelledby="image-tab" tabindex="0">
                            <div class="mb-3">
                                <label for="">Upload Product Image</label>
                                <input type="file" name="image[]" multiple class="form-control">
                            </div>

                            <div>
                                @if($product->productImages)
                                <div class="row">
                                    @foreach($product->productImages as $image)
                                    <div class="col-md-4">
                                        <img src="{{ asset($image->image) }}" alt="" style="width: 80px; height: 80px;" class="me-4">
                                        <a href="{{route('products-delete-image', $image->id )}}" class="d-block mb-2">Remove</a>
                                    </div>
                                    @endforeach
                                </div>

                                @else
                                <h4>No Image</h4>
                                @endif
                            </div>

                        </div>
                        <!-- color -->
                        <div class="p-3 tab-pane fade" id="color-tab-pane" role="tabpanel" aria-labelledby="color-tab" tabindex="0">
                            <!-- ini untuk warna yang belum pernah ditambahkan -->
                            <div class="mb-3">
                                <h4>Add Product Color</h4>
                                <label for="">select color</label>
                                <hr />
                                <div class="row">
                                    @forelse($colors as $colorItem)
                                    <div class="col-md-3">
                                        <div class="p-2 border mb-3">
                                            Color : <input type="checkbox" name="colors[{{$colorItem->id}}]" value="{{$colorItem->id}}">
                                            {{$colorItem->name}}
                                            <br>
                                            Quantity : <input type="number" name="colorquantity[{{$colorItem->id}}]" style="width: 70px; border: 1px solid">
                                        </div>
                                    </div>
                                    @empty
                                    <div class="col-md-12">
                                        <h4>No Color Found</h4>
                                    </div>
                                    @endforelse
                                </div>
                            </div>

                            <!-- ini untuk warna yang sudah terpakai -->
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Color Name</th>
                                            <th>Quantity</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($product->productColors as $prodColor)
                                        <tr>
                                            <td>
                                                @if($prodColor->color)
                                                {{ $prodColor->color->name }}
                                                @else
                                                No color Found
                                                @endif
                                            </td>

                                            <td>
                                                <div class="input-group mb-3" style="width: 150px;">
                                                    <input type="text" class="form-control form-control-sm">
                                                    <button class="btn btn-primary btn-sm text-white">Update</button>
                                                </div>
                                            </td>

                                            <td>
                                                <button class="btn btn-danger btn-sm text-white">Delete</button>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
<div>
<div class="py-3 py-md-5 bg-light">
        <div class="container">
            <!-- message session -->
            @if(session()->has('message'))
                <div class="alert alert-danger">
                    {{ session('message') }}
                </div>
            @endif
            
            <div class="row">
                <div class="col-md-5 mt-3">
                    <div class="bg-white border">
                        @if($product->productImages)
                            <img src="{{ asset($product->productImages[0]->image) }}" class="w-100" alt="Img">
                        @else
                            No image
                        @endif
                    </div>
                </div>
                <div class="col-md-7 mt-3">
                    <div class="product-view">
                        <h4 class="product-name">
                            {{ $product->name }}
                        </h4>
                        <hr>
                        <p class="product-path">
                            Home / {{ $product->category->name }} / {{ $product->name }}
                        </p>
                        <div>
                            <span class="selling-price">{{ $product->selling_price }}</span>
                            <span class="original-price">{{ $product->original_price }}</span>
                        </div>

                        <!-- color -->
                        <div>
                            @if($product->productColors->count() > 0)

                                @if($product->productColors)
                                    @foreach($product->productColors as $colorItem)
                                        <!-- <input type="radio" value="{{$colorItem->id}}"> {{ $colorItem->color->name }} -->
                                        <label class="colorSelectionLabel" wire:click="colorSelected({{ $colorItem->id }})" style="background-color: {{ $colorItem->color->code }};">
                                            {{ $colorItem->color->name }}
                                        </label>
                                    @endforeach
                                @endif

                                <div class="mt-2">
                                    @if($this->prodColorQuantity == 'outOfStock')
                                        <label class="mt-2 p-2 text-white label-stock bg-danger">Out Stock</label>
                                    @elseif($this->prodColorQuantity > 0)
                                        <label class="mt-2 p-2 text-white label-stock bg-success">In Stock</label>
                                    @endif
                                </div>
<!-- dibawah ini -->
                            @else

                                @if($product->quantity)
                                    <label class="mt-2 p-2 text-white label-stock bg-success">In Stock</label>
                                @else
                                    <label class="mt-2 p-2 text-white label-stock bg-danger">Out Stock</label>
                                @endif

                            @endif
                            
                        </div>
                        <!-- end color -->

                        <!-- quantity -->
                        <div class="mt-2">
                            <div class="input-group">
                                <span class="btn btn1" wire:click="decrementQuantity"><i class="fa fa-minus"></i></span>
                                <input readonly type="text" wire:model="quantityCount" value="{{ $this->quantityCount }}" class="input-quantity" />
                                <span class="btn btn1" wire:click="incrementQuantity"><i class="fa fa-plus"></i></span>
                            </div>
                        </div>
                        <!-- end quantity -->

                        <div class="mt-2">
                            <a href="" class="btn btn1"> <i class="fa fa-shopping-cart"></i> Add To Cart</a>
                            <button type="button" wire:click="addToWishlist({{ $product->id }})" class="btn btn1"> <i class="fa fa-heart"></i> Add To Wishlist </button>
                        </div>
                        <div class="mt-3">
                            <h5 class="mb-0">Small Description</h5>
                            <p>
                            {{ $product->small_description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <div class="card">
                        <div class="card-header bg-white">
                            <h4>Description</h4>
                        </div>
                        <div class="card-body">
                            <p>
                            {{ $product->description }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

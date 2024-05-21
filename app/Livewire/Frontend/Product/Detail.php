<?php

namespace App\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Detail extends Component
{
    public $category, $product, $prodColorQuantity, $quantityCount = 1;

    public function addToWishlist($productId){
        // dd($productId);
        if(Auth::check()) {
            
            if(Wishlist::where('user_id', Auth::user()->id)->where('product_id', $productId)->exists()) {
                session()->flash('message', 'udah ada di wishlist bang');
                return false;
            } else {
                Wishlist::create([
                    'user_id'       => Auth::user()->id,
                    'product_id'    => $productId
                ]);
                session()->flash('message', 'Behasil nambah wishlist, semoga kebeli');
            }

        } else{
            session()->flash('message', 'login dulu bang');
            return false;
        }
    }


    public function colorSelected($productColorId) {
        // dd($productColorId);
        $productColor = $this->product->productColors()->where('id', $productColorId)->first();
        $this->prodColorQuantity = $productColor->quantity;

        if($this->prodColorQuantity == 0) {
            $this->prodColorQuantity = 'outOfStock';
        }
    }

    // untuk menambah
    public function incrementQuantity() {
        if($this->quantityCount < 10) {
            $this->quantityCount++;
        }
    }

    // mengurangi
    public function decrementQuantity() {
        if($this->quantityCount > 1) {
            $this->quantityCount--;
        }
    }

    public function mount($category, $product){
        $this->category = $category;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.frontend.product.detail', [
            'category'  => $this->category,
            'product'  => $this->product,
        ]);
    }
}

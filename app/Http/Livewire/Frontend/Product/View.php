<?php

namespace App\Http\Livewire\Frontend\Product;

use App\Models\Wishlist;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class View extends Component
{
    public $category, $product, $prodColorSelectedQuantity;
    

    public function addToWishList($productId) {
        if(Auth::check()) {

            if(Wishlist::where("user_id", auth()->user()->id)->where("product_id", $productId)->exists()) {
                session()->flash("message", "Already added to wishlist");
                $this->dispatchBrowserEvent("message", [
                    "text" => "Already added to wishlist",
                    "type" => "warning",
                    "status" => 409
               ]);
                return false;

            }
             else {
                Wishlist::create([
                     "user_id" => auth()->user()->id,
                     "product_id" => $productId
                 ]);
                 $this->emit("wishlistChanged");
                session()->flash("message", "Wishlist added successfully");
                $this->dispatchBrowserEvent("message", [
                    "text" => "Wishlist Added successfully",
                    "type" => "success",
                    "status" => 200
               ]);
                 return true;
             }
        }
        else {
            session()->flash("message", "Please login to continue");
            $this->dispatchBrowserEvent("message", [
                 "text" => "Please login to continue",
                 "type" => "info",
                 "status" => 401
            ]);
            return false;

        }
    }

    public function colorSelected($productColorId) {
        // dd($productColorId);

        $productColor = $this->product->productColors()->where("id", $productColorId)->first();
        $this->prodColorSelectedQuantity = $productColor->quantity;

        if($this->prodColorSelectedQuantity == 0) {
            $this->prodColorSelectedQuantity = "outOfStock";
        }
    }


    public function mount($category, $product) {
        $this->category = $category;
        $this->product = $product;

    }

    public function render()
    {
        return view('livewire.frontend.product.view',[
            "category" => $this->category,
            "product" => $this->product,
        ]);
    }
}
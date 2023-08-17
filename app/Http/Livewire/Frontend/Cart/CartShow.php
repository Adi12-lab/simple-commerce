<?php

namespace App\Http\Livewire\Frontend\Cart;

use App\Models\Cart;

use Livewire\Component;

class CartShow extends Component
{
    public $cart;
    
    public function decrementQuantity(int $cartId) {
        $cartData = Cart::where("id", $cartId)->where("user_id", auth()->user()->id)->first();

        if($cartData) {

            if( $cartData->quantity > 1) {//jika ada warnanya
                if($cartData->quantity > 1) {
                    $cartData->decrement("quantity");
                    $this->dispatchBrowserEvent("message", [
                        "text" => "Quantity Updated",
                        "type" => "success",
                        "status" => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent("message", [
                        "text" => "Quantity cannot be less thant 1",
                        "type" => "success",
                        "status" => 200
                    ]);
                    
                }
            }
            else {
                $this->dispatchBrowserEvent("message", [
                    "text" => "Something went wrong",
                    "type" => "error",
                    "status" => 404
                ]);
        }
    }
}
    public function incrementQuantity(int $cartId) {
        $cartData = Cart::where("id", $cartId)->where("user_id", auth()->user()->id)->first();

        if($cartData) {

            if( $cartData->productColor()->where("id", $cartData->product_color_id)->exists()) {//jika ada warnanya
                $productColor = $cartData->productColor()->where("id", $cartData->product_color_id)->first();
                if($productColor->quantity > $cartData->quantity) {
                    $cartData->increment("quantity");
                    $this->dispatchBrowserEvent("message", [
                        "text" => "Quantity Updated",
                        "type" => "success",
                        "status" => 200
                    ]);
                } else {
                    $this->dispatchBrowserEvent("message", [
                        "text" => "Only $productColor->quantity Quantity Available",
                        "type" => "success",
                        "status" => 200
                    ]);
                    
                }
            }
            else {
                if($cartData ->product->quantity > $cartData->quantity) {
                    $cartData->increment("quantity");
                    $this->dispatchBrowserEvent("message", [
                        "text" => "Quantity Updated",
                        "type" => "success",
                        "status" => 200
                    ]);
    
                } else {
                    $this->dispatchBrowserEvent("message", [
                        "text" => "Only ".$cartData->product->quantity ." Quantity Available",
                        "type" => "success",
                        "status" => 200
                    ]);
                    
                }
                
            }
        } else {
            $this->dispatchBrowserEvent("message", [
                "text" => "Something went wrong",
                "type" => "error",
                "status" => 404
            ]);
        }
    }

    public function render()
    {
        $this->cart = Cart::where("user_id", auth()->user()->id)->get();
        return view('livewire.frontend.cart.cart-show', [
            "cart" => $this->cart
        ]);
    }
}
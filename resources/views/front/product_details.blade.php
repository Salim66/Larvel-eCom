@extends('front.layouts.master')

@section('content')

<div style="width: 20rem; margin: 100px auto 0;">
    <div>
        <img src="{{ URL::to('/') }}/images/{{ $product->image }}" alt="product image">

        <div>
            <h4>Cart Title</h4>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corporis, iste!</p>
            <a href="#">Read More</a>
        </div>
    </div>
    <div class="product-information">
        <img src="" alt="">
        <div class="product-information">
            <img src="" alt="">
            <p><?php echo ucwords($product->pro_name); ?></p>
            <button class="btn btn-primary btn-sm text-light">
                <a href="{{ route('cart.addItem', $product->id) }}" class="add-to-cart text-light">Add To Cart</a>
            </button>
        </div>
    </div>
</div>

@endsection

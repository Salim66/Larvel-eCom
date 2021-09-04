@extends('front.layouts.master')

@section('content')
<main role="main">

    <section class="jumbotron text-center">
      <div class="container">
        <h1 class="jumbotron-heading">Album example</h1>
        <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don't simply skip over it entirely.</p>
        <p>
          <a href="#" class="btn btn-primary my-2">Main call to action</a>
          <a href="#" class="btn btn-secondary my-2">Secondary action</a>
        </p>
      </div>
    </section>

    <div class="album py-5 bg-light">
      <div class="container">

        <div class="row">

        @forelse($products as $product)
          <div class="col-md-4">
            <div class="card mb-4 box-shadow">
              <img class="card-img-top" style="height: 200px" src="{{ URL::to('/') }}/images/{{ $product->image }}" alt="Card image cap">
              <div class="card-body">
                <p class="card-text">{{ $product->pro_name }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <div class="btn-group">
                    {{-- <a href="{{ route('product.details', $product->id) }}" class="btn btn-sm btn-outline-secondary">View Product</a>
                    <a href="{{ route('cart.addItem', $product->id) }}" class="btn btn-sm btn-outline-warning">Add to cart</a> --}}
                  </div>
                  <small class="text-muted">{{ $product->created_at->diffForHumans() }}</small>
                </div>
              </div>
            </div>
          </div>
          @empty
            <h1>No Products</h1>
          @endforelse

        </div>
      </div>
    </div>

  </main>
@endsection

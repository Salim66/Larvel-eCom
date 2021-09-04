@extends('admin.master')


@section('content')

    <main class="col-sm-9 ml-sm-auto col-md-10 pt-3">
        <h3>Products</h3>

        <ul>
            @forelse ($products as $product)
            <li>
                <h4>Name of product: {{ $product->pro_name }}</h4>
                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete">
                </form>

            </li>
            @empty
            <h1>No Products</h1>
            @endforelse
        </ul>
    </main>

@endsection

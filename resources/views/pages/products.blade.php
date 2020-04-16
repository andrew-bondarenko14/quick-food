@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="catalog_header">
            Список товаров
        </div>
        <div class="row">
            @foreach($products as $product)
                <div class="col-12  col-sm-6 col-md-4 col-xl-3">
                    <div class="category_card">
                        <a href='{{ route('product', $product->id) }}'>
                            <img src="../../images/products/{{ $product->img }}" alt="{{$product->name}}" style="max-width: 100%;">
                            <span class="product_card_name">{{ $product->name }}</span>
                            <span class="product_card_desc">{{ $product->short_description }}</span>
                            <span class="card_price">{{ $product->price }}  &#8372;</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
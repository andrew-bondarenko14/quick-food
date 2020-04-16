@extends('layouts.app')

@section('content')
    <div class="container">
        <span class="product_card_title">{{ $product->name }}</span>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-4">
                <img src="../images/products/{{ $product->img }}" alt="{{$product->name}}" style="max-width: 100%;">
            </div>
            <div class="col-12 col-md-8">
                <div class="product_card_header">
                    <span class="product_card_price">{{ $product->price }} &#8372;</span>
                    @auth
                        <button class="product_card_btn auth_link">Купить</button>
                    @else
                        <button class="product_card_btn btn_disabled" disabled>Купить</button>
                        <div>Перед покупкой необходимо зарегистрироваться</div>
                    @endauth
                </div>
                <div class="product_card_weight">Вес: {{ $product->weight }}гр.</div>
                <div class="product_card_desc">Краткое описание: {{ $product->short_description }}</div>
                <div class="product_card_desc">Полное описание: {{ $product->full_description }}</div>
            </div>
        </div>
    </div>
@endsection
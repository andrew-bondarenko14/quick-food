@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="catalog_header">
            Каталог
        </div>
        <div class="row">
            @foreach($categories as $category)
                <div class="col-12 col-sm-6 col-md-4 col-xl-3">
                    <div class="category_card">
                        <a href='products/category/{{ $category->id }}'>
                            <img src="images/categories/{{ $category->img }}" alt="{{$category->name}}" style="max-width: 100%;">
                            <span class="product_card_name">{{$category->name}}</span>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
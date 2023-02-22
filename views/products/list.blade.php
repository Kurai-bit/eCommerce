@extends('layout.main')

@section('content')
    <div>

        <div class="products__container">
            <article class="products_article">

                <div class="products">
                    @foreach ($data as $product)
                        <div class="products_cell">
                            <div class="products_description">
                            <p>{{$product['name']}}</p>
                            <p>{{$product['price']}} RON</p>
                            <p>{{$product['description']}}</p>
                            </div>
                            <p><a onclick="addToCart({{$product['id']}})" class="button_prod">Add To Cart</a></p>
                        </div>
                     @endforeach
                </div>
            </article>
        </div>
    </div>

@endsection

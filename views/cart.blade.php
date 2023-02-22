<!DOCTYPE html>
<html lang="en">
<head>
    <title>Internship</title>
    <link rel="stylesheet" href="{{styleUrl('main.css')}}">
    @yield('additional-css')
</head>
<body>
<div class="wrapper">
    @include('layout.header')
    <main class="main">
        @yield('content')
        <a href="/">Back to shop</a>
        <div class="products_cart__container">
            <div style="width: 70%;  height: 100%">
                <table class="products_table_cart">
                    <tr>
                        <th>Name</th>
                        <th>Amount</th>
                        <th>Price</th>
                    </tr>
                    <tr>
                    @foreach (array_keys($products) as $product)
                        <tr><th>{{$products[$product]['name']}}</th>
                            <th>
                                <button class="btn btn-link minbtn"
                                onclick="changeAmount({{$product}},'-', {{$products[$product]['price']}})">
                                    <i class="fas fa-minus">-</i>
                                </button>

                                <input id="{{$product}}" min="0" name="quantity" value={{$products[$product]['units']}}{{--modifica--}} type="number"
                                       class="form-control form-control-sm" />

                                <button class="btn btn-link plusbtn"
                                    onclick="changeAmount({{$product}},'+', {{$products[$product]['price']}})">
                                    <i class="fas fa-plus">+</i>
                                </button>
                                <button class="btn btn-link delbtn"
                                    onclick="changeAmount({{$product}},'del',{{$products[$product]['price']}})">
                                    <i class="fas fa-plus">X</i>
                                </button>
                            </th>
                            <th>{{ $products[$product]['price']}} RON</th>
                        @endforeach
                    </tr>
                </table>
            </div>

            <div style="width: 30%;">
                <div class="summary">
                    <h3>Summary</h3>
                    <div class="summary-item" ><span class="text">Subtotal</span><span class="price" > <span id="sum">{{$sum}}</span> RON</span></div>
                    <div class="summary-item"><span class="text">Discount</span><span class="price">0 RON</span></div>
                    <div class="summary-item"><span class="text">Shipping</span><span class="price">0 RON</span></div>
                    <div class="summary-item"><span class="text">Total prod</span><span class="price"><span id="totalProd">{{$totalProdInCart}}</span> RON</span></div>
                    <div class="summary-item" ><span class="text">Total</span><span class="price"> <span id="finalSum">{{$sum}}</span> RON</span></div>
                    <form lass="form" method="post" action="../scripts/order.php">
                        <input type="submit" value="Checkout" class="btn btn-primary btn-lg btn-block">
                    </form>
                </div>
            </div>
        </div>
    </main>

    @include('layout.footer')

    <script src="{{scriptUrl('jquery-3.4.1.js')}}"></script>
    <script src="{{scriptUrl('main.js')}}"></script>
    @yield('additional-scripts')
</div>
</body>
</html>

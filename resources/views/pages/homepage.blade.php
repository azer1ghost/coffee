@extends('layout')

@section('navbar')
    @parent
    <div class="navbar-right">
        <a href="#" id="cart"><i class="fa fa-shopping-cart"></i> Cart <span class="badge">@{{cartData.length}}</span></a>
        <div class="shopping-cart">
            <div class="shopping-cart-header">
                <i class="fa fa-shopping-cart cart-icon"></i><span class="badge">@{{cartData.length}}</span>
                <div class="shopping-cart-total">
                    <span class="lighter-text">Total:</span>
                    <span class="main-color-text total">@{{ total }} AZN</span>
                </div>
            </div> <!--end shopping-cart-header -->

            <form action="{{route('checkout')}}" method="post">
                @csrf
                <ul class="shopping-cart-items list-group">
                    <li v-for="(product, index) in cartData" class="clearfix card-item" >
                        <img :src="product.image" alt="item1" height="70px" width="70px" />
                        <span class="item-name">@{{ product.name }}</span>
                        <span class="item-detail">@{{ product.description }}</span>
                        <span class="item-price">@{{ product.price }}AZN</span>
                        <span class="item-quantity">Quantity: <input :name="'quantity['+ product.id +']'" class="quantity-input" type="number" v-model:value="product.quantity"></span>
                        <span v-on:click="deleteCardItem(index)" class="item-delete">&#10006;</span>
                    </li>
                    <h1 v-show="cartData == 0" class="text-center text-muted">Empty</h1>
                </ul>
                <button type="submit" class="button form-control">Checkout <i class="fa fa-chevron-right"></i></button>
            </form>
        </div> <!--end shopping-cart -->
    </div> <!--end navbar-right -->
@endsection

@section('content')
        <div class="row mt-5">
            @foreach($products as $product)
                <div class="col-md-3">
                    <div class="card" style="width: 18rem;position: relative;">
                        <span class="product-price">{{$product->price}} AZN</span>
                        <img src="{{$product->image}}" height="200px" class="card-img-top" alt="...">
                        <div class="card-body d-flex flex-column ">
                            <h2 class="text-center">{{$product->name}}</h2>
                            <p class="text-center">{{Str::of($product->description)->words(20, '...')}}</p>
                            <button v-on:click="addToCard({{$product->id}})" class="btn btn-primary">Add to card</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        var products = @json($products);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>

    <script src="{{asset('assets/script.js')}}"></script>
@endsection

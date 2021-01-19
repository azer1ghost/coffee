@extends('layout')

@section('content')
    <div class="row mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr>
                        <th width="1" scope="row">{{$loop->iteration}}</th>
                        <td width="1"><img src="{{$product->image}}" style="width: 100px" class="card-img-top" alt="..."></td>
                        <td>{{$product->name}}</td>
                        <td>{{$product->price}} AZN</td>
                        <td>{{$product->quantity}}</td>
                        <td width="5%">{{$product->total}} AZN</td>
                    </tr>
                @endforeach
                <tr style="border-top: 1px solid grey">
                    <td align="right" colspan="6">Toplam: {{ $total }} AZN</td>
                </tr>
            </tbody>
        </table>

        <form method="post" action="{{route('payment')}}">
            @csrf
            <input type="hidden" name="orders" value='@json($orders)'>
            <div class="form-group mt-3">
                <label for="name">Adınız</label>
                <input type="text" required name="name" class="form-control" id="name" aria-describedby="nameHelp" placeholder="Adınız daxil edin">
                <small id="nameHelp" class="form-text text-muted">Sizə necə müraciət edək?</small>
            </div>
            <div class="form-group mt-3">
                <label for="name">Nömrəniz</label>
                <input type="text" required name="number" class="form-control" id="name" aria-describedby="numberHelp" placeholder="Nömrənizi daxil edin">
                <small id="numberHelp" class="form-text text-muted">Sizlə əlaqə saxlamaq üçün.</small>
            </div>
            <div class="form-group mt-3">
                <label for="adresss">Adresiniz</label>
                <input type="text" required name="address" class="form-control" id="adresss" placeholder="Adresinizi daxil edin">
            </div>
            <button type="submit" class="btn btn-primary mt-3">Ödəniş et</button>
        </form>
    </div>
@endsection

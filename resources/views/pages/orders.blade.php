@extends('layout')

@section('content')
    <div class="row mt-5">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Client</th>
                    <th scope="col">Number</th>
                    <th scope="col">Adress</th>
                    <th scope="col">Product name</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($getDate as $date => $orders)
                    @php($total = 0)
                    @foreach($orders as $key => $order)
                        @php($totalPrice = $order->quantity*$order->product->price)
                        @php($total += $totalPrice)
                        <tr>
                            @if ($key == 0 || $key % count($orders) == 0)
                                <td rowspan="{{count($orders)}}">{{$loop->parent->iteration}}</td>
                            @endif
                            @if ($key == 0 || $key % count($orders) == 0)
                                <td rowspan="{{count($orders)}}">{{$order->client_name}}</td>
                            @endif
                            @if ($key == 0 || $key % count($orders) == 0)
                                <td rowspan="{{count($orders)}}">{{$order->client_number}}</td>
                            @endif
                            @if ($key == 0 || $key % count($orders) == 0)
                                <td rowspan="{{count($orders)}}">{{$order->client_address}}</td>
                            @endif
                            <td>{{$order->product->name}}</td>
                            <td>{{$order->product->price}} AZN</td>
                            <td>{{$order->quantity}}</td>
                            <td width="5%">{{$totalPrice}} AZN</td>
                        </tr>
                    @endforeach
                    <tr><td style="color: #28a44f" colspan="8" align="right">{{$total}} AZN</td></tr>
                    <tr style="border-bottom: 1px solid black"><td colspan="8"></td></tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

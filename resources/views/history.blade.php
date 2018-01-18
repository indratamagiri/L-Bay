@extends('layouts.app')

@section('content')

<div class="col-md-8 col-md-offset-2">
    <div class="panel panel-default">
        <div class="panel-heading">My Order</div>
        @foreach($orders as $order)
        <div class="panel panel-info">
          <div class="panel-body">
            @foreach($order->cart->items as $item)
            <li class="list-group-item">
              <span class="badge">Rp.{{$item['harga']}}</span>
              {{$item['item']['name']}}  {{$item['qty']}}
            </li>
            @endforeach
          </div>
          <div class="panel-footer">
            <h4>Total Price : Rp.{{$order->cart->totalPrice}}</h4>
          </div>
        </div>
        @endforeach
      </div>
</div>


@endsection

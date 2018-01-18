@extends('layouts.app')

@section('content')


      <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">My Cart</div>
              <table class="table table-hover">
                @if(Session::has('cart'))
                  <thead>
                      <tr>
                          <th>Picture</th>
                          <th>Nama Product</th>
                          <th>Quantity</th>
                          <th>Harga</th>
                          <th>Action</th>
                      </tr>
                  </thead>
                  @foreach ($products as $key => $product)
                  <tbody>
                      <tr>
                          <td><img class="img-rounded" src="{{url('/uploads/products/'.$product['item']['foto'])}}" alt="..."	style="width:50px; height:50px; float:left;
                  					 border-radius:50%; margin-right:25px;"></td>
                          <td>{{$product['item']['name']}}</td>
                          <td>{{$product['qty']}}</td>
                          <td>Rp.{{$product['harga']}}</td>
                  			 <td><div class="btn-group" role="group">
                              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Delete
                                <span class="caret"></span>
                              </button>
                              <ul class="dropdown-menu">
                                <li><a href="{{ route('product.reduceByOne',['id'=>$product['item']['id']])}}">Delete 1</a></li>
                                <li><a  href="{{ route('product.remove',['id'=>$product['item']['id']])}}">Delete All</a></li>
                              </ul>
                            </div>

                  			 </td>
                      </tr>
                  </tbody>
                  @endforeach
              </table>
              <div class="row">
                    <div class="panel-heading">Total Harga : Rp{{$totalPrice}}</div>
                </div>
                <div class="row">
                  <div class="col-sm-6">
               <a href="{{url('checkout')}}" type="button" class="btn btn-success">Checkout</a>
           </div>
          </div>

                @else
                <div class="row">
                  <div class="panel panel-default">
                    <div class="panel-body">
                      NO Product In Cart
                    </div>
                  </div>
                </div>
                @endif
    </div>
  </div>



@endsection

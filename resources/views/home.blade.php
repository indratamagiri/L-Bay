@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
          @if(Session::has('success'))
              <div class="row">
                <div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
                  <div id="charge-message" class="alert alert-success">
                      {{ Session::get('success') }}
                    </div>
                  </div>
                </div>
                @endif
                @foreach($products as $key => $product)
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="thumbnail">
                      <img  src="{{url('/uploads/products/'.$product->foto)}}" alt="...">
                      <div class="caption">
                        <h3>{{$product->name}}</h3>

                        <div class="clearfix">
                          <div class="pull-left " style="fond-size:15px;">Rp.{{$product->harga}} </div>
                        <p><a href="{{ route('product.addToCart', ['id' => $product->id]) }}" class="btn btn-success pull-right" role="button">Add</a>

                      </div>
                      </div>
                    </div>
                  </div>

                 @endforeach


</div>
</div>
@endsection

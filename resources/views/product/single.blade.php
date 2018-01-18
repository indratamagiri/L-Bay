@extends('layouts.app')

@section('content')

<td><a href="{{ url('product/'. $product->id)}}">  <img src="{{url('/uploads/products/'.$product->foto)}}"
    style="width:50px; height:50px; float:left;
     border-radius:50%; margin-right:25px;"></td>
  <td>{{$product->name}} </td>
  <td>{{$product->harga}} </td>
  <td>{{$product->jenis_product}} </td>
  <td>{{$product->stock}}</td>
        <br>
        <br>
				  <a type="submit" href="{{url('data')}}" class="btn btn-default" value="back" >back</a>
@endsection

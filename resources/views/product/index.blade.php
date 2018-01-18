@extends('layouts.app')

@section('content')
<div class="container">
<table class="table table-hover">
	<thead>
		<tr>
			<th>No</th>
      <th>Gambar</th>
      <th>Nama</th>
      <th>Harga</th>
			<th>Stuck</th>
      <th>Jenis Product</th>
      <th>Action</th>
		</tr>
	</thead>
	<tbody>
		@foreach($products as $key => $product)
     <tr>
			<td>{{++$key}}</td>
      <td><a href="{{ url('product/'. $product->id)}}">  <img src="{{url('/uploads/products/'.$product->foto)}}"
					style="width:50px; height:50px; float:left;
					 border-radius:50%; margin-right:25px;"></td>
				<td>{{$product->name}} </td>
				<td>Rp{{$product->harga}} </td>
				<td>{{$product->stock}}</td>
				<td>{{$product->jenis_product}} </td>
				<td> <form action="{{ url('product/'.$product->id)}}/edit">
	          <button type="submit" class="btn btn-default" >Edit</button>
	       </form>
			 </td>
			 <td>
	        <form action="{{ url('product/'.$product->id)}}" method="post">
	          {{csrf_field()}}
	         <button type="submit" class="btn btn-default" value="delete" >Delete</button>
	         <input type="hidden" name="_method" value="delete">
	       </form>
			 </td>
	       </tr>
	       @endforeach
	</tbody>
</table>

<a href="{{url('product/create')}}" class="btn btn-default">ADD</a>
</div>
@endsection

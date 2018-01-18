@extends('layouts.app')

@section('content')

<form action="{{url('product/'.$product->id)}}" method="post" role="form" style="margin: 100px;"  enctype="multipart/form-data">
	<legend>Form data</legend>
	<div class="form-group">
		<label for="">Nama Pemilik</label>
		<input type="text" class="form-control" id="" name="name" value="{{$product->name}}">
		{{$errors->has('name') ? $errors->first('name') : ''}}
	</div>
	<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <img src="{{url('/uploads/products/'.$product->foto)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px; border:2px solid;">
    <input type="file" name="foto" class="btn btn-default">
{{$errors->has('foto') ? $errors->first('foto') : ''}}
	</div>
	<div class="form-group" >
		<label for="">Harga Product</label>
		<input type="number" class="form-control" id="" name="harga" value="{{$product->harga}}">
		{{$errors->has('harga') ? $errors->first('harga') : ''}}
	</div>
  <div class="form-group">
		<label for="">Jenis Product</label>
		<input type="text" class="form-control" id="" name="jenis_product" value="{{$product->jenis_product}}">
		{{$errors->has('jenis_product') ? $errors->first('jenis_product') : ''}}
	</div>
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit"   name="submit" value="post" class="btn btn-default">button</button>
</form>

@endsection

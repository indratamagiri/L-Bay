@extends('layouts.app')

@section('content')

<form action="{{url('product')}}" method="post" role="form" style="margin: 100px;"  enctype="multipart/form-data">
	<legend>Form data</legend>
	<div class="form-group">
		<label for="">Nama Pemilik</label>
		<input type="text" class="form-control" id="" name="name" placeholder="Nama Pemilik">
		{{$errors->has('name') ? $errors->first('name') : ''}}
	</div>
	<div class="form-group">
    <input type="file" name="foto" class="btn btn-default">
{{$errors->has('foto') ? $errors->first('foto') : ''}}
	</div>
	<div class="form-group">
		<label for="">Harga Product</label>
		<input type="number" class="form-control" id="" name="harga" placeholder="Harga">
		{{$errors->has('harga') ? $errors->first('harga') : ''}}
	</div>
	<div class="form-group">
		<label for="">Stuck Prodruct</label>
		<input type="number" class="form-control" id="" name="stock" placeholder="Jenis Product">
		{{$errors->has('stuck') ? $errors->first('stuck') : ''}}
	</div>
  <div class="form-group">
		<label for="">Jenis Product</label>
		<input type="text" class="form-control" id="" name="jenis_product" placeholder="Jenis Product">
		{{$errors->has('jenis_product') ? $errors->first('jenis_product') : ''}}
	</div>
  <input type="hidden" name="_token" value="{{ csrf_token()}}">
	<button type="submit"   name="submit" value="post" class="btn btn-default">button</button>
</form>

@endsection

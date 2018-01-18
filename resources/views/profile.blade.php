@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">My Profile</div>

                <div class="panel-body">
                  <img src="{{url('/uploads/avatars/'.$user->avatar)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-right:25px;">
                  <h4>{{$user->name}}'s Profile</h4>
                </div>
                  <div class="panel-body">
                    <form enctype="multipart/form-data" action="{{url('profile')}}" method="POST">
                      <label>Update Profile</label>
                      <input type="file" name="avatar" class="btn btn-default">
                      <input type="hidden" name="_token" value="{{ csrf_token()}}">
                      <br>
                      <input type="submit" name="" value="Submit" class="btn btn-default">
                    </form>
                  </div>
            </div>
        </div>

        <div class="col-md-8 col-md-offset-2">
          <div class="panel panel-default">
              <div class="panel-heading">Isi dompet</div>
                <div class="panel-body">
                  <h4>Isi Dompet anda sekarang Rp.{{$user->dompet}}</h4>
                    <div class="panel-body">
                  <form action="{{url('profile/dompet')}}" method="POST">
                  <input type="hidden" name="_token" value="{{ csrf_token()}}">
                  <br>
                  <input type="text" class="form-control" id="" name="dompet" placeholder="Isi Dompet">
                  <br>
                  <input type="submit" name="" value="Submit" class="btn btn-default">
                </form>
                  </div>
                </div>
            </div>
          </div>
        </div>
    </div>
</div>
@endsection

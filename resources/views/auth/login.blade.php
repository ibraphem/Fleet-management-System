@extends('layouts.front')

@section('content')
<div class="login-background"></div>
<div class="login-box">

  <!-- /.login-logo -->
  <div class="login-box-body">
  <div class="login-logo">
    <a href="#">
@if(!empty(setting('logo_path')))
        <img src="{{asset(setting('logo_path'))}}" alt="" height="70px">
        @else
        <img src="{{asset('images/fpos.png')}}" alt="" height="70px">
        @endif

    </a>
  </div><br><br>
  <b><p class="login-box-msg" style="color:green">{{__('Sign in to start your session')}}</p></b>
	@if (count($errors) > 0)
		<div class="alert alert-danger">
		<strong>Whoops!</strong> {{__('There were some problems with your input.')}}<br><br>
			<ul>
				@foreach ($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div>
	@endif
    <form action="{{ route('login') }}" method="post">
    	<input type="hidden" name="_token" value="{{ csrf_token() }}">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
		<button type="submit" class="btn btn-success btn-block btn-flat">{{__('Sign In')}}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <div class="social-auth-links text-center">

    </div>
    <!-- /.social-auth-links -->



  </div>
  <!-- /.login-box-body -->
</div>
@endsection

@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Vehicle Users')}}</h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
            <!-- /.box-header -->
          <!-- /.box -->
            @include('partials.flash')
            <div class="box box-success">
            	<div class="box-header">
					<h3 class="box-title">@if(!empty($vehicleuser)){{__('Edit')}} @else {{__('Create')}} @endif {{__('Vehicle User')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('vehicleusers') }}"><i class="fa fa-list"></i>&nbsp; {{__('List')}}</a>
            	</div>
            </div>
          <div class="box box-success">
            
            <!-- /.box-header -->
            <div class="box-body">
					<div class="box-header"></div>

					@if(!empty($vehicleuser))
						{{ Form::model($vehicleuser, array('route' => array('vehicleusers.update', $vehicleuser->id), 'method' => 'PUT', 'files' => true)) }}
					@else
						{{ Form::open(array('url' => 'vehicleusers', 'files' => true,)) }}
					@endif
				<div class="col-sm-6">
					<div class="form-group row">
					{{ Form::label('full_name', trans('Full Name') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::text('full_name', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div>


					<div class="form-group row">
					{{ Form::label('department', trans('Department') .' *', ['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
					{{ Form::text('department', null, array('class' => 'form-control', 'required')) }}
						</div>
					</div>
					
					<div class="form-group row">
						{{ Form::label('designation', trans('Designation'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
							{{ Form::text('designation', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group row">
					{{ Form::label('phone', trans('Phone Number') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
					{{ Form::text('phone', null, array('class' => 'form-control')), 'required' }}
					</div>
					</div>
					
					
				</div>
				<div class="col-sm-6">
					<div class="form-group row">
						{{ Form::label('email', trans('email') . ' *',['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::text('email', null, array('class' => 'form-control')), 'required' }}
						</div>
					</div>

					<div class="form-group row">
						{{ Form::label('address', trans('Address'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::text('address', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group row">
						{{ Form::label('city', trans('City'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::text('city', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group row">
						{{ Form::label('country', trans('Country'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::text('country', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<div class="row">
						<div class="col-sm-12 text-right"> 
							{{ Form::submit(trans('Submit'), array('class' => 'btn btn-success btn-sp')) }}
						</div>
					</div>
				</div>
				{{ Form::close() }}
			</div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
@endsection
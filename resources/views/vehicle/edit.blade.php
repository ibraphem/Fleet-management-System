@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Vehicle')}}</h1>
      
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
					<h3 class="box-title">@if(!empty($vehicle)){{__('Edit')}} @else {{__('Create')}} @endif {{__('Vehicle')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('vehicles') }}"><i class="fa fa-list"></i>&nbsp; {{__('List')}}</a>
            	</div>
            </div>
          <div class="box box-success">
            
            <!-- /.box-header -->
            <div class="box-body">
					<div class="box-header"></div>

					@if(!empty($vehicle))
						{{ Form::model($vehicle, array('route' => array('vehicles.update', $vehicle->id), 'method' => 'PUT', 'files' => true)) }}
					@else
						{{ Form::open(array('url' => 'vehicles', 'files' => true,)) }}
					@endif
				<div class="col-sm-6">
					<div class="form-group row">
					{{ Form::label('reg_number', trans('Reg. Number') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::text('reg_number', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div>

					<div class="form-group row">
					{{ Form::label('manufacturer', trans('Manufacturer') .' *',['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9">
							{{ Form::text('manufacturer', null, array('class' => 'form-control', 'required')) }}
						</div>
					</div>

					<div class="form-group row">
					{{ Form::label('model', trans('Model') .' *', ['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
					{{ Form::text('model', null, array('class' => 'form-control', 'required')) }}
						</div>
					</div>
					
					<div class="form-group row">
						{{ Form::label('model_year', trans('Model Year'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
							{{ Form::text('model_year', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group row">
					{{ Form::label('acquired_date', trans('Acquired date') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
					{{ Form::date('acquired_date', null, array('class' => 'form-control')), 'required' }}
					</div>
					</div>
					
				<!--	<div class="form-group row">
						{{ Form::label('company', trans('Company'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
							{{ Form::text('company', null, array('class' => 'form-control')) }}
						</div>
					</div> -->
				</div>
				<div class="col-sm-6">
				
				<div class="form-group row">
						{{ Form::label('purchase_price', trans('Purchase Price'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::text('purchase_price', null, array('class' => 'form-control')) }}
						</div>
					</div>
					<div class="form-group row">
						{{ Form::label('life', trans('Life'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::number('life', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<!--	<div class="form-group row">
						{{ Form::label('company', trans('Company'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
							{{ Form::select('select', ['Landover' => "Landover", "OverLand" => "Overland"], "Landover", ['class' => 'form-control' ]) }}
						</div>
					</div> -->

					<div class="form-group row">
						{{ Form::label('location', trans('Location') .' *',['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::text('location', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group row">
						{{ Form::label('condition', trans('Condition'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9"> 
						{{ Form::text('condition', null, array('class' => 'form-control')) }}
						</div>
					</div>

					<div class="form-group row">
						{{ Form::label('avatar', trans('Image'),['class'=>'col-sm-3 text-right']) }}
						<div class="col-sm-9">
						{{ Form::file('avatar', null, array('class' => 'form-control')) }}
							@if(isset($vehicle->avatar))
							<img src="{{asset($vehicle->avatar)}}" alt="" height="35">
							@endif
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
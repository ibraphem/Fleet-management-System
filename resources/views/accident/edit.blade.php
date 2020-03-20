@extends('layouts.admin')

@section('content')
{{ Html::script('js/angular.min.js', array('type' => 'text/javascript')) }}
{{ Html::script('js/automate.js', array('type' => 'text/javascript')) }}
<div class="content-wrapper" ng-app="automateApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Accidents')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Accident')}}</a></li>
        <li class="active">@if(isset($accident)) {{__('Edit')}} @else {{__('Create')}} @endif</li>
      </ol>
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
		              <h3 class="box-title">@if(isset($accident)) {{__('Edit')}} @else {{__('Create')}} @endif {{__('Accident')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('accident') }}"><i class="fa fa-list"></i>&nbsp; {{__('List')}}</a>
            	</div>
            </div>
          <div class="box box-success">
            
            <!-- /.box-header -->
            <div class="box-body" ng-controller="automateController">
					<div class="box-header"></div>
				@if(isset($accident))
					{{ Form::model($accident, array('route' => array('accident.update', $accident->id), 'method' => 'PUT', 'files' => true,)) }}
				@else
					{{ Form::open(array('url' => 'accident', 'files' => true,)) }}
				@endif
				<div class="col-md-6" >
                <div class="form-group row">
					{{ Form::label('accident_date', __('Accident Date') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::date('accident_date', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div> 

                     
				<div class="form-group">
                    <label for="vehicle_id" class="col-sm-3 control-label">{{trans('Veh Reg. No')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                <select class="form-control select2" name="vehicle_id" required>
                    <option value="">{{__('Select Vehicle')}}</option>
                        @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}" {{($vehicle->id) ? 'selected': ''}}>{{$vehicle->reg_number}}</option>
                        @endforeach
                    </select>
                
                    </div>
                </div> <br><br>
             
                 

                <div class="form-group row">
					{{ Form::label('repair_cost', __('Repair Cost'),['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::number('repair_cost', null, array('class' => 'form-control')) }}
					</div>
					</div>

                    <div class="form-group row">
					{{ Form::label('details', __('Details'),['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::textarea('details', null, array('class' => 'form-control')) }}
					</div>
					</div> 

				</div> 
				<div class="col-sm-6">
                <div class="form-group row">
					{{ Form::label('time', __('Time') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::time('time', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div>

                    <div class="form-group">
                    <label for="vehicle_user_id" class="col-sm-3 control-label">{{trans('Veh. User')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                <select class="form-control select2" name="vehicle_user_id" required>
                    <option value="">{{__('--Select Vehicle User--')}}</option>
                        @foreach($vehicle_users as $vehicle_user) 
                          
                        <option value="{{$vehicle_user->id}}">{{$vehicle_user->full_name}}<option>
                   
                        @endforeach
                    </select>
                
                    </div>
                </div> <br><br>

                

                    <div class="form-group row">
					{{ Form::label('description', __('description'),['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::textarea('description', null, array('class' => 'form-control')) }}
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
@section('script')
    <script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sale.js')}}"></script> 
@endsection
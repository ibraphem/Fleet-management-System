@extends('layouts.admin')

@section('content')
{{ Html::script('js/angular.min.js', array('type' => 'text/javascript')) }}
{{ Html::script('js/automate.js', array('type' => 'text/javascript')) }}
<div class="content-wrapper" ng-app="automateApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Assignment')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Assignment')}}</a></li>
        <li class="active">@if(isset($assignment)) {{__('Edit')}} @else {{__('Create')}} @endif</li>
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
		              <h3 class="box-title">@if(isset($assignment)) {{__('Edit')}} @else {{__('Create')}} @endif {{__('Assignment')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('assignment') }}"><i class="fa fa-list"></i>&nbsp; {{__('List')}}</a>
            	</div>
            </div>
          <div class="box box-success">
            
            <!-- /.box-header -->
            <div class="box-body" ng-controller="automateController">
					<div class="box-header"></div>
				@if(isset($assignment))
					{{ Form::model($assignment, array('route' => array('assignment.update', $assignment->id), 'method' => 'PUT', 'files' => true,)) }}
				@else
					{{ Form::open(array('url' => 'assignment', 'files' => true,)) }}
				@endif
				<div class="col-md-6" >
				<div class="form-group">
                    <label for="vehicle_user_id" class="col-sm-3 control-label">{{trans('Name')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                <select class="form-control select2" name="vehicle_user_id" required>
                    <option value="">{{__('Select Vehicle User')}}</option>
                        @foreach($vehicle_users as $vehicle_user)
					
                    <option value="{{$vehicle_user->id}}">{{$vehicle_user->full_name}}</option>
                        @endforeach
                    </select>
                
                    </div>
                </div> <br><br>
             
                
				<div class="form-group">
                    <label for="vehicle_id" class="col-sm-3 control-label">{{trans('Veh Reg. No')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                <select class="form-control select2" name="vehicle_id" required>
                    <option value="">{{__('Select Vehicle')}}</option>
                        @foreach($vehicles as $vehicle)
                    <option value="{{$vehicle->id}}">{{$vehicle->reg_number}}</option>
                        @endforeach
                    </select>
                
                    </div>
                </div>  <br><br>

                <div class="form-group row">
					{{ Form::label('assignment_date', __('Assignment Date') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::date('assignment_date', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div> 

          

                  
				
					<div class="row">
						<div class="col-sm-12 text-right"> 
						{{ Form::submit(trans('Submit'), array('class' => 'btn btn-success btn-sp')) }}
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
<div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		{{ Form::open(['route' => 'maintenanceroutine.store', 'method' => 'post']) }}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">{{__('Add Maintenance Routine')}}</h4>
			</div>
			<div class="modal-body">
				<div class="form-group">
					{{ Form::label('Title', __('Title *')) }}
					{{ Form::text('title', null, array('class' => 'form-control', 'required')) }}
				</div>
				<div class="form-group">
					{{ Form::label('description', __('Description')) }}
					{{ Form::textarea('description', null, array('class' => 'form-control')) }}
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">{{__('Close')}}</button>
				<button type="submit" class="btn btn-success">{{__('Create')}}</button>
			</div>
		</div>
		{{ Form::close() }}
	</div>
</div>
@endsection
@section('script')
    <script type="text/javascript" src="{{asset('js/angular.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/sale.js')}}"></script> 
@endsection
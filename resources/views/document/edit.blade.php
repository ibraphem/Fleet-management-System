@extends('layouts.admin')

@section('content')
{{ Html::script('js/angular.min.js', array('type' => 'text/javascript')) }}
{{ Html::script('js/automate.js', array('type' => 'text/javascript')) }}
<div class="content-wrapper" ng-app="automateApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Documents')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Document')}}</a></li>
        <li class="active">@if(isset($document)) {{__('Edit')}} @else {{__('Create')}} @endif</li>
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
		              <h3 class="box-title">@if(isset($document)) {{__('Edit')}} @else {{__('Create')}} @endif {{__('Document')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('document') }}"><i class="fa fa-list"></i>&nbsp; {{__('List')}}</a>
            	</div>
            </div>
          <div class="box box-success">
            
            <!-- /.box-header -->
            <div class="box-body" ng-controller="automateController">
					<div class="box-header"></div>
				@if(isset($document))
					{{ Form::model($document, array('route' => array('document.update', $document->id), 'method' => 'PUT', 'files' => true,)) }}
				@else
					{{ Form::open(array('url' => 'document', 'files' => true,)) }}
				@endif
				<div class="col-md-6" >
        <div class="form-group">
            <label for="Parts" class="col-sm-3 control-label">{{trans('Vehicle Paper')}} *</label>
            <div class="col-sm-7 no-margin no-right-padding">
        <select class="form-control select2" name="vehicle_paper_id" required>
            <option value="">{{__('Select Vehicle Paper')}}</option>
                @foreach($vehicle_papers as $vehicle_paper)
                <option value="{{$vehicle_paper->id}}">{{$vehicle_paper->title}}<option>
            
                @endforeach
            </select>
        
            </div>
            <div class="col-sm-2 no-margin no-left-padding">
      <a class="btn btn-success pull-right" href="{{url('vehicle_paper')}}/#modal-id" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; {{__('Add')}}</a>
</div>
      </div> <br><br>

                     
				<div class="form-group">
                    <label for="vehicle_id" class="col-sm-3 control-label">{{trans('Veh Reg. No')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                <select class="form-control select2" name="vehicle_id" required>
                    <option value="">{{__('Select Vehicle')}}</option>
                        @foreach($vehicles as $vehicle)
                        <option value="{{$vehicle->id}}">{{$vehicle->reg_number}}<option>
                    
                        @endforeach
                    </select>
                
                    </div>
                </div> <br><br><br>
             
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
                </div>

				</div> 
				<div class="col-sm-6">
                <div class="form-group row">
					{{ Form::label('acquired_date', __('Acquired Date') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::date('acquired_date', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div><br>
                    <div class="form-group row">
					{{ Form::label('expiry_date', __('Expiry Date'),['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::date('expiry_date', null, array('class' => 'form-control')) }}
					</div>
					</div><br>
                    <div class="form-group row">
					{{ Form::label('cost', __('Cost'),['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::number('cost', null, array('class' => 'form-control')) }}
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
  <div class="modal fade" id="modal-id">
	<div class="modal-dialog">
		{{ Form::open(['route' => 'vehiclepaper.store', 'method' => 'post']) }}
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">{{__('Add Vehicle Paper')}}</h4>
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
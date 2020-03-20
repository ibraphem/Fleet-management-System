@extends('layouts.admin')

@section('content')
{{ Html::script('js/angular.min.js', array('type' => 'text/javascript')) }}
{{ Html::script('js/automate.js', array('type' => 'text/javascript')) }}
<div class="content-wrapper" ng-app="automateApp">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Milleage')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Milleage')}}</a></li>
        <li class="active">@if(isset($milleage)) {{__('Edit')}} @else {{__('Create')}} @endif</li>
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
		              <h3 class="box-title">@if(isset($milleage)) {{__('Edit')}} @else {{__('Create')}} @endif {{__('Milleage')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('assignment') }}"><i class="fa fa-list"></i>&nbsp; {{__('List')}}</a>
            	</div>
            </div>
          <div class="box box-success">
            
            <!-- /.box-header -->
            <div class="box-body" ng-controller="automateController">
					<div class="box-header"></div>
				@if(isset($milleage))
					{{ Form::model($milleage, array('route' => array('milleage.update', $milleage->id), 'method' => 'PUT', 'files' => true,)) }}
				@else
					{{ Form::open(array('url' => 'milleage', 'files' => true,)) }}
				@endif
				<div class="col-md-6" >
                <div class="form-group">
                    <label for="month" class="col-sm-3 control-label">{{trans('Month')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                <select class="form-control select2" name="month" required>
                    <option value=''>--Select Month--</option>
                    <option value='1'>Janaury</option>
                    <option value='2'>February</option>
                    <option value='3'>March</option>
                    <option value='4'>April</option>
                    <option value='5'>May</option>
                    <option value='6'>June</option>
                    <option value='7'>July</option>
                    <option value='8'>August</option>
                    <option value='9'>September</option>
                    <option value='10'>October</option>
                    <option value='11'>November</option>
                    <option value='12'>December</option>
                </select>
                
                    </div>
                </div> <br><br>

				<div class="form-group">
                    <label for="vehicle_user_id" class="col-sm-3 control-label">{{trans('Name')}} *</label>
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
					{{ Form::label('starting_milleage', __('Starting Milleage') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::number('starting_milleage', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div> 

          <div class="form-group row">
					{{ Form::label('milleage_ceiling', __('Milleage Ceiling'),['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::number('milleage_ceiling', null, array('class' => 'form-control', 'required')) }}
					</div>
					</div>
                
				
                

				</div> 
				<div class="col-sm-6">

                <div class="form-group">
                    <label for="year" class="col-sm-3 control-label">{{trans('Year')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                    <select class="form-control select2" name="year" required>
                       <option value=""> --Select Year-- </option> 
                        <?php for($i=2019; $i<= date("Y"); $i++)  { $j= $i+1; ?>  
                        <option value=" <?= "$i"; ?>"> <?= "$i"; ?> </option>
  
                     <?php } ?>
                    </select>
                
                    </div> <br><br><br>

                    <div class="form-group">
                    <label for="vehicle_id" class="col-sm-3 control-label">{{trans('Veh Reg. No')}} *</label>
                    <div class="col-sm-9 no-margin no-right-padding">
                <select class="form-control select2" name="vehicle_id" required>
                <option value="">{{__('--Select Vehicle--')}}</option>
                        @foreach($vehicles as $vehicle)
                          
                        <option value="{{$vehicle->id}}">{{$vehicle->reg_number}}<option>
                   
                        @endforeach
                    </select>
                
                    </div><br><br><br>

                    <div class="form-group row">
					{{ Form::label('ending_milleage', __('Ending Milleage') .' *',['class'=>'col-sm-3 text-right']) }}
					<div class="col-sm-9"> 
						{{ Form::number('ending_milleage', null, array('class' => 'form-control', 'required')) }}
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
@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Milleages')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Milleage')}}</a></li>
        <li class="active">{{__('All')}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <!-- /.box-header -->
          <!-- /.box -->
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
          <div class="box box-success">
            <div class="box-header">
              <h5 class="box-title" style="color:green">Excess milleage charge is currently set at &#8358;@foreach($others as $value){{$value->cost}}@endforeach <a href="#" data-toggle="modal" data-target="#myModal{{1}}"> Click here to change appropiately.</a></h5><a class="btn btn-small btn-success pull-right" href="{{ URL::to('milleage/create') }}"><i class="fa fa-plus"></i>&nbsp; {{__('Record Milleage')}}</a>
            </div>
          </div>
          <div class="modal fade" id="myModal{{1}}" role="dialog">
     <div class="modal-dialog modal-sm">
       <div class="modal-content">
         <div class="modal-header">
           <button type="button" class="close" data-dismiss="modal">&times;</button>
           <h4 class="modal-title">{{__('New excess milleage charge')}}</h4>
         </div>
         <div class="modal-body">
           {{ Form::open(['route'=>'milleage.costchange']) }}
           
           <div class="form-group">
             {{ Form::hidden('cost_id', 1, ['class'=>'form-control']) }}
             {{ Form::number('cost', null, ['class'=>'form-control','placeholder'=>'Enter new excess milleage cost', 'required']) }}
           </div>
             
           <div class="form-group">
             {{ Form::submit('Update', ['class'=>'btn btn-success']) }}
           </div>
           {{ Form::close() }}
         </div>
         <div class="modal-footer">
           <button type="button" class="btn btn-success" data-dismiss="modal">{{__('Close')}}</button>
         </div>
       </div>
     </div>
</div>
            <!-- /.box-header -->
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
            @if(!empty($milleages))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Date')}}</th>
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Vehicle')}}</th>
            <th>{{__('Starting Milleage')}}</th>
            <th>{{__('Ending Milleage')}}</th>
            <th>{{__('Milleage Used')}}</th>
            <th>{{__('Milleage Ceiling')}}</th>
            <th>{{__('Excess Milleage')}}</th>
            <th width="80">Excess Milleaage Charge (&#8358;)</th>
         
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($milleages as $value)
      <tr>
        <td>{{date('M Y', strtotime($value->Date))}}</td> 
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{ $value->vehicle->reg_number}}</td>
        <td>{{$value->starting_milleage}}</td>
        <td>{{$value->ending_milleage}}</td>
        <td>{{$value->milleage_used}}</td>
        <td>{{$value->milleage_ceiling}}</td>
        <td>{{$value->excess_milleage}}</td>
        <td>{{$value->excess_milleage_charge}}</td>
        
        <td class="item_btn_group">
        <a href="{{ url('milleage/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Edit milleage record"></span></button></a>&nbsp;
        <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete milleage record">{{ Form::open(array('url' => 'milleage/' . $value->id, 'class' => 'form-inline')) }}
        {{ Form::hidden('_method', 'delete') }}
                  {{ Form::submit(trans('X'), array('class' => 'delete-btn')) }}
                  {{ Form::close() }}</button></a>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
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

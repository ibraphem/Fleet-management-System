@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Maintenance Schedule')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Maintenance Schedule')}}</a></li>
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
              <h3 class="box-title">{{__('Maintenance Schedule List')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('schedulemaintenance/create') }}"><i class="fa fa-plus"></i>&nbsp; {{__('Schedule Maintenance')}}</a>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
            @if(!empty($schedule_maintenances))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Scheduled Date')}}</th>
            <th>{{__('Maintenance')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($schedule_maintenances as $value)
      <tr>
        <td>{{date('d M Y', strtotime($value->schedule_date))}}</td>
        <td>{{ $value->maintenance_routine->title }}</td>
        <td>{{ $value->vehicle->reg_number}}</td> 
        <td class="item_btn_group">
        <a href="#" data-toggle="modal" data-target="#myModal{{$value->id}}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Complete maintenance"><span class="fa fa-bookmark-o"></span></button></a>&nbsp;
        <div class="modal fade" id="myModal{{$value->id}}" role="dialog">
                     <div class="modal-dialog modal-sm">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">{{__('Completed maintainance?')}}</h4>
                         </div>
                         <div class="modal-body">
                           {{ Form::open(['route'=>'schedulemaintenance.complete']) }}
                           
                           <div class="form-group">
                             {{ Form::hidden('maint_id', $value->id, ['class'=>'form-control']) }} 
                             {{ Form::date('maintenance_date', null, ['class'=>'form-control','placeholder'=>'Date completed', 'required']) }} <br><br>
                             {{ Form::number('maintenance_cost', null, ['class'=>'form-control','placeholder'=>'Maintenance cost']) }}<br><br>
                             {{ Form::text('remark', null, ['class'=>'form-control','placeholder'=>'Remarks']) }}<br><br>
                           </div>
                             
                           <div class="form-group">
                             {{ Form::submit('Complete', ['class'=>'btn btn-success']) }}
                           </div>
                           {{ Form::close() }}
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-success" data-dismiss="modal">{{__('Close')}}</button>
                         </div>
                       </div>
                     </div>
                   </div>
        <a href="{{ url('schedulemaintenance/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Edit maintenance schedule"></span></button> &nbsp;
          <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete maintenance schedule">{{ Form::open(array('url' => 'schedulemaintenance/' . $value->id, 'class' => 'form-inline')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
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

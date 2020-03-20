@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Vehicles')}}</h1>
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
              <h3 class="box-title">{{__('Vehicles List')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('vehicles/create') }}"><i class="fa fa-plus"></i>&nbsp; {{trans('New Vehicle')}}</a>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Reg. Number</th>
                        <th width="50" class="hidden-xs">Manufacturer</th>
                        <th width="50" class="hidden-xs">Model</th>
                        <th width="70" class="hidden-xs">Model Year</th>
                        <th>Acquired date</th>
                        <th>Purchase Price</th>
                        <th width="50" class="hidden-xs">Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($vehicle as $value)
        <tr>
          <td>{{ $value->reg_number }}</td>
          <td class="hidden-xs">{{ $value->manufacturer }}</td>
          <td class="hidden-xs">{{ $value->model }}</td>
          <td class="hidden-xs">{{ $value->model_year }}</td>
          <td>{{ $value->acquired_date }}</td>
          <td>&#8358; {{ $value->purchase_price }}</td>
          <td class="hidden-xs">{{ $value->location }}</td>
          <td class="item_btn_group">
          <a href="{{ url('vehicles/' . $value->id . '/') }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View vehicle info."><i class="fa fa-eye"></i></button></a> &nbsp;
          <a href="{{ url('vehicles/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Edit Vehicle"></span></button></a> &nbsp;
          <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete Vehicle">{{ Form::open(array('url' => 'vehicles/' . $value->id, 'class' => 'form-inline')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit(trans('X'), array('class' => 'delete-btn')) }}
                  {{ Form::close() }}</button></a>
          </td>
          
            
        </tr>
    @endforeach
    </tbody>
              </table>
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

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
              <h3 class="box-title">{{__('Vehicle Users List')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('vehicleusers/create') }}"><i class="fa fa-plus"></i>&nbsp; {{trans('New Vehicle User')}}</a>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
              <table id="myTable" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Department</th>
                        <th>Designation</th>
                        <th>Phone</th>
                        <th>Email</th>
                        
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
    @foreach($vehicleuser as $value)
        <tr>
          <td>{{ $value->full_name}}</td>
          <td>{{ $value->department }}</td>
          <td>{{ $value->designation }}</td>
          <td>{{ $value->phone }}</td>
          <td>{{ $value->email }}</td>
          
          <td class="item_btn_group">
          <a href="{{ url('vehicleusers/' . $value->id . '/') }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View user info."><i class="fa fa-eye"></i></button></a> &nbsp;
          <a href="{{ url('vehicleusers/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Update user record"></span></button></a> &nbsp;
          <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete user">{{ Form::open(array('url' => 'vehicleusers/' . $value->id, 'class' => 'form-inline')) }}
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

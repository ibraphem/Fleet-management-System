@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Documents')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Document')}}</a></li>
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
              <h3 class="box-title">{{__('Document List')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('document/create') }}"><i class="fa fa-plus"></i>&nbsp; {{__('Add Document')}}</a>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
            @if(!empty($documents))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Title')}}</th>
            <th>{{__('Acquired date')}}</th>
            <th>{{__('Expiry date')}}</th>
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Cost')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($documents as $value)
      <tr>
        <td>{{ $value->title }}</td>
        <td>{{date('d M Y', strtotime($value->acquired_date))}}</td>
        <td>{{date('d M Y', strtotime($value->expiry_date))}}</td>
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{ $value->vehicle->reg_number}}</td>
        <td>&#8358; {{ $value->cost}}</td>
        

        <td class="item_btn_group">
        <a href="{{ url('document/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top" title="Update document record"><span class="glyphicon glyphicon-edit"></span></button></a> &nbsp;
          <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="Update record">{{ Form::open(array('url' => 'document/' . $value->id, 'class' => 'form-inline')) }}
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





@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Parts')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Parts')}}</a></li>
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
            <h3 class="box-title">{{__('Parts List')}}</h3><a class="btn btn-small btn-success pull-right" href="#modal-id" data-toggle="modal"><i class="fa fa-plus"></i>&nbsp; {{__('Add part')}}</a>
              
            <div class="modal fade" id="modal-id">
                  <div class="modal-dialog">
                      {{ Form::open(['route' => 'maintenanceroutine.store', 'method' => 'post']) }}
                      <div class="modal-content">
                          <div class="modal-header">
                              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                              <h4 class="modal-title">{{__('Add new part')}}</h4>
                          </div>
                          <div class="modal-body">
                              <div class="form-group">
                                  {{ Form::label('name', __('Part *')) }}
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

            </div>
          </div>
            <!-- /.box-header -->
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
            @if(!empty($maintenance_routines))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
          
            <th>{{__('Parts')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($maintenance_routines as $value)
      <tr>
        
      
        <td>{{$value->title}}</td>
        

        <td class="item_btn_group">
        <a href="{{ url('maintenanceroutine/' . $value->id . '/') }}"><button class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="View part info.">View Part Info</button></a> &nbsp;
         
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

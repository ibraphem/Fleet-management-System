@extends('layouts.admin')

@section('content')
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Withdrawals')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Withdrawal List')}}</a></li>
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
              <h3 class="box-title">{{__('Assignment List')}}</h3><a class="btn btn-small btn-success pull-right" href="{{ URL::to('assignment/create') }}"><i class="fa fa-plus"></i>&nbsp; {{__('Assign Vehicle')}}</a>
            </div>
          </div>
            <!-- /.box-header -->
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
        
            @if(!empty($assignments))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Veh. Brand')}}</th>
            <th>{{__('Period Of Use')}}</th>
            <th class="hidden">{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($assignments as $value)
      <tr>
        
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{$value->vehicle->reg_number}}</td>
        <td>{{$value->vehicle->manufacturer}}&nbsp;{{$value->vehicle->model}}</td>
        <td>{{date('d M Y', strtotime($value->assignment_date))}}  - {{date('d M Y', strtotime($value->withdrawal_date))}} </td>

        <td class="hidden">
        
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

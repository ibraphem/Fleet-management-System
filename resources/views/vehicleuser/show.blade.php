@php
$avatar = '/dist/img/avatar5.png';
if (trim($vehicle_user->avatar) != 'no-foto.png') {
    $avatar = $vehicle_user->avatar;
}
@endphp
@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{__('Vehicle User Profile')}}
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
    <li><a href="#">{{__('User')}}</a></li>
    <li class="active">{{__('profile')}}</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">
@include('partials.flash')
<div class="row">
    <div class="col-md-4">

      <!-- Profile Image -->
      <div class="box box-success">
        <div class="box-body box-profile">
     <!--     <img class="profile-user-img img-responsive img-circle" src="{{asset($avatar)}}" alt="Profile picture"> -->
          <h3 class="profile-username text-center">{{$vehicle_user->full_name}}</h3>
          <ul class="list-group list-group-unbordered">
          <li class="list-group-item hidden-print">
              <b>{{__('Email')}} </b> <a class="pull-right">{{$vehicle_user->email}}</a>
            </li>
          <li class="list-group-item hidden-print">
              <b>{{__('Department')}} </b> <a class="pull-right">{{$vehicle_user->department}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Designation')}} </b> <a class="pull-right">{{$vehicle_user->designation}}</a>
            </li>
            <li class="list-group-item">
              <b>{{__('Phone Number')}} </b> <a class="pull-right">{{$vehicle_user->phone}}</a>
            </li>
            
            <li class="list-group-item hidden-print">
              <b>{{__('Address')}} </b> <a class="pull-right">{{$vehicle_user->address}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('City')}} </b> <a class="pull-right">{{$vehicle_user->city}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('country')}} </b> <a class="pull-right">{{$vehicle_user->country}}</a>
            </li>
          </ul>
      </div>
      <!-- /.box -->
      <br><br>
      <!-- About Me Box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Fuelling Record')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
              <th>{{__('Date')}}</th>
                <th>{{__('Reg. Number')}}</th>
                <th>{{__('Cost')}} (&#8358;)</th>
               
              </tr>
            </thead>
            <tbody>
              @foreach($fuels as $fuel)
              <tr>
                <td>{{date('d M Y', strtotime($fuel->fuel_date))}}</td>
                <td>{{ $fuel->vehicle->reg_number}}</td>
                <td>{{ $fuel->fuel_cost}}</td>
              </tr>
              @endforeach
              <tr>
                <td colspan="3" style="background: #00a65a;padding: 2px;"></td>
              </tr>
             
            </tbody>
          </table>
        </div>
        <!-- /.box-body -->
      </div>
        <!-- /.box-header -->
        
        <!-- /.box-body -->
      </div>
    </div>

    <!-- /.col -->
    <div class="col-md-8">
      <div class="nav-tabs-custom">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Milleage History')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Date')}}</th>
          
            <th>{{__('Vehicle')}}</th>
            
            <th>{{__('Milleage Ceiling')}}</th>
            <th>{{__('Excess Milleage')}}</th>
            <th>Excess Milleaage Charge (&#8358;)</th>
        </tr>
    </thead>
    <tbody>
      @foreach($milleages as $value)
      <tr>
      <td>{{date('d M Y', strtotime($value->Date))}}</td>
       
        <td>{{ $value->vehicle->reg_number}}</td>
        
        <td>{{$value->milleage_ceiling}}</td>
        <td>{{$value->excess_milleage}}</td>
        <td>{{$value->excess_milleage_charge}}</td>
      </tr>
      @endforeach
  </tbody>
</table>
</div>
        <!-- /.box-body -->
      </div>
    </div>

       <div class="nav-tabs-custom">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Assignment History')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            
            <th>{{__('Reg Number')}}</th>
            <th>{{__('Brand')}}</th>
            <th>Period of Assignment</th>
        </tr>
    </thead>
    <tbody>
              @foreach($assignments as $assignment)
              <tr>
                
                <td>{{ $assignment->vehicle->reg_number}}</td>
                <td>{{ $assignment->vehicle->manufacturer}} &nbsp;{{ $assignment->vehicle->model}}</td>
                @if($assignment->withdrawal_date != null)
                <td>{{date('d M Y', strtotime($assignment->assignment_date))}} - {{date('d M Y', strtotime($assignment->withdrawal_date))}} </td>
                @else
                  <td>{{date('d M Y', strtotime($assignment->assignment_date))}} - {{'Till date'}} </td>
                
                @endif
              </tr>
              @endforeach
              
             
            </tbody>
</table>
</div>
        <!-- /.box-body -->
      </div>
    </div>
        
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>
</div>

@endsection

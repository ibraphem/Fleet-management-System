
@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{__('Accident Record')}}
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
    <div class="col-md-3">

      <!-- Profile Image -->
      <div class="box box-success">
        <div class="box-body box-profile">
          

          <h3 class="profile-username text-center">{{$vehicle->manufacturer}}&nbsp;{{ $vehicle->model}}&nbsp;{{ $vehicle->model_year}}</h3>
          <ul class="list-group list-group-unbordered">
          <li class="list-group-item hidden-print">
              <b>{{__('Registration Number')}} </b> <a class="pull-right">{{$vehicle->reg_number}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Accident Date')}} </b> <a class="pull-right">{{date('d M Y', strtotime($accident->accident_date))}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Accident Time')}} </b> <a class="pull-right">{{$accident->time}}</a>
            </li>
            <li class="list-group-item">
              <b>{{__('Repair Cost')}} </b> <a class="pull-right">&#8358;{{$accident->repair_cost}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Life Span')}} </b> <a class="pull-right">{{$vehicle->life}} years</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Location')}} </b> <a class="pull-right">{{$vehicle->location}}</a>
            </li>
          </ul>
      </div>
      <!-- /.box -->
      <br><br>
      <!-- About Me Box -->
      
    </div>
</div>
    <!-- /.col -->
    <div class="col-md-9">
        <div class="col-md-6">
        
        <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Details')}}</h3>
          <div>
          <i style="line-height: 2.5">{{$accident->details}}</i>
          </div>
        </div>
        <!-- /.box-header -->
        
        <!-- /.box-body -->
      </div>
        
        </div>
      <div class="col-md-6">
        
        <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Description')}}</h3>
          <div>
          <i style="line-height: 2.5">{{$accident->description}}</i>
          </div>
        </div>
        <!-- /.box-header -->
        
        <!-- /.box-body -->
      </div>
        
        </div>

       
        
        <!-- /.tab-content -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col -->
  </div>


@endsection

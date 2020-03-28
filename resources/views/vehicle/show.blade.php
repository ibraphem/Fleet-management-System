

@php
$avatar = '/dist/img/avatar5.png';
if (trim($vehicle->avatar) != 'no-foto.png') {
    $avatar = $vehicle->avatar;
}
@endphp
@extends('layouts.admin')
@section('content')
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    {{__('Vehicle Profile')}}
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
          <img class="profile-user-img img-responsive img-circle" src="{{asset($avatar)}}" alt="Vehicle profile picture">

          <h3 class="profile-username text-center">{{$vehicle->manufacturer}}&nbsp;{{ $vehicle->model}}&nbsp;{{ $vehicle->model_year}}</h3>
          <ul class="list-group list-group-unbordered">
          <li class="list-group-item hidden-print">
              <b>{{__('Registration Number')}} </b> <a class="pull-right">{{$vehicle->reg_number}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Purchase Price')}} </b> <a class="pull-right">&#8358; {{$vehicle->purchase_price}}</a>
            </li>
            <li class="list-group-item">
              <b>{{__('Acquired date')}} </b> <a class="pull-right">{{date('d M Y', strtotime($vehicle->acquired_date))}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Life Span')}} </b> <a class="pull-right">{{$vehicle->life}} years</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('Location')}} </b> <a class="pull-right">{{$vehicle->location}}</a>
            </li>
            <li class="list-group-item hidden-print">
              <b>{{__('condition')}} </b> <a class="pull-right">{{$vehicle->condition}}</a>
            </li>
          </ul>
      </div>
      <!-- /.box -->
      <br><br>
      <!-- About Me Box -->
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Document Records')}}</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
        <table class="table table-hover table-striped">
            <thead>
              <tr>
                
                <th>{{__('Document')}}</th>
                <th>{{__('Expiry Date')}}</th>
                
               
              </tr>
            </thead>
            <tbody>
              @foreach($documents as $document)
              <tr>
                
                <td>{{ $document->title}}</td>
                <td>{{date('d M Y', strtotime($document->expiry_date))}}</td>
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
    </div>
</div>
    <!-- /.col -->
    <div class="col-md-8">
      <div class="nav-tabs-custom">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Maintenance History')}}</h3>
          <div>
           @include('maintenance.partials.maintenance_table', ['maintenances'=>$maintenance])
          
          </div>
        </div>
        <!-- /.box-header -->
        
        <!-- /.box-body -->
      </div>
    </div>

    <div class="nav-tabs-custom">
      <div class="box box-success">
        <div class="box-header with-border">
          <h3 class="box-title">{{__('Accident History')}}</h3>
          <div>
           @include('accident.partials.accident_table', ['accidents'=>$accident])
          
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

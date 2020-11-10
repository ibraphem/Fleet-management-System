@extends('layouts.manage')

@section('content')
<div class="content-wrapper" id="app">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Maintenance')}}</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> {{__('Home')}}</a></li>
        <li><a href="#">{{__('Maintenance')}}</a></li>
        <li class="active">{{__('All')}}</li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
    <div class="row">
        <div class="col-xs-12">
            @if (Session::has('message'))
                <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif
            <div class="box box-success">
            <div class="box-header">
   
              
              <a class="btn btn-small btn-success pull-right" href="{{ URL::to('maintenance/create') }}"><i class="fa fa-plus"></i>&nbsp; {{__('Add Maintenance')}}</a>
          
            </div>
          </div>
            
          
            <div class="box box-success">
              <div class="box-header"></div>
            <div class="box-body">
         
                    
                  
                    <table class="table table-striped table-bordered" id="myTable">
                        <thead>
                        <tr>
                          <th>{{__('Part')}}</th>
                          <th>{{__('Veh. Reg')}}</th>
                          <th>{{__('Maint. Date')}}</th>
                          <th>{{__('Cost')}}</th>
                          <th>{{__('remarks')}}</th>
                          <th>{{__('Actions')}}</th>
                        
                        </tr>
                        </thead>

                    </table>
                  
                </div>
            </div>
        </div>
    </div>

   
    </section>
    
</div>

@endsection

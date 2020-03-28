@if (Auth::check())
<aside class="main-sidebar">
	<section class="sidebar">
	
  <!-- sidebar menu: : style can be found in sidebar.less -->
  <ul class="sidebar-menu" data-widget="tree">
      <li class="header" >MAIN NAVIGATION</li>
      @if(auth()->user()->hasPermissionTo('customers.index'))
        <li class=""><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i> <span>{{trans('menu.dashboard')}}</span></a></li>
     <!--   <li class="{{(Request::is('customers')) ? 'active' : ''}} "><a href="{{ url('/customers') }}"><i class="fa fa-users"></i> <span>{{trans('menu.customers')}}</span></a></li>-->
      @endif
      @if(auth()->user())
      <li class="{{(Request::is('vehicles')) ? 'active' : ''}} "><a href="{{ url('/vehicles') }}"><i class="fa fa-car"></i> <span>Vehicles</span></a></li>
      @endif
      @if(auth()->user())
      <li class="{{(Request::is('vehicleusers')) ? 'active' : ''}} "><a href="{{ url('/vehicleusers') }}"><i class="fa fa-users"></i> <span>Vehicle Users</span></a></li>
      @endif
    
      @if(auth()->user())
      <li class="treeview">
          <a href="#"><i class="fa fa-user-plus"></i> <span>{{trans('Deployment')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
              @if(auth())
              <li>
                  <a href="{{ url('/assignment') }}"><i class="fa fa-circle-o"></i> <span>{{trans('Veh. Assignment')}}</span></a>
              </li>
              @endif
              @if(auth())
              <li>
                  <a href="{{ url('withdrew') }}"><i class="fa fa-circle-o"></i> Withrawal List</a>
              </li>
              @endif
          </ul>
      </li>
      @endif
      @if(auth()->user())
      <li class="treeview">
          <a href="#"><i class="fa fa-credit-card"></i> <span>{{trans('Maintenance')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
              @if(auth())
              <li>
                  <a href="{{ url('/maintenanceroutine') }}"><i class="fa fa-circle-o"></i> <span>{{trans('Maint. Routine')}}</span></a>
              </li>
              @endif
              @if(auth())
              <li>
                  <a href="{{ url('maintenance') }}"><i class="fa fa-circle-o"></i> Maint. List</a>
              </li>
              @endif
              @if(auth())
              <li>
                  <a href="{{ url('schedulemaintenance') }}"><i class="fa fa-circle-o"></i>Maint. Schedule</a>
              </li>
              @endif
          </ul>
      </li>
      @endif
      @if(auth())
              <li>
                  <a href="{{ url('/milleage') }}"><i class="fa fa-recycle"></i> <span>{{trans('Milleage')}}</span></a>
              </li>
     @endif
     @if(auth())
              <li>
                  <a href="{{ url('/accident') }}"><i class="fa fa-shield"></i> <span>{{trans('Accident')}}</span></a>
              </li>
     @endif
     @if(auth())
              <li>
                  <a href="{{ url('/fuel') }}"><i class="fa fa-building"></i> <span>{{trans('Fuel')}}</span></a>
              </li>
     @endif
     @if(auth())
              <li>
                  <a href="{{ url('/document') }}"><i class="fa fa-book"></i> <span>{{trans('Document')}}</span></a>
              </li>
     @endif
     @if(auth()->user())
      <li class="treeview">
          <a href="#"><i class="fa fa-file-o"></i> <span>{{trans('Reports')}}</span><span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span></a>
          <ul class="treeview-menu">
              @if(auth())
              <li>
                  <a href="{{ url('/reports/getvehicle') }}"><i class="fa fa-circle-o"></i> <span>{{trans('Vehicle')}}</span></a>
              </li>
              @endif
              @if(auth())
              <li>
                  <a href="{{ url('reports/getaccident') }}"><i class="fa fa-circle-o"></i>Accident</a>
              </li>
              <li>
                  <a href="{{ url('reports/getmaintenance') }}"><i class="fa fa-circle-o"></i>Maintenance</a>
              </li>
              <li>
                  <a href="{{ url('reports/generalreport') }}"><i class="fa fa-circle-o"></i>General</a>
              </li>
              @endif
          </ul>
      </li>
      @endif
    
    
    </ul>
</section>
</aside>
@endif
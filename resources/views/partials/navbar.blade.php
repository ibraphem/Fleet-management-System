<header class="main-header" >
<a href="/" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">
        @if(!empty(DB::table('flexible_pos_settings')->first()->fevicon_path))
        <img src="{{asset(DB::table('flexible_pos_settings')->first()->fevicon_path)}}" alt="" height="40px" width="40px">
        @else
        <img src="{{asset('images/fevicon.png')}}" alt="" height="40px" width="40px">
        @endif

      </span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" >
          @if(!empty(DB::table('flexible_pos_settings')->first()->logo_path))
        <img src="{{asset(DB::table('flexible_pos_settings')->first()->logo_path)}}" alt="" height="45px" width="78">
        @else
        <img src="{{asset('images/fpos.png')}}" alt="" height="45px" width="78">
        @endif        
        </span>

    </a>
    
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button"> 
        <span class="sr-only">Toggle navigation</span>
      </a>

       <a href="#" class="dropdown-toggle sidebar-toggle quick-icon" role="button" data-toggle="dropdown" id="menu1">
            <i class="fa fa-plus"></i>
        </a>
        <ul class="dropdown-menu quick-dropdown" role="menu" aria-labelledby="menu1">
          @if(auth())
          <li role="presentation">
            <a role="menuitem" tabindex="-1" href="{{ url('vehicles/create') }}"><i class="fa fa-car"></i> {{__('Add Vehicle')}}</a>
          </li>
          @endif
          @if(auth())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('vehicleusers.create')}}"><i class="fa fa-user" aria-hidden="true"></i> {{__('Add Vehicle User')}}</a></li>
          @endif
          @if(auth())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('assignment.create')}}"><i class="fa fa-user-plus" aria-hidden="true"></i> {{__('Assign Vehicle')}}</a></li>
          @endif
          @if(auth()->user())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('maintenance.create')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> {{__('Do Maintenance')}}</a></li>
          @endif
          @if(auth()->user())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('schedulemaintenance.create')}}"><i class="fa fa-credit-card" aria-hidden="true"></i> {{__('Schedule Maintenance')}}</a></li>
          @endif
          @if(auth()->user())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('milleage.create')}}"><i class="fa fa-recycle" aria-hidden="true"></i> {{__('Record Milleage')}}</a></li>
          @endif
          @if(auth()->user())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('accident.create')}}"><i class="fa fa-shield" aria-hidden="true"></i> {{__('Record Accident')}}</a></li>
          @endif
          @if(auth()->user())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('fuel.create')}}"><i class="fa fa-building" aria-hidden="true"></i> {{__('Record Fueling')}}</a></li>
          @endif
          @if(auth()->user())
          <li role="presentation"><a role="menuitem" tabindex="-1" href="{{route('document.create')}}"><i class="fa fa-book" aria-hidden="true"></i> {{__('Add Document')}}</a></li>
          @endif
        </ul>
      
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          @if (Auth::guest())
			<li><a href="{{ url('/login') }}">{{__('Login')}}</a></li>
		@else
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="{{asset('dist/img/avatar.png')}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{ Auth::user()->name }}</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="{{asset('dist/img/avatar.png')}}" class="img-circle" alt="User Image">

                <p>
                  {{ Auth::user()->name }}
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
             <!--   <div class="row">
                  <div class="col-xs-6 text-center">
                    @if(Auth::user()->hasPermissionTo('flexiblepossetting.create'))
                    <a href="{{route('flexiblepossetting.create')}}">{{__('Settings')}}</a>
                      @endif
                  </div>
                  <div class="col-xs-6 text-center">
                    @if(Auth::user()->hasPermissionTo('flexiblepossetting.create'))
                    <a href="{{route('permissions.list')}}">{{__('Permissions')}}</a>
                      @endif
                  </div>

                </div>-->
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="{{route('employees.edit', Auth::user()->id)}}" class="btn btn-success btn-flat">{{__('Profile')}}</a>
                </div>
                <div class="pull-right">
                  <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="btn btn-success btn-flat">
                            {{trans('menu.logout')}}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                </div>
              </li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </nav>
  </header>
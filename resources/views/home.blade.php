@extends('layouts.app')
@section('page-style')
<link rel="stylesheet" href="{{asset('css/pages/dashboard.css')}}">
@endsection
@section('content')
	<div class="content-wrapper">
		<div class="row">
			<div class="col-md-12">

				<div class="panel-heading">
					@include('partials.flash')
					<h1>{{ __('Dashboard') }}</h1></div>

				<div class="panel-body">
					
				
					<!-- latest section -->
                    <div class="row">
						<div class="col-md-4">
							<div class="purple well">
								<i class="fa fa-users" aria-hidden="true"></i><br>
								<span>{{trans('Vehicle Users')}} : {{$vehicleusers}}</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="chocolate well">
								<i class="fa fa-car" aria-hidden="true"></i><br>
								<span>{{trans('Vehicles')}} : {{$vehicles}}</span>
							</div>
						</div>
						<div class="col-md-4">
							<div class="well yellow">
								<i class="fa fa-shield" aria-hidden="true"></i><br>
								<span>{{trans('Accidents')}} : {{$accidentals}}</span>
							</div>
						</div>
					</div>
					@if(auth()->user()->hasPermissionTo('Latest-income-expense Dashboard'))
					@include('dashboard.partials.latest')
					@endif
					



				</div>
			</div>
		</div>
	</div>
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.2/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.0/morris.min.js"></script>
<script src="{{asset('js/dashboard.js')}}"></script>
<script>
	$(function () {
		$('[data-toggle="tooltip"]').tooltip()
	});
</script>
@endsection

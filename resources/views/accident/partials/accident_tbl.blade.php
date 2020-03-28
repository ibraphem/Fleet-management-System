 <!-- Post -->
 @if(count($accidentreport))
 <table class="table table-striped table-bordered" id="myTable1">
     <thead>
     <tr>
            <th>{{__('Accident Date')}}</th>
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Veh. Brand')}}</th>
            <th>{{__('Repair Cost')}}</th>
            
        
         
     </tr>
     </thead>

     <tbody class="list-sale-report">

     @foreach($accidentreport as $value)
         <tr>
            <td>{{date('d M Y', strtotime($value->accident_date))}}</td>
            <td>{{$value->vehicleuser['full_name']}}</td>
            <td>{{ $value->vehicle->reg_number}}</td>
            <td>{{ $value->vehicle->manufacturer }} &nbsp; {{ $value->vehicle->model }} &nbsp {{ $value->vehicle->model_year }}</td>
            <td>&#8358; {{ $value->repair_cost}}</td>
         </tr>
        @endforeach

     </tbody>
 </table>
 @endif
<!-- /.post -->
@if($type != 'datefilter')
<div class="paginations hidden-print">
   {{ $salereport->render() }}
</div>
@endif
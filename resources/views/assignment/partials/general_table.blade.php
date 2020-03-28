 <!-- Post -->
 @if(count($generalReport))

 <table class="table table-striped table-bordered" id="myTable1">
     <thead>
     <tr>
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Veh. Brand')}}</th>
            <th>{{__('Starting Milleage')}}</th>
            <th>{{__('Ending Milleage')}}</th>
            <th>{{__('Milleage Used')}}</th>
            <th>{{__('Milleage Ceiling')}}</th>
            <th>{{__('Excess Milleage')}}</th>
            <th>{{__('No of Accident')}}</th>
            <th>{{__('Fuel Cost')}} (&#8358;)</th>
            <th>{{__('Maintenance Cost')}} (&#8358;)</th>
            <th>{{__('Document Cost')}} (&#8358;)</th> 
            <th>Excess Milleaage Charge(&#8358;)</th>
            <th>Total Cost (&#8358;)</th>     
            <th>Users' Remark/sign</th>   
         
     </tr>
     </thead>

     <tbody class="list-sale-report">

     @foreach($generalReport as $value)
         <tr>
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{ $value->vehicle->reg_number}}</td>
        <td>{{ $value->vehicle->manufacturer}} {{ $value->vehicle->model}}</td>
        <td>{{ DB::table('milleages')->where('vehicle_id', $value->vehicle_id )->value('starting_milleage')}}</td>
        <td>{{ DB::table('milleages')->where('vehicle_id', $value->vehicle_id )->value('ending_milleage')}}</td>
        <td>{{ DB::table('milleages')->where('vehicle_id', $value->vehicle_id )->value('milleage_used')}}</td>
        <td>{{ DB::table('milleages')->where('vehicle_id', $value->vehicle_id )->value('milleage_ceiling')}}</td>
        <td>{{ DB::table('milleages')->where('vehicle_id', $value->vehicle_id )->value('excess_milleage')}}</td>
        <td>{{ DB::table('accidents')->where('vehicle_id', $value->vehicle_id)->whereBetween('accident_date', array($DateCreated, $EndDate))->count('id')}}</td>
        <td>{{ DB::table('Fuels')->where('vehicle_id', $value->vehicle_id)->whereBetween('fuel_date', array($DateCreated, $EndDate))->sum('fuel_cost')}}</td>
        <td>{{ DB::table('maintenances')->where('vehicle_id', $value->vehicle_id)->whereBetween('maintenance_date', array($DateCreated, $EndDate))->sum('maintenance_cost')}}</td>
        <td>{{ DB::table('documents')->where('vehicle_id', $value->vehicle_id)->whereBetween('acquired_date', array($DateCreated, $EndDate))->sum('cost')}}</td>
        <td>{{ DB::table('milleages')->where('vehicle_id', $value->vehicle_id )->value('excess_milleage_charge')}}</td>
        <td>{{ DB::table('documents')->where('vehicle_id', $value->vehicle_id)->whereBetween('acquired_date', array($DateCreated, $EndDate))->sum('cost') + DB::table('Fuels')->where('vehicle_id', $value->vehicle_id)->whereBetween('fuel_date', array($DateCreated, $EndDate))->sum('fuel_cost') +  DB::table('maintenances')->where('vehicle_id', $value->vehicle_id)->whereBetween('maintenance_date', array($DateCreated, $EndDate))->sum('maintenance_cost') + DB::table('milleages')->where('vehicle_id', $value->vehicle_id )->value('excess_milleage_charge')}}</td>
        
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
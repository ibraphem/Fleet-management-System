 <!-- Post -->
 @if(count($maintenancereport))
 <table class="table table-striped table-bordered" id="myTable1">
     <thead>
     <tr>
     <th>{{__('Maint. Date')}}</th>
            <th>{{__('Maintenance')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Cost')}}</th>
            <th>{{__('Remarks')}}</th>
            
        
         
     </tr>
     </thead>

     <tbody class="list-sale-report">

     @foreach($maintenancereport as $value)
         <tr>
            <td>{{date('d M Y', strtotime($value->maintenance_date))}}</td>
            <td>{{ $value->maintenance_routine->title }}</td>
            <td>{{ $value->vehicle->reg_number}}</td>
            <td>{{ $value->maintenance_cost }}</td>
            <td>{{$value->remark}}</td>
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
 <!-- Post -->
 @if(count($accidents))
 <table class="table table-striped table-bordered" id="myTable1">
     <thead>
     <tr>
         <td colspan="4" style="text-align:center; color:green"><h3>Accidents' report between {{date('d M Y', strtotime($from))}} and {{date('d M Y', strtotime($to))}} ({{$company}})</h3></td>
     </tr>
     <tr class="trow">
            <th>{{__('Accident Date')}}</th>
           
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Veh. Brand')}}</th>
            <th>{{__('Repair Cost')}}</th>
            
        
         
     </tr>
     </thead>

     <tbody class="list-sale-report">

     @foreach($accidents as $value)
         <tr class="trow">
            <td>{{ $value->accident_date }}</td>
            
            <td>{{ $value->reg_number}}</td>
            <td>{{ $value->manufacturer . " " . $value->model . " " . $value->model_year  }}</td>
            <td>{{ $value->repair_cost}}</td>
         </tr>
        @endforeach

     </tbody> 
 </table>

<!-- /.post -->
@if($type != 'datefilter')
<div class="paginations hidden-print">
   {{ $salereport->render() }}
</div>
@endif
@else
<table class="table table-striped table-bordered" id="myTable1">
 <thead>
   <tr>
      <td style="text-align:center"><h4><strong>No records found</strong></h4></td>
   </tr>
 </thead>

</table>
@endif
 <!-- Post -->
 @if(count($maintenanceReport))
 <table class="table table-striped table-bordered" id="myTable1">
     <thead>
     <tr>
         <td colspan="4" style="text-align:center; color:green"><h3>Maintenance report between {{date('d M Y', strtotime($from))}} and {{date('d M Y', strtotime($to))}} ({{$company}})</h3></td>
     </tr>
     <tr  class="trow">
     <th>{{__('Maint. Date')}}</th>
            <th>{{__('Part')}}</th>
            <th>{{__('Remark')}}</th>
            <th> Brand </th>
            <th>{{__('Cost')}}</th>
            
            
        
         
     </tr>
     </thead>

     <tbody class="list-sale-report">

     @foreach($maintenanceReport as $value)
         <tr class="trow">
            @if(!empty($value->maintenance_date) && $value->maintenance_date != null)
          <td>{{date('d M Y', strtotime($value->maintenance_date))}}</td>
          @else
          <td>&nbsp;</td>
          @endif
            <td>{{ $value->title }}</td>
            <td>{{ $value->remark }}</td>
            <td>{{ $value->reg_number}}</td>
            
            <td>{{ $value->maintenance_cost }}</td>
            
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
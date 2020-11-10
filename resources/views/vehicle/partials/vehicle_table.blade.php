 <!-- Post -->
 @if(count($vehiclereport))
 <table class="table table-striped table-bordered" id="myTable1">
     <thead>
     <tr>
         <td colspan="6" style="text-align:center; color:green"><h3>Acquired vehicle between {{date('d M Y', strtotime($from))}} and {{date('d M Y', strtotime($to))}} ({{$company}})</h3></td>
     </tr>
     <tr class="trow">
        <td>{{trans('Acquired Date')}}</td>
        <td>{{trans('Reg Number')}}</td>
        <td>{{trans('Brand')}}</td>
        <td>{{trans('Purchase Price')}}</td>
        
        <td>{{trans('Life')}}</td>
        
         
     </tr>
     </thead>

     <tbody class="list-sale-report">

     @foreach($vehiclereport as $value)
         <tr class="trow">
               <td>{{ $value->acquired_date }}</td>
                <td>{{ $value->reg_number }}</td>
                <td>{{ $value->manufacturer . " " . $value->model . " "  . $value->model_year }}</td>
                <td>{{ $value->purchase_price }}</td>
              
                <td>{{ $value->life }} years</td>
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
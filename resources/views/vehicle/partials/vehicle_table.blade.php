 <!-- Post -->
 @if(count($vehiclereport))
 <table class="table table-striped table-bordered" id="myTable1">
     <thead>
     <tr>
        <td>{{trans('Acquired Date')}}</td>
        <td>{{trans('Reg Number')}}</td>
        <td>{{trans('Brand')}}</td>
        <td>{{trans('Purchase Price')}}</td>
        <td>{{trans('Location')}}</td>
        <td>{{trans('Life')}}</td>
        
         
     </tr>
     </thead>

     <tbody class="list-sale-report">

     @foreach($vehiclereport as $value)
         <tr>
         <td>{{date('d M Y', strtotime($value->acquired_date))}}</td>
                <td>{{ $value->reg_number }}</td>
                <td>{{ $value->manufacturer }} &nbsp; {{ $value->model }} &nbsp {{ $value->model_year }}</td>
                <td>&#x20A6;&nbsp;{{ $value->purchase_price }}</td>
                <td>{{$value->location}}</td>
                <td>{{ $value->life }} years</td>
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
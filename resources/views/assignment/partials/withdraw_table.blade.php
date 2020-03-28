@if(!empty($assignments))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Veh. Brand')}}</th>
            <th>{{__('Period Of Use')}}</th>
            <th class="hidden">{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($assignments as $value)
      <tr>
        
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{$value->vehicle['reg_number']}}</td>
        <td>" </td>
        <td>{{date('d M Y', strtotime($value->assignment_date))}}  - {{date('d M Y', strtotime($value->withdrawal_date))}} </td>

        <td class="hidden">
        
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
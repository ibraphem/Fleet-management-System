@if(!empty($accidents))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Accident Date')}}</th>
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Repair Cost')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($accidents as $value)
      <tr>
        <td>{{date('d M Y', strtotime($value->accident_date))}}</td>
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{ $value->vehicle->reg_number}}</td>
        <td>&#8358; {{ $value->repair_cost}}</td>
        

        <td class="item_btn_group">
        <a href="{{ url('accident/' . $value->id . '/' . $value->vehicle_id. '/') }}"><button class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="View accident info"><i class="fa fa-eye"></i></button> &nbsp;
        <a href="{{ url('accident/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Update accident record"></span></button></a> &nbsp;
          <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete accident record">{{ Form::open(array('url' => 'accident/' . $value->id, 'class' => 'form-inline')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit(trans('X'), array('class' => 'delete-btn')) }}
                  {{ Form::close() }}</button></a>
         
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
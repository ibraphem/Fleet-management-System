@if(!empty($fuels))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Date')}}</th>
            <th>{{__('Veh. reg. No')}}</th>
            <th>{{__('Veh. Brand')}}</th>
            <th>{{__('Veh. User')}}</th>
            <th>{{__('fuel Cost')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($fuels as $value)
      <tr>
        <td>{{date('d M Y', strtotime($value->fuel_date))}}</td>
        <td>{{ $value->vehicle->reg_number }}</td>
        <td>{{ $value->vehicle->manufacturer}}&nbsp;{{ $value->vehicle->model}}</td>
        <td>{{ $value->vehicleuser['full_name'] }}</td>
        <td>{{$value->fuel_cost}}</td> 
        <td class="item_btn_group">
        <a href="{{ url('fuel/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"  data-toggle="tooltip" data-placement="top" title="Update fueling record"><span class="glyphicon glyphicon-edit"></span></button> &nbsp;
          <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete record">{{ Form::open(array('url' => 'fuel/' . $value->id, 'class' => 'form-inline')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit(trans('X'), array('class' => 'delete-btn')) }}
                  {{ Form::close() }}</button></a>
         
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
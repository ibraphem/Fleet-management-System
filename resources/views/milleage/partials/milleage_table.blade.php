@if(!empty($milleages))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Month')}}</th>
            <th>{{__('Year')}}</th>
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Vehicle')}}</th>
            <th>{{__('Milleage at beginning of month')}}</th>
            <th>{{__('Milleage at month end')}}</th>
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($milleages as $value)
      <tr>
        <td>{{ $value->month }}</td> 
        <td>{{ $value->year }}</td>
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{ $value->vehicle->reg_number}}</td>
        <td>{{$value->starting_milleage}}</td>
        <td>{{$value->ending_milleage}}</td> 
        <td class="item_btn_group">
        <a href="{{ url('milleage/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit"></span></button></a> &nbsp;
        <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm">{{ Form::open(array('url' => 'milleage/' . $value->id, 'class' => 'form-inline')) }}
        {{ Form::hidden('_method', 'get') }}
                  {{ Form::submit(trans('X'), array('class' => 'delete-btn')) }}
                  {{ Form::close() }}</button></a>
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
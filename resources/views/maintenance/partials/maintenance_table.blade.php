@if(!empty($maintenances))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Maint. Date')}}</th>
            <th>{{__('Part')}}</th>
            <th>Remark</th>
           
            
            <th>{{__('Cost')}}</th>
           
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($maintenances as $value)
      <tr>
      @if(!empty($value->maintenance_date) && $value->maintenance_date != null)
          <td>{{date('d M Y', strtotime($value->maintenance_date))}}</td>
          @else
          <td>&nbsp;</td>
          @endif
       <td>{{ $value->maintenance_routine->title }}</td>
       <td>{{ $value->remark }}</td>
       
        
        <td>{{ $value->maintenance_cost }}</td>
      
        <td class="item_btn_group">
        <a href="{{ url('maintenance/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm"><span class="glyphicon glyphicon-edit" data-toggle="tooltip" data-placement="top" title="Edit maintenance record"></span></button> &nbsp;
      {{--    <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete maintenance record">{{ Form::open(array('url' => 'maintenance/' . $value->id, 'class' => 'form-inline')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit(trans('X'), array('class' => 'delete-btn')) }}
                  {{ Form::close() }}</button></a> --}}
         
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
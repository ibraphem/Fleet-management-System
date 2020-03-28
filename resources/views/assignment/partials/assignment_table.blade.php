@if(!empty($assignments))
<table id="myTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>{{__('Assignment Date')}}</th>
            <th>{{__('Vehicle User')}}</th>
            <th>{{__('Veh. Reg. No')}}</th>
            <th>{{__('Veh. Brand')}}</th>
         
            <th>{{__('Actions')}}</th>
        </tr>
    </thead>
    <tbody>
      @foreach($assignments as $value)
      <tr>
        <td>{{date('d M Y', strtotime($value->assignment_date))}}</td> 
        <td>{{$value->vehicleuser['full_name']}}</td>
        <td>{{ $value->vehicle->reg_number}}</td>
        <td>{{ $value->vehicle->manufacturer}} {{ $value->vehicle->model}}</td>

        
        

        <td class="item_btn_group">
        <a href="{{ url('assignment/' . $value->id . '/edit') }}"><button class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Update vehicle assignment"><span class="glyphicon glyphicon-edit"></span></button></a> &nbsp;
        <a href="#" data-toggle="modal" data-target="#myModal{{$value->id}}"><button class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Withdraw vehicle"><span class="fa fa-ban"></span></button></a>&nbsp;
        <div class="modal fade" id="myModal{{$value->id}}" role="dialog">
                     <div class="modal-dialog modal-sm">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">{{__('Vehicle Withdrawal date')}}</h4>
                         </div>
                         <div class="modal-body">
                           {{ Form::open(['route'=>'assignment.withdrawal']) }}
                           
                           <div class="form-group">
                             {{ Form::hidden('ass_id', $value->id, ['class'=>'form-control']) }}
                             {{ Form::date('withdrawal_date', null, ['class'=>'form-control','placeholder'=>'Withrawal date', 'required']) }}
                           </div>
                             
                           <div class="form-group">
                             {{ Form::submit('Withdraw', ['class'=>'btn btn-success']) }}
                           </div>
                           {{ Form::close() }}
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-success" data-dismiss="modal">{{__('Close')}}</button>
                         </div>
                       </div>
                     </div>
                   </div>
         <a href="#" class="delete-form" onclick="return confirm('are you sure?')"><button class="btn btn-danger btn-sm"  data-toggle="tooltip" data-placement="top" title="Delete assignment">{{ Form::open(array('url' => 'assignment/' . $value->id, 'class' => 'form-inline')) }}
                  {{ Form::hidden('_method', 'DELETE') }}
                  {{ Form::submit(trans('X'), array('class' => 'delete-btn')) }}
                  {{ Form::close() }}</button></a>
         
        </td>
      </tr>
      @endforeach
  </tbody>
</table>
@endif
<div class="row">
    @if(!empty($schedule_maintenances))
    <div class="col-md-12">
        <div class="box box-success">
            <div class="box-header with-border">
                <h4 style="color:red;">{{__('Maintenance Alert')}}</h4>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('Scheduled Date')}}</th>
                            <th>{{__('Maintenance')}}</th>
                            <th>{{__('Veh. Reg. No')}}</th>
                            <th>{{__('Veh. Brand')}}</th>
                            <th>{{__('Status')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedule_maintenances as $value)
                        <tr>
                            <td>{{date('d M Y', strtotime($value->schedule_date))}}</td>
                            <td>{{ $value->maintenance_routine->title }}</td>
                            <td>{{ $value->vehicle->reg_number}}</td> 
                            <td>{{ $value->vehicle->manufacturer}} {{ $value->vehicle->model}}</td>
                            <td><i><a  href="#" data-toggle="modal" data-target="#myModal{{$value->id}}" data-toggle="tooltip" data-placement="top" title="Click here to complete this maintenance ops" style="color: red;">Pending</i></a>
                            <div class="modal fade" id="myModal{{$value->id}}" role="dialog">
                     <div class="modal-dialog modal-sm">
                       <div class="modal-content">
                         <div class="modal-header">
                           <button type="button" class="close" data-dismiss="modal">&times;</button>
                           <h4 class="modal-title">{{__('Completed maintainance?')}}</h4>
                         </div>
                         <div class="modal-body">
                           {{ Form::open(['route'=>'schedulemaintenance.complete']) }}
                           
                           <div class="form-group">
                             {{ Form::hidden('maint_id', $value->id, ['class'=>'form-control']) }} 
                             {{ Form::date('maintenance_date', null, ['class'=>'form-control','placeholder'=>'Date completed', 'required']) }} <br><br>
                             {{ Form::number('maintenance_cost', null, ['class'=>'form-control','placeholder'=>'Maintenance cost']) }}<br><br>
                             {{ Form::text('remark', null, ['class'=>'form-control','placeholder'=>'Remarks']) }}<br><br>
                           </div>
                             
                           <div class="form-group">
                             {{ Form::submit('Complete', ['class'=>'btn btn-success']) }}
                           </div>
                           {{ Form::close() }}
                         </div>
                         <div class="modal-footer">
                           <button type="button" class="btn btn-success" data-dismiss="modal">{{__('Close')}}</button>
                         </div>
                       </div>
                     </div>
                   </div>
                   </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    <div class="col-md-4">
        <div class="box box-success single-latest">
            <div class="box-header with-border">
                <h4 style="color: blue;">{{__('Recent Deployment')}}</h4>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Veh. Reg. No')}}</th>
                            <th>{{__('Veh. User')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($assignments->take(5) as $value)
                        <tr>
                            <td>{{date('d M Y', strtotime($value->assignment_date))}}</td>
                            <td>{{ $value->vehicle->reg_number}}</td>
                            <td>{{$value->vehicleuser['full_name']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-success single-latest">
            <div class="box-header with-border">
                <h4 style="color: red;">{{__('Recent Accidents')}}</h4>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('Date')}}</th>
                            <th>{{__('Veh. Reg. No')}}</th>
                            <th>{{__('Veh. User')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($accidents->take(5) as $value)
                        <tr>
                            <td>{{date('d M Y', strtotime( $value->accident_date))}}</td>
                             <td>{{ $value->vehicle->reg_number}}</td>
                            <td>{{$value->vehicleuser['full_name']}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="box box-success single-latest">
            <div class="box-header with-border">
                <h4 style="color: green;">{{__('Recent Documents')}}</h4>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{__('Title')}}</th>
                            <th>{{__('Veh. Reg. No')}}</th>
                            <th>{{__('Expiry date')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents->take(3) as $value)
                        <tr>
                            
                             <td>{{ $value->title }}</td>
                            <td>{{ $value->vehicle->reg_number}}</td>
                            <td>{{date('d M Y', strtotime( $value->expiry_date))}}</td>
                           
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
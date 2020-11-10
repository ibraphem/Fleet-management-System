@extends('layouts.sale')

@section('content')
<div class="content-wrapper" ng-app="tutapos">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>{{__('Maintenance')}}</h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row"> 
            <div class="col-md-12">
                <div class="panel panel-default">
                    <nav class="multineed navbar navbar-default menu-export" role="navigation">
                        <ul class="nav navbar-nav">
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><i class="fa fa-mail-forward"></i> {{__('Export/Print')}} <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#" onclick="exportTableToCSV('Maintenance Report.csv')" id="excel" class="excel" style="color:#006600"><i class="fa fa-file-excel-o"></i> {{__('To Excel')}}</a></li>
                                    <li><a href="#" onclick="display()" class="word" style="color:blue"><i class="fa fa-print"></i> {{__('To Print')}}</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav> 
                    <div class="panel-heading" style="padding-top: 6px;">{{trans('Report')}} - {{trans('Maintenance Report')}}</div>

                    <div class="panel-body">
    <div class="row" id="form">
        <form name="maintenanceform" id="maintenanceform">
        @csrf
            <div class="col-md-3">
                <div class="form-group">
                <label >{{__('From')}}</label>
                    <input type="date" name="from" id="from" class="form-control" required />
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label >{{__('To')}}</label>
                    <input type="date" name="to" id="to" class="form-control" required />
                </div>
            </div>
             <div class="col-md-2">
                <div class="form-group">
                    <p>&nbsp;</p>
                    <input type="radio" name="company" id="overland" value="Overland"  checked/>&nbsp; &nbsp; OverLand
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
                    <p>&nbsp;</p>
                    <input type="radio" name="company" id="landover" value="Landover"  />&nbsp; &nbsp; Landover
                </div>
            </div>
            <div class="col-md-2">
                <div class="form-group">
           
                    <p>&nbsp;</p>
                    <input type="submit"  name="fetch" class="btn btn-success btn-md" value="Fetch" id="fetch" class="form-control" />
                </div>
            </div>
        </form>
    </div>
    
    <div id="list-of-maintenance"></div>
    </div>
                   
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')

<script type="text/javascript">
        $(document).ready(function(){  
     $('#maintenanceform').on("submit", function(event){ 
         
        event.preventDefault();         
        $.ajax({  
             url:"/reports/maintenance",  
             method:"POST",  
             data:$('#maintenanceform').serialize(),  
             beforeSend:function(){  
                  $('#fetch').val("Fetching...");  
             },
             success:function(data){ 
                $('#fetch').val("Fetch");
                $('#form').hide();
              $('#list-of-maintenance').html(data);  
                     }  
                });                     
             
     })
        
  })
    </script>


@endsection
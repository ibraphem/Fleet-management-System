
<table class="table table-striped table-bordered list-of-vehicles overflow-auto" id="list-vehicle-report">
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
    @if(count($vehicleReport))
        <tbody class="list-vehicle-report">

        @foreach($vehicleReport as $value)
            <tr>
                <td>{{ $value->acquired_date }}</td>
                <td>{{ $value->reg_number }}</td>
                <td>{{ $value->manufacturer }} &nbsp; {{ $value->model }} &nbsp {{ $value->model_year }}</td>
                <td>&#x20A6;&nbsp;{{ $value->purchase_price }}</td>
                <td>{{$value->location}}</td>
                <td>{{ $value->life }}</td>
            </tr>
        @endforeach

        </tbody>
    @endif
</table>
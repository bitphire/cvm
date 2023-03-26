@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Vehicles
                    @role_is('3')
                        <a href="{{ url('admin/vehicle/add') }}" class="btn btn-primary btn-sm float-end">Add Vehicle</a>
                    @endrole_is
                </h3>
                <div class="card-body">
                    <h5 class="card-title">Owned Vehicles</h5>
                    <table class="table table-striped">
                        <thead>
                            <th scope="col">#</th>
                            <th scope="col">Purchased On</th>
                            <th scope="col">State Used In</th>
                            <th scope="col">Type</th>
                            <th scope="col">Year</th>
                            <th scope="col">Make</th>
                            <th scope="col">Model</th>
                            <th scope="col">VIN</th>
                            <th scope="col">License</th>
                        </thead>
                        @foreach ($vehicles as $vehicle)
                            <tr>
                                <th scope="row">{{ $vehicle->number }}</th>
                                <td>{{ $vehicle->purchased_on }}</td>
                                <td>{{ $vehicle->state_used_in }}</td>
                                <td>{{ $vehicle->type }}</td>
                                <td>{{ $vehicle->year }}</td>
                                <td>{{ $vehicle->make }}</td>
                                <td>{{ $vehicle->model }}</td>
                                <td>{{ $vehicle->vin }}</td>
                                <td>{{ $vehicle->license }}</td>
                            </tr>
                        @endforeach
                    </table>
                </div>
    </div>
</div>

@endsection

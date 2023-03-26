@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Vehicles
                    @role_is('3')
                        <a href="{{ url('admin/vehicle/add') }}" class="btn btn-primary btn-sm float-end">Add Vehicle</a>
                    @endrole_is
                </h3>
                <div class="card-body">
                    <h5 class="card-title">New Vehicle</h5>
                    <form method="POST" action="{{ url('admin/vehicle/list') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('Number') }}</label>
                            <div class="col-md-6">
                                <input id="number" type="numeric" class="form-control @error('number') is-invalid @enderror" name="number" value="{{ old('number') }}" required autocomplete="number" autofocus>

                                @error('number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="purchased_on" class="col-md-4 col-form-label text-md-end">{{ __('Purchased On') }}</label>
                            <div class="col-md-6">
                                <input id="purchased_on" type="date" class="form-control @error('purchased_on') is-invalid @enderror" name="purchased_on" value="{{ old('purchased_on') }}" required autocomplete="purchased_on">

                                @error('purchased_on')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="state_used_in" class="col-md-4 col-form-label text-md-end">{{ __('State Used In') }}</label>
                            <div class="col-md-6">
                                <input id="state_used_in" type="text" class="form-control @error('purchased_on') is-invalid @enderror" name="state_used_in" value="{{ old('state_used_in') }}" required autocomplete="state_used_in">

                                @error('state_used_in')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="type" class="col-md-4 col-form-label text-md-end">{{ __('Type') }}</label>
                            <div class="col-md-6">
                                <input id="type" type="text" class="form-control @error('type') is-invalid @enderror" name="type" value="{{ old('type') }}" required autocomplete="type">

                                @error('type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="year" class="col-md-4 col-form-label text-md-end">{{ __('Year') }}</label>
                            <div class="col-md-6">
                                <input id="year" type="numeric" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ old('year') }}" required autocomplete="year">

                                @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="make" class="col-md-4 col-form-label text-md-end">{{ __('Make') }}</label>
                            <div class="col-md-6">
                                <input id="make" type="text" class="form-control @error('make') is-invalid @enderror" name="make" value="{{ old('make') }}" required autocomplete="make">

                                @error('make')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="model" class="col-md-4 col-form-label text-md-end">{{ __('Model') }}</label>
                            <div class="col-md-6">
                                <input id="model" type="text" class="form-control @error('model') is-invalid @enderror" name="model" value="{{ old('model') }}" required autocomplete="model">

                                @error('model')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="vin" class="col-md-4 col-form-label text-md-end">{{ __('VIN') }}</label>
                            <div class="col-md-6">
                                <input id="vin" type="text" class="form-control @error('vin') is-invalid @enderror" name="vin" value="{{ old('vin') }}" required autocomplete="vin">

                                @error('vin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="license" class="col-md-4 col-form-label text-md-end">{{ __('License') }}</label>
                            <div class="col-md-6">
                                <input id="license" type="text" class="form-control @error('license') is-invalid @enderror" name="license" value="{{ old('license') }}" required autocomplete="license">

                                @error('license')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="ownership" class="col-md-4 col-form-label text-md-end">{{ __('Ownership') }}</label>
                            <div class="col-md-6">
                                <input id="ownership" type="text" class="form-control @error('ownership') is-invalid @enderror" name="ownership" value="{{ old('ownership') }}" required autocomplete="ownership">

                                @error('ownership')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <button type="submit" name="submit" value="submit">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

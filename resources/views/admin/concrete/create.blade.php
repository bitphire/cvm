@extends('layouts.admin')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>Offsets
                    @role_is('3')
                        <a href="{{ url('admin/concrete') }}" class="btn btn-primary btn-sm float-end">Back</a>
                    @endrole_is
                </h3>
                <div class="card-body">
                    <h5 class="card-title">New Offsets</h5>
                    <form method="POST" action="{{ url('admin/concrete') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('Task #') }}</label>
                            <div class="col-md-6">
                                <input id="task" type="text" class="form-control @error('task') is-invalid @enderror" name="task" value="{{ $recent_task === null ? '':$recent_task->task }}" required autocomplete="task" autofocus>

                                @error('task')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="sign" class="col-md-4 col-form-label text-md-end">{{ __('Sign #') }}</label>
                            <div class="col-md-6">
                                <input id="sign" type="text" class="form-control @error('sign') is-invalid @enderror" name="sign" value="{{ old('sign') }}" required autocomplete="sign">

                                @error('sign')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Leg Size') }}</label>
                            <div class="col-md-6">
                                <select id="leg_size" name="leg_size" class="form-select">
                                    <option selected value="0">Select Leg Size</option>
                                    <option value="1">W6x15</option>
                                    <option value="2">W8x18</option>
                                    <option value="4">Schedule 80</option>
                                    <option value="5">Schedule 10</option>
                                    <option value="3">STP 400 (New Style)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="offset_1" class="col-md-4 col-form-label text-md-end">{{ __('Offset 1') }}</label>
                            <div class="col-md-6">
                                <input id="offset_1" type="numeric" class="form-control @error('type') is-invalid @enderror" name="offset_1" value="{{ old('offset_1') }}" required autocomplete="offset_1">

                                @error('offset_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="offset_2" class="col-md-4 col-form-label text-md-end">{{ __('Offset 2') }}</label>
                            <div class="col-md-6">
                                <input id="offset_2" type="numeric" class="form-control @error('offset_2') is-invalid @enderror" name="offset_2" value="{{ old('offset_2') }}" autocomplete="offset_2">

                                @error('offset_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-md-4 col-form-label text-md-end">{{ __('Sign Size') }}</label>
                            <div class="col-md-6">
                                <select id="sign_size" name="sign_size" class="form-select">
                                    <option selected value="0">Select Sign Size</option>
                                    <option value="1">S3 - 5 Panel</option>
                                    <option value="2">S3 - 7 Panel</option>
                                    <option value="6">S3 - 10x10</option>
                                    <option value="3">S6 - 10 Panel</option>
                                    <option value="4">S6 - 11 Panel</option>
                                    <option value="5">S6 - Verticle</option>
                                    <option value="11">R6</option>
                                    <option value="9">R3</option>
                                    <option value="7">R1</option>
                                    <option value="8">R2</option>
                                    <option value="10">R4</option>
                                    <option value="12">TODS</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="leg_length_1" class="col-md-4 col-form-label text-md-end">{{ __('Leg Length 1') }}</label>
                            <div class="col-md-6">
                                <input id="leg_length_1" type="numeric" class="form-control @error('leg_length_1') is-invalid @enderror" name="leg_length_1" value="{{ old('leg_length_1') }}" autocomplete="leg_length_1">

                                @error('leg_length_1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="leg_length_2" class="col-md-4 col-form-label text-md-end">{{ __('Leg Length 2') }}</label>
                            <div class="col-md-6">
                                <input id="leg_length_2" type="numeric" class="form-control @error('leg_length_2') is-invalid @enderror" name="leg_length_2" value="{{ old('leg_length_2') }}" autocomplete="leg_length_2">

                                @error('leg_length_2')
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

@extends('layouts.admin')

@section('content')

<script>
    $(function () {
        $('#sign_size').change(function () {
            var os_1 = $('#offset_1').val();
            var os_2 = $('#offset_2').val();
            var os_1_span_text = '';
            var os_2_span_text = '';
            var base = 0;
            var os_1_total = 0;
            var os_2_total = 0;

            if ($(this).val() <= 6 || ($(this).val() >= 8 && $(this).val() <= 10)) { // Mainline, R2, R3, R4
                base = 84;
                os_1_total = base + +os_1;
                os_2_total = base + +os_2;
                os_1_span_text = base+' + '+os_1+' = '+os_1_total;
                os_2_span_text = base+' + '+os_2+' = '+os_2_total;
            } else if ($(this).val() == 7) { // R1
                base = 120;
                os_1_total = base + +os_1;
                os_1_span_text = base+' + '+os_1+' = '+os_1_total;
                os_2_span_text = '';
            } else if ($(this).val() == 12) { // TODS
                base = 100;
                os_1_total = base + +os_1;
                os_1_span_text = base+' + '+os_1+' = '+os_1_total;
                os_2_span_text = '';
            } else if ($(this).val() == 11) { // R6
                base = 168;
                os_1_total = base + +os_1;
                os_2_total = base + +os_2;
                os_1_span_text = base+' + '+os_1+' = '+os_1_total;
                os_2_span_text = base+' + '+os_2+' = '+os_2_total;
            }

            $('#offset_1_span').text(os_1_span_text);
            $('#offset_2_span').text(os_2_span_text);

        });
    })
</script>
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
                    <form method="POST" action="{{ url('admin/concrete/'.$concrete->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="number" class="col-md-4 col-form-label text-md-end">{{ __('Task #') }}</label>
                            <div class="col-md-6">
                                <input id="task" type="text" class="form-control @error('tesk') is-invalid @enderror" name="task" value="{{ $concrete->task }}" required autocomplete="task">

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
                                <input id="sign" type="text" class="form-control @error('sign') is-invalid @enderror" name="sign" value="{{ $concrete->sign }}" required>

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
                                    <option value="1" {{ $concrete->leg_size === 1 ? "selected":"" }} >W6x15</option>
                                    <option value="2" {{ $concrete->leg_size === 2 ? "selected":"" }} >W8x18</option>
                                    <option value="4" {{ $concrete->leg_size === 4 ? "selected":"" }} >Schedule 80</option>
                                    <option value="5" {{ $concrete->leg_size === 5 ? "selected":"" }} >Schedule 10</option>
                                    <option value="3" {{ $concrete->leg_size === 3 ? "selected":"" }} >STP 400 (New Style)</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="offset_1" class="col-md-4 col-form-label text-md-end">{{ __('Offset 1') }}</label>
                            <div class="col-md-6">
                                <input id="offset_1" type="numeric" class="form-control @error('type') is-invalid @enderror" name="offset_1" value="{{ $concrete->offset_1 }}" required autocomplete="offset_1">
                                <span id="offset_1_span"></span>

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
                                <input id="offset_2" type="numeric" class="form-control @error('offset_2') is-invalid @enderror" name="offset_2" value="{{ $concrete->offset_2 === -1 ? '':$concrete->offset_2 }}">
                                <span id="offset_2_span"></span>

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
                                    <option value="1" {{ $concrete->sign_size === 1 ? "selected":"" }} >S3 - 5 Panel</option>
                                    <option value="2" {{ $concrete->sign_size === 2 ? "selected":"" }} >S3 - 7 Panel</option>
                                    <option value="6" {{ $concrete->sign_size === 6 ? "selected":"" }} >S3 - 10x10</option>
                                    <option value="3" {{ $concrete->sign_size === 3 ? "selected":"" }} >S6 - 10 Panel</option>
                                    <option value="4" {{ $concrete->sign_size === 4 ? "selected":"" }} >S6 - 11 Panel</option>
                                    <option value="5" {{ $concrete->sign_size === 5 ? "selected":"" }} >S6 - Verticle</option>
                                    <option value="11" {{ $concrete->sign_size === 11 ? "selected":"" }} >R6</option>
                                    <option value="9" {{ $concrete->sing_size === 9 ? "selected":"" }} >R3</option>
                                    <option value="7" {{ $concrete->sign_size === 7 ? "selected":"" }} >R1</option>
                                    <option value="8" {{ $concrete->sign_size === 8 ? "selected":"" }} >R2</option>
                                    <option value="10" {{ $concrete->sign_size === 10 ? "selected":"" }} >R4</option>
                                    <option value="12" {{ $concrete->sign_size === 12 ? "selected":"" }} >TODS</option>
                                </select>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="leg_length_1" class="col-md-4 col-form-label text-md-end">{{ __('Leg Length 1') }}</label>
                            <div class="col-md-6">
                                <input id="leg_length_1" type="numeric" class="form-control @error('leg_length_1') is-invalid @enderror" name="leg_length_1" value="{{ $concrete->leg_length_1 === -1 ? '':$concrete->leg_length_1 }}" autocomplete="leg_length_1">

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
                                <input id="leg_length_2" type="numeric" class="form-control @error('leg_length_2') is-invalid @enderror" name="leg_length_2" value="{{ $concrete->leg_length_2 === -1 ? '':$concrete->leg_length_2 }}" autocomplete="leg_length_2">

                                @error('leg_length_2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <button type="submit" name="submit" value="submit">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

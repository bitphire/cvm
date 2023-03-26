@extends('layouts.admin')

@section('content')

    <script>
        $(function() {
            $('.mark-complete-button').on('click', function () {
                $('#mark-complete-form').attr('action', $(this).data('delete-link'));
            });
        });
    </script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Tasks with Offsets
                    @role_is('3')
                        <a href="{{ url('admin/concrete/add') }}" class="btn btn-primary btn-sm float-end">Add New Offset(s)</a>
                    @endrole_is
                </h3>
                <div class="modal fade" id="markCompleted" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Complete?</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Only mark complete if everything is done and ready to go!
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form id="mark-complete-form" method="POST" action="">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Mark Complete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($concrete as $task => $details)
                    <div class="card-body">
                        <h5 class="card-title">Task #: <strong>{{ $task }}</strong></h5>
                        <ul class="list-group">
                            <li class="list-group-item">
                                <div class="ms-2 me-auto">
                                    @foreach ($details as $detail)
                                        <div class="fw-bold">
                                            Sign #: <i>{{ $detail->sign }}</i>
                                            <a href="{{ url('admin/concrete/'.$detail->id.'/edit') }}"<button type="button" class="btn btn-success">Edit</button></a>
                                            <button type="button" class="btn btn-danger mark-complete-button" data-delete-link="{{ url('/admin/concrete/'.$detail->id.'/destroy') }}" data-bs-toggle="modal" data-bs-target="#markCompleted">Mark Complete</button>
                                        </div>
                                        <ul>
                                            <li>
                                                @switch($detail->sign_size)
                                                    @case(0)
                                                        Unknown
                                                        @break
                                                    @case(1)
                                                        5 Panel
                                                        @break
                                                    @case(2)
                                                        7 Panel
                                                        @break
                                                    @case(3)
                                                        10 Panel
                                                        @break
                                                    @case(4)
                                                        11 Panel
                                                        @break
                                                    @case(5)
                                                        Vertical
                                                        @break
                                                    @case(6)
                                                        10 x 10
                                                        @break
                                                    @case(7)
                                                        R1
                                                        @break
                                                    @case(8)
                                                        R2
                                                        @break
                                                    @case(9)
                                                        R3
                                                        @break
                                                    @case(10)
                                                        R4
                                                        @break
                                                    @case(11)
                                                        R6
                                                        @break
                                                    @case(12)
                                                        TODs
                                                        @break
                                                @endswitch
                                            </li>
                                            <li>
                                                @switch($detail->leg_size)
                                                    @case(1)
                                                        W6x15
                                                        @break
                                                    @case(2)
                                                        W8x18
                                                        @break
                                                    @case(3)
                                                        STP 400 (New Style)
                                                        @break
                                                    @case(4)
                                                        Schedule 80
                                                        @break
                                                    @case(5)
                                                        Schedule 10
                                                        @break
                                                    @case(6)
                                                        W6x12
                                                        @break
                                                    @case(7)
                                                        S7x4.7
                                                        @break
                                                @endswitch
                                            </li>

                                            <li>Offset 1: {{ $detail->offset_1 }}</li>
    
                                            @if ($detail->offset_2 != -1 )
                                                <li>Offset 2: {{ $detail->offset_2 }}</li>
                                            @endif
    
                                            <li>Leg Length 1:
                                                @if ($detail->leg_length_1 != -1)
                                                    {{ $detail->leg_length_1 }}
                                                @endif
                                            </li>
                                            @if ($detail->leg_length_2 != -1)
                                                <li>Leg Length 2: {{ $detail->leg_length_2 }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                @endforeach
                            </li>
                        </ul>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

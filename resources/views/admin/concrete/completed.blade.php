@extends('layouts.admin')

@section('content')

    <script>
        $(function() {
            $('.restore-button').on('click', function () {
                $('#restore-form').attr('action', $(this).data('delete-link'));
            });
        });
    </script>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3>Completed Tasks
                    @role_is('3')
                        <a href="{{ url('admin/concrete/add') }}" class="btn btn-primary btn-sm float-end">Add New Offset(s)</a>
                    @endrole_is
                </h3>
                <div class="modal fade" id="restore" tabindex="-1" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Restore</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are you positive you want to restore this?
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                <form id="restore-form" method="POST" action="">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Restore</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach ($concrete as $c)
                    <ul>
                        <li>
                            {{ $c->task }} - {{ $c->sign }} 
                            <button type="button" class="btn btn-primary restore-button" data-delete-link="{{ url('/admin/concrete/'.$c->id.'/restore') }}" data-bs-toggle="modal" data-bs-target="#restore">Restore</button>
                        </li>
                    </ul>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

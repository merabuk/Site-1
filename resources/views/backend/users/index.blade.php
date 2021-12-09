@extends('adminlte::page')

@section('title', $text)

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">{{ $text ?? ''}}</h1>
        <a class="btn bg-success" href="{{ route('users.create') }}"><i class="fas fa-plus-circle"></i> Додати користувача</a>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="users" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>ПІБ</th>
                            <th>E-Mail</th>
                            <th>Роль</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td>{{ $user->surname ?? '' }} {{ $user->name ?? '' }} {{ $user->patronymic ?? '' }}</td>
                                <td>{{ $user->email ?? '' }}</td>
                                <td>{{ $user->roles->first()->name ?? '' }}</td>
                                <td class="text-right">

                                    @if (($user->roles->first()->rank < auth()->user()->roles->first()->rank) || ($user->id == auth()->user()->id))
                                        <a class="btn btn-info btn-sm" href="{{ route('users.edit', $user->id)}}">
                                            <i class="fas fa-pencil-alt">
                                            </i>
                                        </a>
                                    @endif

                                    @if ($user->roles->first()->rank < auth()->user()->roles->first()->rank)
                                        <btn-confirm-sweet type="danger" btn-icon="fas fa-trash" title="Видалити" text="Видалити користувача {{ $user->full_name ?? '' }}?" action-url="{{ route('users.destroy', $user->id)}}" action-method="delete"></btn-confirm-sweet>
                                     @endif

                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4">Записи відсутні</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.Datatables', true)
@section('plugins.Sweetalert2', true)

@push('js')
<script>
    $(document).ready(function() {
        $('#users').DataTable({
            stateSave: true,
            language: {
            url: '{{ asset("/js/backend/plugins/datatables/lang.json") }}'
            },
            'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [-1] //Отключение сортировки по последнему полю (-1 - первое справа)
            }],
        });
    } );
</script>
@endpush

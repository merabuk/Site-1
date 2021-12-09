@extends('adminlte::page')

@section('title', 'Фільтри')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">Фільтри</h1>
        <a class="btn bg-success" href="{{ route('filters.create') }}"><i class="fas fa-plus-circle"></i> Додати фільтр</a>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="filters" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Фільтр</th>
                            <th>Категорії</th>
                            <th>Опубліковано</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($filters as $filter)
                            @include('backend.includes.filters.row', ['filter' => $filter])
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
        $('#filters').DataTable({
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

@extends('adminlte::page')

@section('title', 'Категорії')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">Категорії</h1>
        <a class="btn bg-success" href="{{ route('categories.create') }}"><i class="fas fa-plus-circle"></i> Додати категорію</a>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="categories" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Категорія</th>
                            <th>Опубліковано</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($categories as $category)
                            @include('backend.includes.categories.row', ['category' => $category, 'parent_name' => null])
                        @empty
                            <tr>
                                <td colspan="3">Записи відсутні</td>
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
        $('#categories').DataTable({
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

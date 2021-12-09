@extends('adminlte::page')

@section('title', 'Бренди')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">Бренди</h1>
        <a class="btn bg-success" href="{{ route('brands.create') }}"><i class="fas fa-plus-circle"></i> Додати бренд</a>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="brands" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Логотип</th>
                            <th>Назва</th>
                            <th>SEO-url</th>
                            <th>Опубліковано</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($brands as $brand)
                            @include('backend.includes.brands.row', ['brand' => $brand])
                        @empty
                            <tr>
                                <td colspan="5">Записи відсутні</td>
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
        $('#brands').DataTable({
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

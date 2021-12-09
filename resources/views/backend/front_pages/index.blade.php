@extends('adminlte::page')

@section('title', 'Сторінки')

@section('content_header')
    <div class="d-flex justify-content-between">
        <h1 class="mr-3 text-dark">Сторінки</h1>
    </div>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body table-responsive">
                <table id="pages" class="table table-striped table-bordered w-100">
                    <thead>
                        <tr>
                            <th>Назва</th>
                            <th>SEO-url</th>
                            <th>Ключові слова</th>
                            <th>Опис</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($front_pages as $page)
                            <tr>
                                <td>{{ $page->title ?? '' }}</td>
                                <td>{{ $page->slug ?? '' }}</td>
                                <td>{{ $page->keywords ?? '' }}</td>
                                <td>{{ $page->description ?? '' }}</td>
                                <td class="text-right">
                                    <a class="btn btn-info btn-sm" href="{{ route('front-pages.edit', $page->slug)}}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    {{-- <btn-confirm-modal type="danger"
                                        btn-icon="fas fa-trash"
                                        title="Видалити"
                                        text="Видалити {{ $page->title ?? 'обрану' }} сторінку?"
                                        action-url="{{ route('pages.destroy', $page->slug)}}"
                                        action-method="delete"
                                        modal-id={{'delete-page'.$page->slug}}></btn-confirm-modal> --}}
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

@push('js')
<script>
    $(document).ready(function() {
        $('#pages').DataTable({
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

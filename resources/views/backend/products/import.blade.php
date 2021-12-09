@extends('adminlte::page')

@section('title', 'Імпорт товарів')

@section('content_header')
<div class="d-flex justify-content-between">
    <h1 class="mr-3 text-dark">Імпорт товарів</h1>
</div>
@stop

@section('content')
<div class="row justify-content-center">
    <div class="col-12 col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.importation') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="importFile">Імпортувати товари з файлу</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('file') is-invalid @enderror" accept=".csv" id="importFile" name="file">
                            <label class="custom-file-label" for="importFile" id="importFileLabel">Оберіть файл імпорту</label>
                        </div>
                        @error('file')
                            <div class="invalid-feedback d-block">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Імпортувати</button>
                    <a href="{{ route('products.index') }}" class="btn btn-default">Відміна</a>
                </form>
                {{-- Validation Errors --}}
                @if($import_errors = Session::get('import-validation'))
                    <div class="alert alert-danger alert-block mt-2 mb-0">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul class="my-0">
                            @foreach ($import_errors as $error)
                                <li class="mb-0"><strong>Рядок: </strong>{{ $error->row() }} - {{ $error->errors()[0] }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{-- Import Success --}}
                @if($import_success = Session::get('import-success'))
                    <div class="alert alert-success alert-block mt-2 mb-0">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul class="my-0">
                            <p class="m-0">Створено: {{ $import_success['created'] }}, Відредаговано: {{ $import_success['updated'] }}, Видалено: {{ $import_success['deleted'] }} товарів</p>
                        </ul>
                    </div>
                @endif
                {{-- Import Error --}}
                @if($import_error = Session::get('import-error'))
                    <div class="alert alert-danger alert-block mt-2 mb-0">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul class="my-0">
                            <p class="m-0">Створено: {{ $import_error['created'] }}, Відредаговано: {{ $import_error['updated'] }}, Видалено: {{ $import_error['deleted'] }} товарів</p>
                        </ul>
                    </div>
                @endif

            </div>
        </div>
    </div>
</div>
@stop

@section('plugins.FileInputs', true)

@push('js')
<script>
    $(document).ready(function () {
        bsCustomFileInput.init()
    });
</script>
@endpush

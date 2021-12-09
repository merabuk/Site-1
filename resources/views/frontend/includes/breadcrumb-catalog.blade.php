<div class="block-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Головна сторінка</a></li>
                <li class="breadcrumb-item"><a href="{{ route('catalog-product') }}">Каталог</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $crumb }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="block-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Головна сторінка</a></li>
                @if ($crumb->category)
                    <li class="breadcrumb-item"><a href="{{ route($routeName, $crumb->category->slug) }}">{{ $crumb->category->name }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $crumb->name }}</li>
            </ol>
        </nav>
    </div>
</div>

<div class="block-breadcrumb">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('main') }}">Головна сторінка</a></li>
                @if (isset($crumbPar))
                    <li class="breadcrumb-item"><a href="{{ route($routeName, $crumbPar->slug) }}">{{ $crumbPar->name }}</a></li>
                @endif
                @if (isset($crumbSub))
                    <li class="breadcrumb-item"><a href="{{ route($routeName, $crumbSub->slug) }}">{{ $crumbSub->name }}</a></li>
                @endif
                <li class="breadcrumb-item active" aria-current="page">{{ $crumbProd->name }}</li>
            </ol>
        </nav>
    </div>
</div>

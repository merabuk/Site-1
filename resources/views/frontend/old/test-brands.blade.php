@extends('layouts.app')

@section('title', 'БрендиTEST')

@section('css')
<style>
.img-svg path {
    fill: #ff8200;
}
</style>
@endsection

@section('content')
<div class="maine page-brands">
    <div class="section-brands">
        <div class="container">
            <h3 class="title-section title-section-2">БрендиTEST</h3>
            <div class="brand-wrapper">
                <div class="pills-wrapper">
                    <ul class="nav nav-pills" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="alpinestars-tab" data-toggle="tab" href="#alpinestars" role="tab" aria-controls="alpinestars" aria-selected="true">
                                <img src="{{ asset('./images/brand/alpinestars-black.svg') }}" alt="photo-product" class="img">
                                <img src="{{ asset('./images/brand-orange/alpinestars.svg') }}" alt="photo-product" class="img img-orange">
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="airoh-tab" data-toggle="tab" href="#airoh" role="tab" aria-controls="airoh" aria-selected="false">
                                <img src="{{ asset('./images/brand/alpinestars-black.svg') }}" alt="photo-product" class="img img-svg">
                                <img src="{{ asset('./images/brand-orange/alpinestars.svg') }}" alt="photo-product" class="img img-orange">
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="alpinestars" role="tabpanel" aria-labelledby="alpinestars-tab">
                        <h3 class="title-section my-lg-3">ALPINESTARS</h3>
                        <p>ALPINESTARS (Італія) - визнаний номер 1 у виробництві одягу, взуття, захисту та аксесуарів для мотоциклістів у всьому світі.</p>
                        <p> Компанія ДІНАМОТО є ОФІЦІЙНИМ ексклюзивним постачальником бренду ALPINESTARS в Україні.</p>
                        <p>Ми працюємо безпосередньо з виробником без посередників і підтримуємо програми гарантійного та післягарантійного обслуговування клієнтів.</p>
                        <div class="info-brand-tab">
                            <div class="d-xl-flex align-items-center">
                                <h2 class="title-section">Додаткова інформація:</h2>
                                <ul class="nav nav-tabs ml-lg-4" id="myTab-info-brand" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="video-brand-tab" data-toggle="tab" href="#video-brand" role="tab" aria-controls="video-brand" aria-selected="true">Відео</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="photo-brand-tab" data-toggle="tab" href="#photo-brand" role="tab" aria-controls="photo-brand" aria-selected="false">Фотогалерея</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent-info-brand">
                                <div class="tab-pane fade show active" id="video-brand" role="tabpanel" aria-labelledby="video-brand-tab">
                                    {{-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/OVCX2QxMJC4" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                                </div>
                                <div class="tab-pane fade" id="photo-brand" role="tabpanel" aria-labelledby="photo-brand-tab">
                                    <ul class="slider-photo-brand">
                                        <li>
                                            <img src="{{ asset('./images/photo-brand-1.jpg') }}" alt="photo-product" class="img">
                                        </li>
                                        <li>
                                            <img src="{{ asset('./images/photo-brand-2.jpg') }}" alt="photo-product" class="img">
                                        </li>
                                        <li>
                                            <img src="{{ asset('./images/photo-brand-1.jpg') }}" alt="photo-product" class="img">
                                        </li>
                                        <li>
                                            <img src="{{ asset('./images/photo-brand-2.jpg') }}" alt="photo-product" class="img">
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="airoh" role="tabpanel" aria-labelledby="airoh-tab">
                        <h3 class="title-section my-lg-3">AIROH (Італія)</h3>
                        <p>Зарекомендував себе як №1 в мотокросі і ендуро, компанія успішно захоплює і інші сегменти мотоциклетного життя. </p>
                        <p>Відмінні риси шоломів AIROH:</p>
                        <ul>
                            <li>- всі без винятку виробляються тільки в Італії;</li>
                            <li>- володіють низькою вагою, в порівнянні з аналогічними інших виробників.</li>
                        </ul>
                        <p>Компанія ДІНАМОТО є ОФІЦІЙНИМ постачальником бренду AIROH в Укарїну. Ми офіційно забезпечуємо гарантійне та післягарантійне обслуговування товарів AIROH в Україні.</p>
                        <div class="info-brand-tab">
                            <div class="d-xl-flex">
                                <h2 class="title-section">Додаткова інформація:</h2>
                                <ul class="nav nav-tabs ml-lg-4" id="myTab-info-airoh" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="video-airoh-tab" data-toggle="tab" href="#video-airoh" role="tab" aria-controls="video-airoh" aria-selected="true">Відео</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="photo-airoh-tab" data-toggle="tab" href="#photo-airoh" role="tab" aria-controls="photo-airoh" aria-selected="false">Фотогалерея</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent-info-airoh">
                                <div class="tab-pane fade show active" id="video-airoh" role="tabpanel" aria-labelledby="video-airoh-tab">
                                    {{-- <iframe width="100%" height="auto" src="https://www.youtube.com/embed/fdrZtA1WFGE" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
                                </div>
                                <div class="tab-pane fade" id="photo-airoh" role="tabpanel" aria-labelledby="photo-brand-tab">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script')
<script type="text/javascript" defer>
    $('img.img-svg').each(function(){
        var $img = $(this);
        var imgClass = $img.attr('class');
        var imgURL = $img.attr('src');
        $.get(imgURL, function(data) {
            var $svg = $(data).find('svg');
            if (typeof imgClass !== 'undefined') {
                $svg = $svg.attr('class', imgClass+' replaced-svg');
            }
            $svg = $svg.removeAttr('xmlns:a');
            if (!$svg.attr('viewBox') && $svg.attr('height') && $svg.attr('width')) {
                $svg.attr('viewBox', '0 0 ' + $svg.attr('height') + ' ' + $svg.attr('width'))
            }
            $img.replaceWith($svg);
        }, 'xml');
    });
</script>
@endsection

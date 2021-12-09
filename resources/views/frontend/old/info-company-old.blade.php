@extends('layouts.app')

@section('title')
Про компанію
@endsection

@section('content')
<div class="block-info">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Головна сторінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Про компанію </li>
            </ol>
        </nav>
    </div>
</div>
<section class="section-info">
    <div class="container">
        <h2 class="title-section-2 title-section">Про компанію</h2>
        <div class="block-top-info align-items-center">
            <div class="img-block logo-dinamo">
                <img src="{{ asset('/images/company-logo.svg') }}" alt="photo-product" class="img">
            </div>
            <div class="text-left">
                <p><span class="strong-text">Дінамото</span> - офіційний дистриб'ютор високоякісного і високотехнологічного мото-екіпірування та мото-аксесуарів, вже більше 10 років успішно представляє кращі світові бренди: </p>
                <p>Ми пропонуємо широкий вибір шоломів, взуття, одягу, а також аксесуарів. У нашому онлайн магазині представлені товари будь-якої цінової категорії - реалізоване нами мото-екіпірування завжди відрізняється високою якістю, так як вироби пройшли тестування, і відповідає вимогам європейських стандартів безпеки.</p>
                <p>Успішно протестовані товари мають встановлене маркування, яке гарантує виняткову якість, впевненість, надійність і безпеку.</p>
            </div>
        </div>
    </div>
</section>
<section class="section-info">
    <div class="container">
        <h3 class="title">НАШІ ПЕРЕВАГИ</h3>
        <ul class="list-decor-arrow">
            <li>
                <div><span class="strong-text">Компанія "Дінамото" є офіційним дистриб'ютором</span> кращих брендів і володіє ексклюзивними правами реалізації на території України.
                    Таким чином, працюючи безпосередньо з виробниками, ми завжди можемо запропонувати нашим клієнтам кращі ціни і умови.</div>
            </li>
            <li>
                <div><span class="strong-text">Подані нами бренди охоплюють абсолютно весь спектр мотоциклетних напрямків</span> і орієнтовані на споживача з будь-яким смаком та можливостями.</div>
            </li>
            <li>
                <div> Захисна продукція, яка надається нами: шоломи, мото-взуття, мото-одяг <span class="strong-text">сертифікована відповідно до ЄВРОПЕЙСЬКИХ норм і правил</span>
                    (не США) і офіційно дозволена до реалізації на території Європи.</div>
            </li>
            <li>
                <div><span class="strong-text">Весь товар сертифікований, і має відповідне маркування.</span></div>
            </li>
            <li>
                <div>При необхідності, завжди можете отримати <span class="strong-text">кваліфіковану консультацію від нашого менеджера з продажу.</span></div>
            </li>
        </ul>
    </div>
</section>
@endsection

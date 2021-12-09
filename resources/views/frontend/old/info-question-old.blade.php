@extends('layouts.app')

@section('title')
Питання та відповіді
@endsection

@section('content')
<div class="block-info">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Головна сторінка</a></li>
                <li class="breadcrumb-item active" aria-current="page">Питання та відповіді </li>
            </ol>
        </nav>
    </div>
</div>
<section class="section-info question">
    <div class="container">
        <h2 class="title-section-2 title-section pb-0">Питання та відповіді</h2>
        <h3 class="title">Як правильно підібрати мотошолом?</h3>
        <p>Щоб визначити свій розмір шолома, зробіть наступне:</p>
        <ul class="list-decor-arrow">
            <li>
                <div>
                    1. За допомогою сантиметра або м'якої рулетки виміряйте окружність своєї голови в найширшій частині (якщо немає сантиметра, прикладіть до голови тасьму, мотузку, а потім виміряйте отриману довжину лінійкою). Як правило, вимірювати окружність голови потрібно на відстані 1,5-2,5 сантиметра вище брів, трохи вище вух і в тій точці на потилиці, яка дає вам найбільшу довжину окружності. Виміряйте голову кілька разів, щоб уникнути помилок і знайдіть максимальну довжину окружності. Таким самим методом користуються і продавці-консультанти у будь-якому спеціалізованому магазині. Але до того ж, потрібно чітко знати свій розмір, якщо ви замовляєте шолом за каталогом.
                </div>
            </li>
            <li>
                <div>
                    2. Тепер зіставте отриманий результат з розмірами шоломів, які вказані в зведених таблицях нижче - кожному розміру шолома відповідає певна довжина окружності голови в сантиметрах і / або дюймах. Потрібно враховувати, що різні виробники випускають жорсткі оболонки абсолютно різних форм і розмірів, вони можуть класифікувати розміри своїх шоломів по-різному. Якщо ви твердо впевнені, що хочете купити шолом конкретної марки, наприклад, Schuberth або Shoei, почитайте рекомендації на сайті виробника або проконсультуйтесь з нашим менеджером.
                </div>
            </li>
            <li>
                <ul>
                    <li>3. Якщо ви бачите, що вам можуть підійти два розміри шоломів, краще орієнтуватися на менший розмір.</li>
                    <li> 3.1. По-перше, вимоги безпеки полягають в тому, щоб шолом дуже щільно сидів на голові (але не викликав хворобливих відчуттів) - інакше ступінь його захисту буде істотно менше, або під час падіння з мотоцикла шолом взагалі звалиться з голови.</li>
                    <li> 3.2. По-друге, зараз ви визначайте тільки теоретичний розмір, і в магазині можете вибрати найбільш підходящий (якщо тільки ви не замовляєте шолом за каталогом; про це - нижче).</li>
                </ul>

            </li>
        </ul>
        <h3 class="title text-left">Таблиці відповідності розмірів мотошоломів в залежності від довжини окружності голови</h3>
        <p>
            <span class="strong-text">Примітка:</span> Розміри відрізняються в залежності від марок мотошоломів. Більш того, навіть один і той же виробник може, час від часу, переглядати свої власні розміри, не кажучи вже про зміну форми твердої оболонки в залежності від моделі, тому якщо ви не впевнені, зв’яжіться з нами і ми вас проконсультуємо за розміром бренду, який вас цікавить, враховуючи довжину окружності вашої голови. Перед дзвінком менеджеру обов’язково зробіть виміри, вказані вище.
        </p>
        <div class="table-wrrap">
            <table class="table-info">
                <thead><tr><td>Дюйми</td><td>Сантиметри</td><td>Розмір головного убора</td><td>Розмір шолома </td></tr></thead>
                <tbody>
                <tr><td>20,87 - 21,26</td><td>53 - 54</td><td>6-5/8 - 6-3/4</td><td>XS</td></tr>
                <tr><td>21,65 - 22,05</td><td>55 - 56</td><td> 6-7/8 - 7</td><td>S</td></tr>
                <tr><td>22,44 - 22,83</td><td>57 - 58</td><td>7-1/8 - 7-1/4</td><td>M</td></tr>
                <tr><td>23,23 - 23,62</td><td>59 - 60</td><td>7-3/8 - 7-3/4</td><td>L</td></tr>
                <tr><td>24,02 - 24,41</td><td>61 - 62</td><td> 7-5/8 - 7-7/8</td><td>XL</td></tr>
                </tbody>
            </table>
        </div>

    </div>
</section>
@endsection
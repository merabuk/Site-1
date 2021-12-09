<footer>
    <div class="container">
        <div class="top-block-footer">
            <div class="section-footer">
                <span class="title-footer">ПОКУПЦЯМ</span>
                <ul>
                    <li><a href="#">Шоломи і мотоекіпіровка</a></li>
                    <li><a href="#">Мотоаксессуари</a></li>
                    <li><a href="{{ route('product-brands') }}">Бренди</a></li>
                    <li><a href="#">Casual</a></li>
                    <li><a href="#">Новинки</a></li>
                    <li><a href="#">Розпродаж</a></li>
                </ul>
            </div>
            <div class="section-footer">
                <span class="title-footer">інформація</span>
                <ul>
                    {{-- {{ route('info-company') }} --}}
                    <li><a href="/info-company">Про компанію</a></li>
                    <li><a href="{{ route('info-partners') }}">Партнерам</a></li>
                    <li><a href="{{ route('info-customer') }}">Клієнтам</a></li>
                    <li><a href="{{ route('page-pay-shipping') }}">Оплата і доставка</a></li>
                    <li><a href="/info-question">Питання та відповіді</a></li>
                    {{-- {{ route('info-question') }} --}}
                </ul>
            </div>
            <div class="section-footer">
                <span class="title-footer">Контакти</span>
                <ul class="list-location">
                    <li><span class="icon icon-house"></span><span>Магазин мотоекіпіровки в Одесі</span></li>
                    <li><span class="icon icon-maps"></span>
                        <ul>
                            <li>вул. Люстдорфської дороги,</li>
                            <li>96 (р-н "Клюшка")</li>
                        </ul>
                    </li>
                    <li><span class="icon icon-phone"></span>
                        <ul>
                            <li><a href="tel:+380504955230">(050) 495-52-30</a></li>
                            <li><a href="tel:+380487770700">(048) 777-07-00</a></li>
                        </ul>
                    </li>
                    <li><span class="icon icon-global"></span><span>shopdinamoto@gmail.com</span></li>
                </ul>
            </div>
        </div>
        <div class="bottom-block-footer">
            <span class="title-footer">Наші дилери</span>
            <div class="footer-tabs-dillers">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="kiev-tab" data-toggle="tab" href="#kiev" role="tab" aria-controls="kiev" aria-selected="true">Київ</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="frankivsk-tab" data-toggle="tab" href="#frankivsk" role="tab" aria-controls="frankivsk" aria-selected="false">Івано-Франківськ</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="zaporigia-tab" data-toggle="tab" href="#zaporigia" role="tab" aria-controls="zaporigia" aria-selected="false">Запоріжжя</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="mukolaiv-tab" data-toggle="tab" href="#mukolaiv" role="tab" aria-controls="mukolaiv" aria-selected="false">Миколаїв</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="kropevnuckij-tab" data-toggle="tab" href="#kropevnuckij" role="tab" aria-controls="kropevnuckij" aria-selected="false">Кропивницький</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="lviv-tab" data-toggle="tab" href="#lviv" role="tab" aria-controls="lviv" aria-selected="false">Львів</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dnipropetrovsk-tab" data-toggle="tab" href="#dnipropetrovsk" role="tab" aria-controls="dnipropetrovsk" aria-selected="false">Дніпропетровськ</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="harkiv-tab" data-toggle="tab" href="#harkiv" role="tab" aria-controls="harkiv" aria-selected="false">Харків</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="odessa-tab" data-toggle="tab" href="#odessa" role="tab" aria-controls="odessa" aria-selected="false">Одеса</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="herson-tab" data-toggle="tab" href="#herson" role="tab" aria-controls="herson" aria-selected="false">Херсон</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="kiev" role="tabpanel" aria-labelledby="kiev-tab">
                        <div class="content-tab">
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>МОТОСТИЛЬ</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул. Костянтинівська, 71.</li>
                                            <li>ТЦ "Шоколад" (м. Тараса Шевченка)</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380443210331">(044) 321-03-31</a></li>
                                            <li><a href="tel:+380677654083">(067) 765-40-83</a></li>
                                            <li><a href="tel:+380959069339">(095) 906-93-39</a></li>
                                            <li><a href="tel:+380630482977">(063) 048-29-77</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>callcenter@shlem.com.ua</span></li>
                                    <li><span class="icon icon-global"></span><a href="//motostyle.ua/">motostyle.ua</a></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>ШОЛОМ</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул. Костянтинівська, 71.</li>
                                            <li>ТЦ "Шоколад" (м. Тараса Шевченка)</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380443922113">(044) 392-21-13</a></li>
                                            <li><a href="tel:+380993243027">(099) 324-30-27</a></li>
                                            <li><a href="tel:+380978675435">(097) 867-54-35</a></li>
                                            <li><a href="tel:+380633889893">(063) 388-98-93</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>callcenter@shlem.com.ua</span></li>
                                    <li><span class="icon icon-global"></span><a href="//shlem.com.ua/">shlem.com.ua</a></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>КАСТОМ КУЛЬТУРА</span></li>
                                    <li><span class="icon icon-maps"></span><span>вул. Степана Бандери 6</span></li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380444982926">(044) 498-29-26</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="frankivsk" role="tabpanel" aria-labelledby="frankivsk-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>МАКС АВТО</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>вул. Калуське шоссе 7д</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+380957362894">(095) 736-28-94</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="zaporigia" role="tabpanel" aria-labelledby="zaporigia-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>Магазин мототехніки та екіпіровки  " МотоR "</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>вул. Перемоги, .73</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+380612149108">(061) 214-91-08</a></li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-mail"></span><span>motoekip.zp@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mukolaiv" role="tabpanel" aria-labelledby="mukolaiv-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>Moto-pulse</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>вул. Космонавтів 81/24,</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+380961613327">(096) 161-33-27</a></li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-global"></span><a href="//motopulse.com.ua/">motopulse.com.ua</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kropevnuckij" role="tabpanel" aria-labelledby="kropevnuckij-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>«Зеленский А.И.» СПД."</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>вул.Кропивницкого 184</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+380612149108">(050) 555-50-14</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lviv" role="tabpanel" aria-labelledby="lviv-tab">
                        <div class="content-tab">
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>Мотоцентр на Пасічної</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул.Пасечна, .129</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380966565518">(096) 656-55-18</a></li>
                                            <li><a href="tel:+380674200852">(067) 420-08-52</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>Procar-lemberg</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>м.Львів Сокольники </li>
                                            <li>ул.Скніловская 23</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380974012104">(097) 401-21-04</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>Procarlemberg@gmail.com</span></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>MY BIKE</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>ул. Академіка Лазаренка 8</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380977778485">(097) 777-84-85</a></li>
                                            <li><a href="tel:+380737778485">(073) 777-84-85</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>info@mybike.ua</span></li>
                                    <li><span class="icon icon-global"></span><a href="//mybike.ua/">mybike.ua</a></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>HONDA Ария Моторс</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул.Городоцька, .306.</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380322323528">(032) 232-35-28</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dnipropetrovsk" role="tabpanel" aria-labelledby="dnipropetrovsk-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>МОТОРРАД</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>вул.Набережна Перемоги 10К.</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+380671117007">(067)-111-70-07</a></li>
                                        <li><a href="tel:+380630676060">(063)-067-60-60</a></li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-global"></span><a href="//motorrad.com.ua/">motorrad.com.ua</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="harkiv" role="tabpanel" aria-labelledby="harkiv-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>Мотостиль</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>вул. Шевченко, 67, </li>
                                        <li>2-й поверх (територія салону Honda)</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+380577289331">(057) 728-93-31</a></li>
                                        <li><a href="tel:+380677654083">(067) 765-40-83</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="odessa" role="tabpanel" aria-labelledby="odessa-tab">
                        <div class="content-tab">
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>ДиНамото</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул. Люстдорфская.дорога, 96</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380487770700">(048) 777-07-00</a></li>
                                            <li><a href="tel:+380504955230"> (050) 495-52-30</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>Динамото</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул. Розумовського 24</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380487098908">(048) 709-89-08</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>ГРАНД-МОТО</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул. Мельницька 30а</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380672833332">(067) 283-33-32</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>R-ACE YAMAHA</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>вул. Грушевського, .40</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+380487774628">(048) 777-46-28</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="herson" role="tabpanel" aria-labelledby="herson-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>Мото24</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>вул. Газова, 8</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+380504945612">(050) 494-56-12</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="bottom-text"><span>© 2007–2020 Магазин Dinamoto</span></div>
    </div>
</footer>

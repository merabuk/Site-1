<footer>
    <div class="container">
        <div class="top-block-footer">
            <div class="section-footer">
                <span class="title-footer">ПОКУПЦЯМ</span>
                <ul>
                    @forelse ($categories as $category)
                        <li><a href="{{ route('category', $category->slug) }}">{{ $category->name }}</a></li>
                    @empty
                    @endforelse
                    <li><a href="{{ route('product-brands') }}">Бренди</a></li>
                    <li><a href="{{ route('product-new') }}">Новинки</a></li>
                    <li><a href="{{ route('product-sale') }}">Розпродаж</a></li>
                </ul>
            </div>
            <div class="section-footer">
                <span class="title-footer">інформація</span>
                <ul>
                    <li><a href="/info-company">Про компанію</a></li>
                    <li><a href="/info-partners">Партнерам</a></li>
                    <li><a href="/info-customer">Клієнтам</a></li>
                    <li><a href="/page-pay-shipping">Оплата і доставка</a></li>
                    <li><a href="/info-question">Питання та відповіді</a></li>
                </ul>
            </div>

            <div class="section-footer">
                <span class="title-footer"><a href="/contact" style="color: #FF8200">Контакти</a></span>
                <ul class="list-location">
                    <li><span class="icon icon-house"></span><span>Магазин мотоекіпіровки в Одесі</span></li>
                    <li><span class="icon icon-maps"></span>
                        <ul>
                            <li>{{ $footer_articles[0]->content }}</li>
                            <li>{{ $footer_articles[1]->content }}</li>
                        </ul>
                    </li>
                    <li><span class="icon icon-phone"></span>
                        <ul>
                            <li><a href="tel:+{{ $footer_articles[2]->content }}">{{ $footer_articles[3]->content }}</a></li>
                            <li><a href="tel:+{{ $footer_articles[4]->content }}">{{ $footer_articles[5]->content }}</a></li>
                        </ul>
                    </li>
                    <li><span class="icon icon-global"></span><a href="//{{ $footer_articles[6]->content }}/">{{ $footer_articles[6]->content }}</a></li>
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
                        <a class="nav-link" id="cherkasi-tab" data-toggle="tab" href="#cherkasi" role="tab" aria-controls="cherkasi" aria-selected="false">Черкаси</a>
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
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[7]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[8]->content }}</li>
                                            <li>{{ $footer_articles[9]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[10]->content }}">{{ $footer_articles[11]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[12]->content }}">{{ $footer_articles[13]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[14]->content }}">{{ $footer_articles[15]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[16]->content }}">{{ $footer_articles[17]->content }}</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>{{ $footer_articles[18]->content }}</span></li>
                                    <li><span class="icon icon-global"></span><a href="//{{ $footer_articles[19]->content }}/" rel="nofollow">{{ $footer_articles[19]->content }}</a></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[20]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[21]->content }}</li>
                                            <li>{{ $footer_articles[22]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[23]->content }}">{{ $footer_articles[24]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[25]->content }}">{{ $footer_articles[26]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[27]->content }}">{{ $footer_articles[28]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[29]->content }}">{{ $footer_articles[30]->content }}</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>{{ $footer_articles[31]->content }}</span></li>
                                    <li><span class="icon icon-global"></span><a href="//{{ $footer_articles[32]->content }}/" rel="nofollow">{{ $footer_articles[32]->content }}</a></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[33]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span><span>{{ $footer_articles[34]->content }}</span></li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[35]->content }}">{{ $footer_articles[36]->content }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="frankivsk" role="tabpanel" aria-labelledby="frankivsk-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>{{ $footer_articles[37]->content }}</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>{{ $footer_articles[38]->content }}</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+{{ $footer_articles[39]->content }}">{{ $footer_articles[40]->content }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="cherkasi" role="tabpanel" aria-labelledby="cherkasi-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>{{ $footer_articles[41]->content }}</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>{{ $footer_articles[42]->content }}</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+{{ $footer_articles[43]->content }}">{{ $footer_articles[44]->content }}</a></li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-mail"></span><span>{{ $footer_articles[45]->content }}</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="mukolaiv" role="tabpanel" aria-labelledby="mukolaiv-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>{{ $footer_articles[46]->content }}</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>{{ $footer_articles[47]->content }}</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+{{ $footer_articles[48]->content }}">{{ $footer_articles[49]->content }}</a></li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-global"></span><a href="//{{ $footer_articles[50]->content }}/" rel="nofollow">{{ $footer_articles[50]->content }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="kropevnuckij" role="tabpanel" aria-labelledby="kropevnuckij-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>{{ $footer_articles[51]->content }}</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>{{ $footer_articles[52]->content }}</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+{{ $footer_articles[53]->content }}">{{ $footer_articles[54]->content }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="lviv" role="tabpanel" aria-labelledby="lviv-tab">
                        <div class="content-tab">
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[55]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[56]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[57]->content }}">{{ $footer_articles[58]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[59]->content }}">{{ $footer_articles[60]->content }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[61]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[62]->content }}</li>
                                            <li>{{ $footer_articles[63]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[64]->content }}">{{ $footer_articles[65]->content }}</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>{{ $footer_articles[66]->content }}</span></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[67]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[68]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[69]->content }}">{{ $footer_articles[70]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[71]->content }}">{{ $footer_articles[72]->content }}</a></li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-mail"></span><span>{{ $footer_articles[73]->content }}</span></li>
                                    <li><span class="icon icon-global"></span><a href="//{{ $footer_articles[74]->content }}/" rel="nofollow">{{ $footer_articles[74]->content }}</a></li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[75]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[76]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[77]->content }}">{{ $footer_articles[78]->content }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="dnipropetrovsk" role="tabpanel" aria-labelledby="dnipropetrovsk-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>{{ $footer_articles[79]->content }}</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>{{ $footer_articles[80]->content }}</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+{{ $footer_articles[81]->content }}">{{ $footer_articles[82]->content }}</a></li>
                                        <li><a href="tel:+{{ $footer_articles[83]->content }}">{{ $footer_articles[84]->content }}</a></li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-global"></span><a href="//{{ $footer_articles[85]->content }}/" rel="nofollow">{{ $footer_articles[85]->content }}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="harkiv" role="tabpanel" aria-labelledby="harkiv-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>{{ $footer_articles[86]->content }}</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>{{ $footer_articles[87]->content }}</li>
                                        <li>{{ $footer_articles[88]->content }}</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+{{ $footer_articles[89]->content }}">{{ $footer_articles[90]->content }}</a></li>
                                        <li><a href="tel:+{{ $footer_articles[91]->content }}">{{ $footer_articles[92]->content }}</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="odessa" role="tabpanel" aria-labelledby="odessa-tab">
                        <div class="content-tab">
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[93]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[94]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[95]->content }}">{{ $footer_articles[96]->content }}</a></li>
                                            <li><a href="tel:+{{ $footer_articles[97]->content }}">{{ $footer_articles[98]->content }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[99]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[100]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[101]->content }}">{{ $footer_articles[102]->content }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[103]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[104]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[105]->content }}">{{ $footer_articles[106]->content }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="section-footer">
                                <ul class="list-location">
                                    <li><span class="icon icon-house"></span><span>{{ $footer_articles[107]->content }}</span></li>
                                    <li><span class="icon icon-maps"></span>
                                        <ul>
                                            <li>{{ $footer_articles[108]->content }}</li>
                                        </ul>
                                    </li>
                                    <li><span class="icon icon-phone"></span>
                                        <ul>
                                            <li><a href="tel:+{{ $footer_articles[109]->content }}">{{ $footer_articles[110]->content }}</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="herson" role="tabpanel" aria-labelledby="herson-tab">
                        <div class="section-footer">
                            <ul class="list-location">
                                <li><span class="icon icon-house"></span><span>{{ $footer_articles[111]->content }}</span></li>
                                <li><span class="icon icon-maps"></span>
                                    <ul>
                                        <li>{{ $footer_articles[112]->content }}</li>
                                    </ul>
                                </li>
                                <li><span class="icon icon-phone"></span>
                                    <ul>
                                        <li><a href="tel:+{{ $footer_articles[113]->content }}">{{ $footer_articles[114]->content }}</a></li>
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

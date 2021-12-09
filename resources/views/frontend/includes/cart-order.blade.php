<section class="section-ordering" id="section-ordering">
        @if (count($products) > 0)
            <div class="text-info-cart">Заповніть будь ласка Ваші дані для замовлення</div>
            <div class="container">
            <div class="d-lg-flex align-items-lg-baseline">
                <h3 class="title-section text-center">Контакти</h3>
                <ul class="nav nav-tabs" id="myTab-top" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="new-user-tab" data-toggle="tab" href="#new-user" role="tab" aria-controls="new-user" aria-selected="true">{{Auth::check() ? 'Контактні дані' : 'Новий покупець'}}</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent-top">
                <div class="tab-pane fade show active" id="new-user" role="tabpanel" aria-labelledby="new-user-tab">
                    <form class="form-personal-info" id="order-contact-info-form">
                        <div class="form-group row">
                            <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваше Прізвище<span class="color-red">*</span></label>
                            <div class="col-sm-7  col-md-8 col-lg-6">
                                <span class="icon-error" id="surname-icon"></span>
                                <input name="surname" type="text" class="form-control" id="surname"
                                    value="{{ isset($user->surname) ? $user->surname : '' }}" placeholder="Ваше Прізвище">
                            </div>
                            <span class="text-error col- col-lg-3" id="surname-text"></span>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваше Ім'я<span class="color-red">*</span></label>
                            <div class="col-sm-7  col-md-8 col-lg-6">
                                <span class="icon-error" id="name-icon"></span>
                                <input name="name" type="text" class="form-control" id="name"
                                    value="{{ isset($user->name) ? $user->name : '' }}" placeholder="Ваше Ім'я">
                            </div>
                            <span class="text-error col- col-lg-3" id="name-text"></span>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваше По Батькові</label>
                            <div class="col-sm-7  col-md-8 col-lg-6">
                                <span class="icon-error" id="patronymic-icon"></span>
                                <input name="patronymic" type="text" class="form-control" id="patronymic"
                                    value="{{ isset($user->patronymic) ? $user->patronymic : '' }}" placeholder="Ваше По Батькові">
                            </div>
                            <span class="text-error col- col-lg-3" id="patronymic-text"></span>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваш E-mail<span class="color-red">*</span></label>
                            <div class=" col-sm-7  col-md-8 col-lg-6">
                                <span class="icon-error" id="email-icon"></span>
                                <input name="email" type="email" class="form-control" id="email"
                                    value="{{ isset($user->email) ? $user->email : '' }}" placeholder="Ваш E-mail">
                            </div>
                            <span class="text-error col- col-lg-3" id="email-text"></span>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Ваш телефон<span class="color-red">*</span></label>
                            <div class="col-sm-7  col-md-8 col-lg-6">
                                <span class="icon-error" id="phone-icon"></span>
                                <input name="phone" type="tel" class="form-control" id="phone"
                                    value="{{ isset($user->phone) ? $user->phone : '' }}" placeholder="Ваш телефон">
                            </div>
                            <span class="text-error col- col-lg-3" id="phone-text"></span>
                        </div>
                        @guest
                            <order-password-register></order-password-register>
                        @endguest
                    </form>
                </div>
            </div>
            <div class="d-lg-flex align-items-lg-baseline block-shipping">
                <h3 class="title-section text-center">Доставка</h3>
                <ul class="nav nav-tabs" id="myTab-bottom" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="shipping-tab" data-toggle="tab" href="#shipping" role="tab" aria-controls="shipping" aria-selected="true">доставка транспортною компанією</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="self-pickup-tab" data-toggle="tab" href="#self-pickup" role="tab" aria-controls="self-pickup" aria-selected="false">Самовивіз в Одесі</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myTabContent-bottom">
                <div class="tab-pane fade show active" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                    <span class="d-flex mb-3"><span class="icon icon-shipping"></span>Доставка по Україні безкоштовна</span>
                    <form class="form-personal-info" id="order-contact-info-deloviry-form">
                        <div class="form-group row">
                            <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Місто<span class="color-red">*</span></label>
                            <div class="col-sm-7  col-md-8 col-lg-6">
                                <span class="icon-error" id="city-icon"></span>
                                <input name="city" type="text" class="form-control" id="city"
                                    value="{{ isset($user->city) ? $user->city : '' }}"  placeholder="Місто">
                            </div>
                            <span class="text-error col- col-lg-3" id="city-text"></span>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-5 col-md-4 col-lg-3 col-form-label">Адреса<span class="color-red">*</span></label>
                            <div class="col-sm-7  col-md-8 col-lg-6">
                                <span class="icon-error" id="address-icon"></span>
                                <input name="address" type="text" class="form-control" id="address"
                                    value="{{ isset($user->address) ? $user->address : '' }}" placeholder="вул. Вулиця., буд. 7/45">
                            </div>
                            <span class="text-error col- col-lg-3" id="address-text"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Комментар</label>
                            <div class="col-sm-7 col-md-8 col-lg-6">
                                <span class="icon-error" id="comment-icon"></span>
                                <textarea name="comment" class="form-control" rows="3" id="comment"></textarea>
                            </div>
                            <span class="text-error col- col-lg-3" id="comment-text"></span>
                        </div>
                    </form>
                </div>
                <div class="tab-pane tab-content-self-pickup fade" id="self-pickup" role="tabpanel" aria-labelledby="self-pickup">
                    <div class="form-check">
                        <input name="pikup" class="form-check-input" type="checkbox" value="" id="self-pickup1">
                        <label id="self-pickup-label" class="form-check-label" for="self-pickup1">
                            Самовивіз з Магазину мотоекіпіровки в Одесі
                        </label>
                    </div>
                    <ul class="list-location">
                        <li><span class="icon icon-maps"></span>
                            <ul>
                                <li>вул. Люстдорфської дороги,</li>
                                <li>96 (р-н "Клюшка")</li>
                            </ul>
                        </li>
                        <li><span class="icon icon-phone"></span>
                            <ul>
                                <li>(050) 495-52-30</li>
                                {{-- <li>(048) 777-07-00</li> --}}
                            </ul>
                        </li>
                        <li><span class="icon icon-mail"></span><span>shopdinamoto@gmail.com</span></li>
                        <li>
                            <span class="icon-clock"></span>
                            <ul>
                                <li>Пн.:  10:00-17:00</li>
                                <li>Вт.- Пт. 10:00-18:00</li>
                                <li>Сб.:  11:00-17:00</li>
                                <li>Вс.: Вихідний</li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="d-lg-flex align-items-lg-baseline block-shipping">
                <h3 class="title-section text-center">Ви робот?</h3>
                <ul class="nav nav-tabs" id="myCaptchaTab-bottom" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="my_captcha-tab" data-toggle="tab" href="#my_captcha" role="tab" aria-controls="my_captcha" aria-selected="true">Заповніть Captcha</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content" id="myCaptchaTabContent-bottom">
                <div class="tab-pane fade show active" id="my_captcha" role="tabpanel" aria-labelledby="my_captcha-tab">
                    <form class="form-personal-info" id="order-captcha-form">
                        <div class="form-group row">
                            <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Captcha</label>
                            <div class="col-sm-7 col-md-8 col-lg-6 captcha">
                                <span>{!! captcha_img() !!}</span>
                                <button type="button" class="btn btn-danger" class="reload" id="reload">
                                    &#x21bb;
                                </button>
                            </div>
                            <span class="text-error col- col-lg-3" id="city-text"></span>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-5 col-md-4 col-lg-3 col-form-label">Введіть Captcha<span class="color-red">*</span></label>
                            <div class="col-sm-7 col-md-8 col-lg-6">
                                <span class="icon-error" id="captcha-icon"></span>
                                <input id="captcha" type="text" class="form-control" placeholder="Введіть Captcha" name="captcha">
                            </div>
                            <span class="text-error col- col-lg-3" id="captcha-text"></span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <cart-total-order></cart-total-order>
        @else
            <div class="text-info-cart">Будь ласка додайте товари в кошик!</div>
        @endif
    </section>

@section('script')
    <script>
        $(document).ready(() => {
            hideValidation();
            setTimeout(function(){
                $('#reload').trigger('click');
            }, 1000);

            $('#button-create-order').on('click', (e) => {
                e.preventDefault();
                var orderContactInfo = $('#order-contact-info-form');
                var orderContactDelivery = $('#order-contact-info-deloviry-form');
                var orderContactPikup = $('#self-pickup1').prop('checked');
                var is_guest = $('#is_guest').prop('checked');
                var orderCaptcha = $('#order-captcha-form');

                var request_data = {
                    _token: "{{ csrf_token() }}",
                    surname: orderContactInfo.find('input[name="surname"]').val(),
                    name: orderContactInfo.find('input[name="name"]').val(),
                    patronymic: orderContactInfo.find('input[name="patronymic"]').val(),
                    email: orderContactInfo.find('input[name="email"]').val(),
                    phone: orderContactInfo.find('input[name="phone"]').val(),
                    is_guest: is_guest ? null : 1,
                    password: orderContactInfo.find('input[name="password"]').val(),
                    password_confirmation: orderContactInfo.find('input[name="password_confirmation"]').val(),
                    city: orderContactDelivery.find('input[name="city"]').val(),
                    address: orderContactDelivery.find('input[name="address"]').val(),
                    comment: orderContactDelivery.find('textarea[name="comment"]').val(),
                    pikup: orderContactPikup ? 1 : 0,
                    captcha: orderCaptcha.find('input[name="captcha"]').val(),
                };

                $.ajax({
                    url: window.origin+'/orders/create',
                    type: 'POST',
                    data: request_data,
                    datatype: 'json'
                })
                .done(function (data) {
                    hideValidation();
                    if (data.status == 'done') {
                        $('#Modal-thank').show();
                        $('body').addClass('modal-open');
                        $('#Modal-thank').find('.number-order').text('№ ' + data.order_id);
                        $('#Modal-thank').css('opacity', 1);
                    } else if (data.status == 'fail') {
                        console.log(data.status);
                        alert('Вибачте, ваш заказ неможливо здійснити!');
                    }

                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    hideValidation();
                    var errorObj = jqXHR.responseJSON.errors;
                    $.each(errorObj, (index, value) => {
                        $('#'+index).addClass('border-error');
                        $('#'+index+'-icon, #'+index+'-text').show();
                        $('#'+index+'-text').text(value[0]);
                    });
                });
            });
            $('#reload').click(function () {
                $.ajax({
                    type: 'GET',
                    url: 'reload-captcha',
                    success: function (data) {
                        $(".captcha span").html(data.captcha);
                        $('#captcha-icon, #captcha-text').hide();
                        $('#captcha').removeClass('border-error');
                    }
                });
            });
            $('#btn-one-click-cart').click(function () {
                $.ajax({
                    type: 'GET',
                    url: 'reload-click-captcha',
                    success: function (data) {
                        $("#captcha-cart-img").attr("src", data.captcha);
                    }
                });
            });
        });
        function hideValidation() {
            var filds = ['surname', 'name', 'patronymic', 'email', 'phone', 'password', 'password_confirmation', 'city', 'address', 'comment', 'captcha'];
            $.each(filds, (index, value) => {
                $('#'+value+'-icon, #'+value+'-text').hide();
                $('#'+value).removeClass('border-error');
            });
        }
    </script>
@endsection

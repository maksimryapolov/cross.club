@extends('layouts.layout')

@section('content')
     <header class="header" id="header">
        <div class="header-nav__top">
            <div class="container header-group">
                <div class="row header-block">
                    <div class="col-8 col-sm-5">
                        <img class="header-logo" src="{{ asset('images/svg/logo.svg') }}" alt="logo">
                    </div>
                    <div class="col-sm-7 col-xs-12">
                        <div class="header-top__link">
                            <a class="header__number header__info" href="tel:+89507174848">
                                +7(950) 717-48-48
                            </a>
                            <a class="header__mail header__info" href="mailto:adminemail@mail.com">
                                maks.riapolov@yandex.ru
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="b-nav">
            <ul class="b-nav__container">
                <li class="b-nav__item">
                    <a class="b-nav__item-link transition" href="#header">Главная</a>
                </li>
                <li class="b-nav__item">
                    <a class="b-nav__item-link transition" href="#catalog">Каталог</a>
                </li>
                <li class="b-nav__item">
                    <a class="b-nav__item-link transition" href="#footer">Контакты</a>
                </li>
            </ul>
        </div>
        
        <div class="header-banner">
            <div class="container">
                <h1 class="header-banner__title">Распродажа кроссовок</h1>
                <p class="header-banner__description">
                <span>
                    Небольшая качественная коллекции обуви распродаются со&nbsp;скидкой до&nbsp;70%.<br> Успейте порадовать себя и&nbsp;своих близких.
                </span>
                </p>
                <a href="#catalog" class="button_servis header-banner__btn transition">Перейти к каталогу</a>
                {{--<a href="javascript:void(0)" class="header-banner__btn popup button_servis" data-popup="#header_modal">Заказать звонок</a>--}}
            </div>
        </div>
        <div id="carouselExampleIndicators" class="carousel slide carousel-media d-none d-md-block" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                {{-- <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> --}}
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    {{-- <img class="d-block w-100" src="{{ asset('images/banner.jpg') }}" alt="Первый слайд"> --}}
                    <div class="d-block w-100 b-banner" style="background-image: url('{{ asset('images/banner.jpg') }}');">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="display-3">Распродажа кроссовок</h3>
                            <p class="carousel-description">Небольшая качественная коллекции обуви распродаются с&nbsp;выгодой до&nbsp;70%.<br> Успейте порадовать себя и&nbsp;своих близких.</p>
                            <div id="feedback-header"></div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    {{-- <img class="d-block w-100" src="{{ asset('images/banner2.jpg') }}" alt="Второй слайд"> --}}
                    <div class="d-block w-100 b-banner" style="background-image: url('{{ asset('images/banner3.jpg') }}');">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="display-3">Сэкономьте время и деньги</h3>
                            <p class="carousel-description">Приобретайте стильную обувь не выходя из дома</p>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    {{-- <img class="d-block w-100" src="{{ asset('images/banner2.jpg') }}" alt="Второй слайд"> --}}
                    <div class="d-block w-100 b-banner" style="background-image: url('{{ asset('images/banner2.jpg') }}');">
                        <div class="carousel-caption d-none d-md-block">
                            <h3 class="display-3">Небольшой бонус</h3>
                            <p class="carousel-description">Купите две пары наших стильных кроссовк и получите пару наших носков в подарок!</p>
                            <a href="#catalog" class="button_servis header-banner__btn transition">Перейти к каталогу</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('images/banner2.jpg') }}" alt="Третий слайд">
                    <div class="carousel-caption d-none d-md-block">
                        <h3>И это ещё не все...</h3>
                        <p>Купите две пары наших стильных кроссовк и получите пару наших носков в подарок!</p>
                    </div>
                </div> --}}
            </div>
            {{-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a> --}}
        </div>
    </header>

    <main>
        <section class="advantages" id="advantages">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="advantages__item-box">
                            <div class="advantages__item-circle glasses"></div>
                            <div class="advantages__title"><b>Осмотр перед покупкой</b></div>
                            <p class="advantages__text">Вы сможете примерить обувь перед оплатой заказа курьеру. Оплачивайте только то, что вам подошло и понравилось!</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="advantages__item-box">
                            <div class="advantages__item-circle logistics"></div>
                            <div class="advantages__title">
                                <b>Доставка в любое время</b>
                            </div>
                            <p class="advantages__text">
                                Вы получите свой заказ уже в этот же день! Самое главное, доставка бесплатна.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="advantages-main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 advantages-main__image-block">
                        <img src="{{ 'images/advantages.jpg' }}" class="advantages-main__img" alt="">
                    </div>
                    <div class="col-lg-6">
                        <div class="advantages-main__box">
                            <h2 class="advantages-main__title">Почему стоит купить у нас</h2>
                            <div class="advantages-main__description">
                                Наша обувь представлена в большом разнообразии моделей, размеров и расцветок. Она подходит для
                                разного времени года и сочетается как с классическим, так и со спортивным или повседневным гардеробом.
                            </div>
                            <div class="advantages-main__item">
                                <div class="advantages-main__item-icon moneybox"></div>
                                <span>Самая выгодная цена!</span>
                            </div>
                            <div class="advantages-main__item">
                                <div class="advantages-main__item-icon return"></div>
                                <span>Гарантия возврата денег в течении 10 дней!</span>
                            </div>
                            <div class="advantages-main__item">
                                <div class="advantages-main__item-icon delivery"></div>
                                <span>Бесплатная доставка в черте города!</span>
                            </div>
                            <!-- <div class="advantages-main__item">
                                <div class="advantages-main__item-icon"></div>
                                <span>Бесплатная консультация!</span>
                            </div> -->
                            <div id='feedback-body'></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="catalog" id='catalog'>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="catalog__box">
                            <h2 class="catalog__title">Наши кроссовки по смешным ценам</h2>
                            <div class="catalog__description">
                                Ниже представлены модели из нашего ассортимента. Свяжитесь с нами, чтобы получить более бодробную информацию.
                            </div>
                            <div class="catalog-product__container" id="products">
                                {{--<div class="row catalog__block">--}}
                                    {{--@foreach($products as $product)--}}
                                        {{--<div class="col-10 col-lg-4 col-md-6">--}}
                                            {{--<div class="catalog-product__box">--}}
                                                {{--<div class="catalog-product__img" style="background-image: url('{{ $product->image }}');"></div>--}}
                                                {{--<!--<img class="catalog-product__img" src="./dist/images/cross1.jpg" alt="">-->--}}
                                                {{--<p class="catalog-product__name">--}}
                                                   {{--{{ $product->name }}--}}
                                                {{--</p>--}}
                                                {{--<div class="catalog-product__box-bootom">--}}
                                                    {{--<span class="catalog-product__price">--}}
                                                        {{--{{ $product->price }}&nbsp;руб.--}}
                                                    {{--</span>--}}
                                                    {{-- @foreach ($product->offers as $item)--}}
                                                        {{--{{ $item->size }}--}}
                                                    {{--@endforeach --}}
                                                    {{----}}
                                                    {{----}}
                                                    {{--<div class="catalog-product__box-sizes">--}}
                                                        {{--<div class="wrapper">--}}
                                                            {{--<div class="dropdown">--}}
                                                                {{--<label data-value="">Выберите размер</label>--}}
                                                                {{--<ul>--}}
                                                                    {{--<li data-value="40">40</li>--}}
                                                                    {{--<li data-value="41">41</li>--}}
                                                                    {{--<li data-value="42">42</li>--}}
                                                                {{--</ul>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                                {{--<a href="javascrip:void(0)" data-popup="#header_modal-product" class="catalog-product__btn button_servis popup">--}}
                                                    {{--Заказать--}}
                                                {{--</a>--}}
                                            {{--</div>--}}
                                        {{--</div>--}}
                                    {{--@endforeach--}}
                                {{--</div>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        @if($popular)
            <section class="b-popular">
                <div class="container">
                    <h1 class="b-popular__title">Популярные товары</h1>
                    <div class="owl-carousel owl-theme" id="carousel">
                        @foreach ($popular as $pop)
                            <div class="slider__item" style="background-image:url('{{ $pop->image }}')"></div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif

        <div class='formalization'>
            <div class="container">
                <div class="row owl-carousel owl-theme formalization__tablet" >
                    <div class="col-md-4 formalization__block">
                        <div class="formalization__item">
                            <div class="formalization__title">
                                <b>Шаг 1</b>
                            </div>
                            <img src="{{ 'images/svg/arrow.svg' }}" class="formalization__arrow" alt="arrow">
                        </div>
                        <div class="formalization__bottom">
                            <h3>Выберите пару</h3>
                            <p class="formalization__desc">
                                Выберите из&nbsp;нашего ассортимента пару которая гармонично сочетается с&nbsp;ваши стилем. <br>Не&nbsp;заставляйте себя ждать, нажимайте заказать.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 formalization__block">
                        <div class="formalization__item">
                            <div class="formalization__title">
                                <b>Шаг 2</b>
                            </div>
                            <img src="{{ asset('images/svg/arrow.svg') }}" class="formalization__arrow" alt="arrow">
                        </div>
                        <div class="formalization__bottom">
                            <h3>Заполните форму</h3>
                            <p class="formalization__desc">
                                Оставьте свои контактные данные.<br>Заполните поля телефон и&nbsp;email, чтобы мы&nbsp;могли связаться с&nbsp;Вами.
                            </p>
                        </div>
                    </div>
                    <div class="col-md-4 formalization__block">
                        <div class="formalization__item">
                            <div class="formalization__title">
                                <b> Шаг 3</b>
                            </div>
                        </div>
                        <div class="formalization__bottom">
                            <h3>Ожидайте звонка</h3>
                            <p class="formalization__desc">
                                Мы&nbsp;не&nbsp;заставим Вас долго ждать.<br>В&nbsp;самое ближайшее время свяжемся с&nbsp;Вами и&nbsp;ответим на&nbsp;все интересующие Вас вопросы!
                            </p>
                        </div>
                    </div>
                </div>
                <div class="row owl-carousel owl-theme" id='formalization'>
                    <div class="formalization__block">
                        <div class="formalization__item">
                            <div class="formalization__title">
                                <b>Шаг&nbsp;1</b>
                            </div>
                            <img src="{{ asset('images/svg/arrow.svg') }}" class="formalization__arrow" alt="arrow">
                        </div>
                        <div class="formalization__bottom">
                            <h3>Выберите пару</h3>
                            <p class="formalization__desc">
                                Выберите из&nbsp;нашего ассортимента пару которая гармонично сочетается с&nbsp;ваши стилем. <br>Не&nbsp;заставляйте себя ждать, нажимайте заказать.
                            </p>
                        </div>
                    </div>
                    <div class="formalization__block">
                        <div class="formalization__item">
                            <div class="formalization__title">
                                <b>Шаг&nbsp;2</b>
                            </div>
                            <img src="{{ asset('images/svg/arrow.svg') }}" class="formalization__arrow" alt="arrow">
                        </div>
                        <div class="formalization__bottom">
                            <h3>Заполните форму</h3>
                            <p class="formalization__desc">
                                Оставьте свои контактные данные.<br>Заполните поля телефон и&nbsp;email, чтобы мы&nbsp;могли связаться с&nbsp;Вами.
                            </p>
                        </div>
                    </div>
                    <div class="formalization__block">
                        <div class="formalization__item">
                            <div class="formalization__title">
                                <b> Шаг&nbsp;3</b>
                            </div>
                        </div>
                        <div class="formalization__bottom">
                            <h3>Ожидайте звонка</h3>
                            <p class="formalization__desc">
                                Мы&nbsp;не&nbsp;заставим Вас долго ждать.<br>В&nbsp;самое ближайшее время свяжемся с&nbsp;Вами и&nbsp;ответим на&nbsp;все интересующие Вас вопросы!
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </main>

    <footer class="b-footer" id="footer">
        <div class="container">
            <div class="b-footer__title">
                Распродажа известных брендов спортивной обуви
            </div>
            <div class="b-footer__block">
                <div class="b-footer__contact">
                    <div class="b-footer__btn-popup">
                        <div id="feedback-footer"></div>
                    </div>
                    {{-- <div class="header-top__link">
                        <a class="header__number header__info" href="tel:+89507174848">
                            +7(950) 717-48-48
                        </a>
                        <a class="header__mail header__info" href="mailto:adminemail@mail.com">
                            maks.riapolov@yandex.ru
                        </a>
                    </div> --}}
                    <div class="b-footer__info">
                        <div class="b-footer__wrap-info">
                            <span class="b-footer__info-item footer-number"></span>
                            <a href="tel:89040870275">
                                89040870275
                            </a>
                        </div>
                        <div class="b-footer__wrap-info">
                            <span class="b-footer__info-item footer-email"></span>
                            <a  href="mailto:maks.riapolov@yandex.ru">maks.riapolov@yandex.ru</a>
                        </div>
                    </div>
                </div>
                <div>
                    <b>Мы в соц. сетях</b>
                    <div class="social-icons">
                        <a class="icon-vk" href="https://vk.com/cross_shop31" target="_blank"></a>
                        <a class="icon-inst" href="" target="_blank"></a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="b-footer__copy">
                &copy; 2019 &ndash; 2020 Cross-Shop. All Rights Reserved
            </div>

        </div>
    </footer>

    <div id="header_modal" class="b-popup-bg">
        <div class="b-popup">
            <button class="b-popup__close">&times;</button>
            <div class="b-popup__container">
                <h4 class="b-popup__title">
                    Заказать обратный звонок
                </h4>
                <div class="b-popup__description">
                    Оставьте номер телефона и&nbsp;наши менеджеры свяжутся с&nbsp;Вами в&nbsp;ближайшее время
                </div>
                <form action="" class="popup-form">
                    <input class="popup-form__in maskphone" type="text" name="phone" placeholder="Введите номер телефона...">
                    <button class="popup-form__btn">Перезвоните мне</button>
                </form>
            </div>
        </div>
    </div>

    <div id="header_modal-question" class="b-popup-bg">
        <div class="b-popup">
            <button class="b-popup__close">&times;</button>
            <div class="b-popup__container">
                <h4 class="b-popup__title">
                    Заказать обратный звонок
                </h4>
                <div class="b-popup__description">
                    Оставьте номер телефона и&nbsp;наши менеджеры свяжутся с&nbsp;Вами в&nbsp;ближайшее время
                </div>
                <form action="" class="popup-form">
                    <input class="popup-form__in maskphone" type="text" name="phone" placeholder="Введите номер телефона...">
                    <textarea class="popup-form__in textarea" name="question" placeholder="Введите ваш вопрос..." cols="10" rows="10"></textarea>
                    <button class="popup-form__btn">Перезвоните мне</button>
                </form>
            </div>
        </div>
    </div>

    <div id="modal">

    </div>

@endsection
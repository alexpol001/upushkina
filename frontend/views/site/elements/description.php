<?php
/* @var $this yii\web\View */
/* @var $description \common\models\Material */

?>
<div id="description">
    <h2>
        <? if ($description) : ?>
            <?=$description->title?>
        <? else :?>
            Роскошная квартира в самом центре
        <? endif; ?>
    </h2>
    <div id="option">
            <span class="icon-item">
                <span class="fa fa-male">&nbsp;</span><span class="second-color">2 гостя</span>
            </span>&nbsp;
        <span class="icon-item">
                <span class="fa fa-hourglass-half">&nbsp;</span><span class="second-color">1 спальня</span>
            </span>&nbsp;
        <span class="icon-item">
                <span class="fa fa-bed">&nbsp;</span><span class="second-color">1 кровать</span>
            </span>&nbsp;
        <span class="icon-item">
                <span class="fa fa-bath">&nbsp;</span><span class="second-color">1 ванная</span>
            </span>&nbsp;
    </div>
    <? if ($description) : ?>
        <?=$description->text?>
    <? else :?>
        <p>Литературные аппартаменты «На углу у Пушкина» раположены в
            самом сердце исторической части города около драматического
            театра имени А.С Пушкина.
        </p>
        <p>
            Аппартаменты оснащены всем необходимым для комфортного проживания:
        </p>
        <ul class="third-color">
            <li>большая и удобная двуспальная кровать;</li>
            <li>TV и Wi-fi;</li>
            <li>душевая комната и туалет;</li>
            <li>кухня с необходимой бытовой техникой и мебелью: холодильником,
                        стиральной машиной, чайником, кофеваркой, посудой, микроволновой
                            печью и плитой;</li>
            <li>гладильные принадлежности;</li>
            <li>бесплатная парковка во дворе дома;</li>
        </ul>
        <p class="third-color">
            В пешей доступности расположены основные исторические и современные
            достопримечательности нашего замечательного города: драматический театр
            имени А.С Пушкина, Большой концертный зал Псковской филармонии, пешеходная
            Пушкинская улица, парки, Кремль и Золотая набережная для прогулок, Псковский
            государственный музей-заповедник «Поганкины палаты», кафе, рестораны, магазины.
        </p>
        <p class="third-color">Мы всегда рады нашим гостям и ждем Вас снова!</p>
    <? endif; ?>
    <div class="link-owner" style="display: none">
        <hr>
        +7 (911) 390-06-44 Александр
        <div class="nav-social">
            <a href="tg://resolve?domain=psk_pushkin"><i class="fa fa-telegram"></i></a>
            <a href="whatsapp://send?phone=79113900644"><i class="fa fa-whatsapp"></i></a>
            <a href="viber://chat?number=+79113900644"><i class="fa fa-phone"></i></a>
            <a href="https://www.instagram.com/psk_pushkin/"><i class="fa fa-instagram" target="_blank"></i></a>
        </div>
    </div>
    <a class="tolink-owner" href="#">Связь с хозяином</a>
    <hr>
</div>
<?php
/* @var $this yii\web\View */

use frontend\components\Frontend;

?>
    <div id="order">
        <div class="price">
            <div style="display: none"><span class="price-value"><?= \common\models\Offer::getCurrentPrice() ?></span> Р <span>за сутки</span></div>
            <div class="rating-value">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <hr>
        </div>
        <div class="phone-input">
            <label for="phone-input">Как с вами связаться?</label>
            <input type="text" id="phone-input" placeholder="Номер вашего телефона">
        </div>
        <div class="date-input">
            <h3>Даты</h3>
            <div class="date-range">
                <div class="from">
                    Прибытие
                </div>
                <i class="fa fa-arrow-right"></i>
                <div class="to">
                    Выезд
                </div>
            </div>
        </div>
        <div class="order">
            <div class="guest">
                <h3>Количество гостей</h3>
                <div class="guest-select">
                    <a class="minus" href="#"><i class="fa fa-minus"></i></a>
                    <span>1 гость</span>
                    <a class="plus" href="#"><i class="fa fa-plus"></i></a>
                </div>
            </div>
            <hr>
            <div class="result-text">Итого</div>
            <div class="result">
            </div>
            <div class="clearfix"></div>
            <a class="order-button" href="#">Забронировать</a>
        </div>
        <div class="date" style="display: none">
            <div class="date-select">
                <div class="date-wrapper">
                    <div class="head">
                        <a href="#" class="arrow">
                            <i class="fa fa-long-arrow-left"></i>
                        </a>
                        <h4>Октябрь 2018</h4>
                        <a href="#" class="arrow">
                            <i class="fa fa-long-arrow-right"></i>
                        </a>
                    </div>
                    <div class="clearfix"></div>
                    <table>
                        <tr>
                            <th>пн</th>
                            <th>вт</th>
                            <th>ср</th>
                            <th>чт</th>
                            <th>пт</th>
                            <th>сб</th>
                            <th>вс</th>
                        </tr>
                        <tr>
                            <td class="disabled">
                                1
                            </td>
                            <td class="disabled">
                                2
                            </td>
                            <td class="disabled">
                                3
                            </td>
                            <td class="disabled">
                                4
                            </td>
                            <td class="disabled">
                                5
                            </td>
                            <td class="disabled">
                                6
                            </td>
                            <td class="disabled">
                                7
                            </td>
                        </tr>
                        <tr>
                            <td class="disabled">
                                8
                            </td>
                            <td class="disabled">
                                9
                            </td>
                            <td class="disabled">
                                10
                            </td>
                            <td>
                                11
                            </td>
                            <td>
                                12
                            </td>
                            <td>
                                13
                            </td>
                            <td class="disabled">
                                14
                            </td>
                        </tr>
                        <tr>
                            <td>
                                15
                            </td>
                            <td>
                                16
                            </td>
                            <td class="disabled">
                                17
                            </td>
                            <td class="disabled">
                                18
                            </td>
                            <td>
                                19
                            </td>
                            <td class="disabled">
                                20
                            </td>
                            <td class="disabled">
                                21
                            </td>
                        </tr>
                        <tr>
                            <td>
                                22
                            </td>
                            <td class="disabled">
                                23
                            </td>
                            <td class="disabled">
                                24
                            </td>
                            <td class="disabled">
                                25
                            </td>
                            <td class="disabled">
                                26
                            </td>
                            <td class="disabled">
                                27
                            </td>
                            <td class="disabled">
                                28
                            </td>
                        </tr>
                        <tr>
                            <td>
                                29
                            </td>
                            <td class="disabled">
                                30
                            </td>
                            <td class="disabled">
                                31
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                        </tr>
                        <tr>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                            <td class="empty">
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
            <a class="clear" href="#">Очистить даты</a>
        </div>
    </div>
<?php
$this->registerJs(Frontend::getScriptCalendar(), yii\web\View::POS_READY);
//$this->registerJs(Frontend::getScriptOrder(), yii\web\View::POS_READY);
?>
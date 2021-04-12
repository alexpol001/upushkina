<?php

/* @var $this yii\web\View */
/* @var $model array */

?>
<div class="send">
    <table>
        <tr>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Телефон</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><?= $model['phone'] ?></td>
        </tr>
        <tr>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Прибытие</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><?= $model['from'] ?></td>
        </tr>
        <tr>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Выезд</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><?= $model['to'] ?></td>
        </tr>
        <tr>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Гости</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><?= $model['guest'] ?></td>
        </tr>
        <tr>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><b>Цена</b></td>
            <td style='padding: 10px; border: #e9e9e9 1px solid;'><?= $model['result'] ?></td>
        </tr>
    </table>
</div>
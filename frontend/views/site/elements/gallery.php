<?php
/* @var $this yii\web\View */
/* @var $gallery array */

?>
<?php if ($gallery):?>
<div id="gallery">
    <h3>Фотогалерея</h3>
    <div class="gallery owl-carousel">
        <?foreach ($gallery as $item) : ?>
        <div>
            <a href="<?=$item?>" class="gallery-item"><img src="<?=$item?>" alt=""></a>
        </div>
        <?endforeach;?>
    </div>
    <div class="clearfix"></div>
</div>
<? endif; ?>
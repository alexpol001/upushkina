<?php
/* @var $this yii\web\View */
/* @var $description string */
use common\models\setting\Setting;
use frontend\components\Frontend;

$this->title = Setting::take()->title;
?>
<div class="wrapper">
    <div class="col-md-7 col-sm-8 left-block">
        <?= $this->render('elements/description.php', [
                'description' => $description,
        ]); ?>
        <?= $this->render('elements/comfort.php'); ?>
        <?= $this->render('elements/availability.php'); ?>
        <?= $this->render('elements/review.php'); ?>
        <?= $this->render('elements/location.php'); ?>
    </div>
    <div class="col-md-offset-1 col-lg-3 col-sm-4 right-block">
        <?= $this->render('elements/order.php'); ?>
    </div>
    <div class="clearfix"></div>
</div>
<div class="col-md-12">
    <?= $this->render('elements/gallery.php', [
            'gallery' => Frontend::getGallery(),
    ]); ?>
    <?= $this->render('elements/sight.php'); ?>
</div>
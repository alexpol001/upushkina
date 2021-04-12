<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\models\setting\Setting;
use yii\helpers\Html;
use frontend\assets\AppAsset;
use common\models\Material;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="description" content="<?= Setting::take()->description ?>">
  <meta name="keywords" content="<?= Setting::take()->description ?>">
  <link rel="shortcut icon" href="/img/favicon.jpg" type="image/x-icon"/>
    <?= Html::csrfMetaTags() ?>
  <title><?= $this->title ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div id="logo">
  <a href="/">
    <img src="/img/logo.png" alt="На углу у Пушкина">
  </a>
  <h1>На углу у Пушкина</h1>
</div>
<section id="top-banner">
  <img src="/img/slaider.jpg">
</section>
<section id="main">
  <div class="container">
    <div class="row" style="height: 100%">
        <?= $content ?>
    </div>
  </div>
</section>
<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-7">
        <hr>
        <div class="col-sm-6 contact">
          <h3>Контакты</h3>
          <div>
              <?= Material::findOne(10)->text ?>
              <?= Material::findOne(11)->text ?>
          </div>
        </div>
        <div class="col-sm-6">
          <a class="contract" href="/uploads/dogovor.docx">Договор</a>
        </div>
        <div class="clearfix"></div>
        <hr>
        <p class="col-sm-12 developer">Сайт разработан Digital-агентством «<a href="http://symbweb.ru" target="_blank"
                                                                              title="Самые качественные сайты на любой вкус!">Симбиоз</a>»
        </p>
      </div>
    </div>
  </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

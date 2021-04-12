<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/style.css',
        'css/font-awesome.min.css',
        'css/magnific-popup.css',
        'owlcarousel/assets/owl.carousel.min.css',
        'owlcarousel/assets/owl.theme.default.min.css',
    ];

    public $js = [
        'js/jquery-plugins/jquery.magnific-popup.min.js',
        'owlcarousel/owl.carousel.min.js',
        'js/common.js',
        'js/order.js'
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}

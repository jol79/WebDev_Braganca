<?php


namespace app\assets;


use yii\web\AssetBundle;

class NewsAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/news.css',
        'css/home_page.css',

    ];
    public $js = [

    ];
    public $depends = [

    ];
}
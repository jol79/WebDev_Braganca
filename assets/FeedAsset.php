<?php


namespace app\assets;


use yii\web\AssetBundle;

class FeedAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'css/posts.css',
        'css/feed.css'
    ];

    public $js = [

    ];

    public $depends = [
    ];
}
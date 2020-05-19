<?php


namespace app\assets;


use yii\web\AssetBundle;

class PostAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'css/post.css',

    ];

    public $js = [

    ];

    public $depends = [
    ];
}
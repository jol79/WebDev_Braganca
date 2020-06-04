<?php


namespace app\assets;


use yii\web\AssetBundle;

class PostsAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'css/languages.css',
        'css/posts.css',
    ];

    public $js = [
        '//cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js'
    ];

    public $depends = [
    ];
}
<?php


namespace app\assets;


use yii\web\AssetBundle;

class BookmarkAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        '//fonts.googleapis.com/css2?family=Raleway&display=swap',
        'css/posts.css',
        'css/bookmark.css'

    ];

    public $js = [

    ];

    public $depends = [
    ];
}
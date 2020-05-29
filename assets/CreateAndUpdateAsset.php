<?php


namespace app\assets;


use yii\web\AssetBundle;

class CreateAndUpdateAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        '//fonts.googleapis.com/css2?family=Raleway&display=swap',
        'css/_createAndUpdate.css',

    ];

    public $js = [

    ];

    public $depends = [
    ];
}
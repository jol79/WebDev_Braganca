<?php


namespace app\assets;


use yii\web\AssetBundle;

class CreateAndUpdateAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'css/_createAndUpdate.css',
    ];

    public $js = [

    ];

    public $depends = [
    ];
}
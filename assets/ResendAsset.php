<?php


namespace app\assets;

use yii\web\AssetBundle;

class ResendAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/LoginRegistrationReset_pages.css',
        'css/bootstrap.css',
        'https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css',
        '//cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css',
    ];
    public $js = [

    ];
    public $depends = [

    ];
}
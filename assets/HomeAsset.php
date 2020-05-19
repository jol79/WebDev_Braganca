<?php


namespace app\assets;


use yii\web\AssetBundle;

class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/home_page.css',
        '//cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css'
    ];
    public $js = [
        'jquery.js',
        'jquery.min.js',
        'bootstrap.min.css',
        'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css',
        'https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js',
    ];
    public $depends = [

    ];
}
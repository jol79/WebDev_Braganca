<?php


namespace app\assets;


use yii\web\AssetBundle;

class ProfileAsset extends AssetBundle
{
    public $basePath = '@webroot';

    public $baseUrl = '@web';

    public $css = [
        'css/profile.css',
        'css/posts.css',
        '//cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css'

    ];

    public $js = [

    ];

    public $depends = [
    ];
}
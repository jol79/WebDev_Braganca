<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/navbar.css',
        '//fonts.googleapis.com/css2?family=Raleway:wght@200&display=swap',
        '//cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css',
        'css/posts.css',
        'rmrevin\yii\fontawesome\NpmFreeAssetBundle'

    ];
    public $js = [
        '//cdn.jsdelivr.net/gh/google/code-prettify@master/loader/run_prettify.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap4\BootstrapAsset',
        'rmrevin\yii\fontawesome\CdnFreeAssetBundle'
    ];
}

<?php
/**
 * @author Bogdan Burim <bgdn2007@ukr.net> 
 */

namespace bburim\daterangepicker;

use yii\web\AssetBundle;
use yii;

class DateRangePickerAsset extends AssetBundle
{

	public static $extra_js = [];

	public function init() {
		Yii::setAlias('@daterangepicker', __DIR__);

		foreach (static::$extra_js as $js_file) {
			$this->js[]= $js_file;
		}

		return parent::init();
	}

	public $sourcePath = '@daterangepicker/assets';

	public $css = [
		'daterangepicker-bs3.css'
	];

	public $js = [
		'daterangepicker.js',
		'date.js',
	];

	public $depends = [
		'yii\bootstrap\BootstrapPluginAsset',
	];

}

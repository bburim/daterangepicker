<?php
/**
 * @author Bogdan Burim <bgdn2007@ukr.net> 
 */

namespace bburim\daterangepicker;

use Yii;
use yii\base\Model;
use yii\web\View;
use yii\helpers\Html;
use yii\helpers\Json;
use yii\base\Widget as Widget;

class DateRangePicker extends Widget
{

	/**
	 * @var string $selector
	 */
	public $selector;

	/**
	 * @var string JS Callback for Daterange picker
	 */
	public $callback;
	/**
	 * @var array Options to be passed to daterange picker
	 */
	public $options = [];
	/**
	 * @var array the HTML attributes for the widget container.
	 */
	public $htmlOptions = [];


	public $moment = true;

	/**
	 * Initializes the widget.
	 * If you override this method, make sure you call the parent implementation first.
	 */
	public function init()
	{
		//checks for the element id
		if (!isset($this->htmlOptions['id'])) {
			$this->htmlOptions['id'] = $this->getId();
		}
		parent::init();
	}

	/**
	 * Renders the widget.
	 */
	public function run()
	{
		$this->registerPlugin();
	}

	protected function registerPlugin()
	{

		if ($this->moment) {
			DateRangePickerAsset::$extra_js[] = defined('YII_DEBUG') && YII_DEBUG ? 'moment.js' : 'moment.min.js';
		}

		if ($this->selector)
		{
			$this->registerJs($this->selector, $this->options, $this->callback);
		} else {
			$id = $this->htmlOptions['id'];
			echo Html::tag('input', '', $this->htmlOptions);
			$this->registerJs("#{$id}", $this->options, $this->callback);
		}


	}

	protected function registerJs($selector, $options, $callback) {
		$view = $this->getView();

		DateRangePickerAsset::register($view);

		$js   = [];
		$js[] = '$("' . $selector . '").daterangepicker(' . Json::encode($options) . ($callback ? ', ' . Json::encode($callback) : '') . ');';
		$view->registerJs(implode("\n", $js),View::POS_READY);

	}
}


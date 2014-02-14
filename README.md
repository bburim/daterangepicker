About
===============

Bootstrap Date Range Picker widget for Yii 2 Framework

It is actually a Yii 2 wrapper for famous https://github.com/dangrossman/bootstrap-daterangepicker extension.

This widget uses 3.0 Bootstrap CSS since Bootstrap 3.0 is included to Yii 2 as extension.

To learn more details about options JS please visit read ://github.com/dangrossman/bootstrap-daterangepicker documentation.


Usage Example
===============

    // Include namespace
    use bburim\daterangepicker\DateRangePicker as DateRangePicker;

    // Define  ranges correctly
    $ranges = new \yii\web\JsExpression("{
    					'Today'        : [Date.today(), Date.today()],
    					'Yesterday'    : [Date.today().add({ days: -1 }), Date.today().add({ days: -1 })],
    					'Last 7 Days'  : [Date.today().add({ days: -6 }), Date.today()],
    					'Last 30 Days' : [Date.today().add({ days: -29 }), Date.today()],
    					'This Month'   : [Date.today().moveToFirstDayOfMonth(), Date.today().moveToLastDayOfMonth()],
    					'This Year'    : [Date.today().moveToMonth(0,-1).moveToFirstDayOfMonth(), Date.today()],
    					'Last Month'   : [Date.today().moveToFirstDayOfMonth().add({ months: -1 }), Date.today().moveToFirstDayOfMonth().add({ days: -1 })]
    				}");

    // Define empty callback fust for fun
    $callback = new \yii\web\JsExpression("function(){}");

    // Provide required parameters and render the widget
	  echo DateRangePicker::widget([
			'callback' => $callback,
			'options'  => [
			   'ranges' => $ranges,
			   'locale' => [
			    'firstDay' => 1
			   ]
			],
			'htmlOptions' => [
		    'name'        => 'daterange',
		    'class'       => 'form-control',
		    'placeholder' => 'Select Date Range',
		    'style'       => 'width:190px;',
			]
		]);
		

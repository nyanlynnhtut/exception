<?php
ini_set('display_errors', 'On');

require '../vendor/autoload.php';

function errorWithSummaryAndResolution() {
	throw new BaseException([
				'message' => 'Throw from Base',
				'summary' => 'This error is Base exception testing',
				'resolution' => 'You don\'t call errorfull function. Because this function will return exception only'
			]);
}

try {
	errorWithSummaryAndResolution();	
} catch (Exception $e) {
	echo $e;
}
<?php  
// Testcase sample class taken from internet

class TestCase
{
	// @boolean values
	private $currentTestResult;
	private $equalityCheck;

	// @user given values
	protected $testCaseName;
	protected $testCaseExpectedResult;
	private $executionTime;
	protected $providedValues = array(0,0);
	protected $extraComments = "No Information.";

	protected function assertEquals($value1,$value2){
		//start time of funtion
		$executionStartTime = microtime(true);

		//execution part of function
		$this->equalityCheck = ($value1 === $value2 ? 'success' : 'fail');
		$this->providedValues[0] = $value1;
		$this->providedValues[1] = $value2;

		//end time
		$executionEndTime = microtime(true);
		//the final time 
		$this->executionTime = $executionEndTime - $executionStartTime;

		//showing the test result
		$this->showResult();
	}

	private function showResult(){

		$finalResult = ($this->equalityCheck == $this->testCaseExpectedResult) ? 'success' : 'fail';

		echo '<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">';

		echo "<div style='font-family:Montserrat,sans-serif;margin-bottom:10px;'>";
		echo "<br/>";
		echo "<b>Test Name:</b> '".$this->testCaseName."'<br/>";
		echo "<br/>";
		echo "<b>Test Values:</b> ".$this->extraComments;
		echo "<br/>";
		echo "<br/>";
		echo "<b>Test Expected Result:</b> ".$this->testCaseExpectedResult."<br/>";
		echo "<b>Test Actual Result:</b> ".$this->equalityCheck."<br/>";
		echo "<b>Final Result:</b> ".$finalResult;
		echo "<img src='{$finalResult}.png' alt='{$finalResult}' height='20px' width='20px' style='margin:10px 0 0 5px;position:relative;top:5px;'/>";
		echo "<br/>";
		echo "<br/>";
		echo "<b>Test Time:</b> ".number_format($this->executionTime,10)." seconds.<br/>";
		echo "<br/>";
		echo "</div>";
		echo "<hr></hr>";
	}

}

?>
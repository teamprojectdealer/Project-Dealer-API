<?php 
 
require '../TestCase/TestCase.php';
require '../TestCase/Conn.php';
require "buyClass.php";
 
class BuyTesting extends TestCase
{
    private $conn;
    private $buyObj;
    private $projectIdToBeBought;
    private $buyerUserId;
    private $preciseResult;
 
    public function __construct($conn){
        $this->conn = $conn;
        $this->buyObj = new Buy($this->conn);
    }
 
    public function buyTest(){
        //Test 1
        $this->invalidTest();
 
        //Test 2
        $this->validTest();
 
    }
 
    private function runTest(){
        $this->preciseResult = $this->buyObj->buy($this->projectIdToBeBought,$this->buyerUserId);
        $this->addExtraComments();
        $this->assertEquals(true,$this->preciseResult);
    }
 
    private function addExtraComments(){
        $this->extraComments .= "<br><b>Precise result: ".$this->preciseResult."</b>";
    }
 
    private function invalidTest(){
        $this->testCaseName = "Buy Test (Invalid Buy Test)";
        $this->testCaseExpectedResult = "fail";

        //lets not provide any values
        // $this->projectIdToBeBought = "";
        // $this->buyerUserId = "";
        
        $this->runTest();
    }
 
    private function validTest(){
        $this->testCaseName = "Buy Test (Valid Buy Test)";
        $this->testCaseExpectedResult = "success";
        //lets provide valid integers
        $this->projectIdToBeBought = 1;
        $this->buyerUserId = 3;
        $this->runTest();
    }
 
}
 
//the test class object
$buyTestingObj =  new BuyTesting($conn);
 
//buy tests
$buyTestingObj->buyTest();
 
?>
<?php 
 
require '../TestCase/TestCase.php';
require '../TestCase/Conn.php';
require 'LoginClass.php';
 
class LoginTest extends TestCase
{
    private $conn;
    private $loginObj;
    private $username;
    private $password;
    private $preciseResult;
 
    public function __construct($conn){
        $this->conn = $conn;
        $this->loginObj = new Login($this->conn);
    }
 
    public function loginTest(){
        //Test 1
        $this->invalidTest();
 
        //Test 2
        $this->validTest();
 
    }
 
    private function runTest(){
        $this->preciseResult = $this->loginObj->login($this->username,$this->password);
        $this->addExtraComments();
        $this->assertEquals('success',$this->preciseResult);
    }
 
    private function addExtraComments(){
        $this->extraComments = "Username : '".$this->username."' , ";
        $this->extraComments .= "Password : '".$this->password."' <br/> <br/>";
        $this->extraComments .= "<b>Precise result: ".$this->preciseResult."</b>";
    }
 
    private function invalidTest(){
        $this->testCaseName = "Login Test (Invalid Login Test)";
        $this->testCaseExpectedResult = "fail";
        $this->username = 'testUsername';
        $this->password = 'pass';
        $this->runTest();
    }
 
    private function validTest(){
        $this->testCaseName = "Login Test (Valid Login Test)";
        $this->testCaseExpectedResult = "success";
        $this->username = 'teamprojectdealer';
        $this->password = 'teamprojectdealer';
        $this->runTest();
    }
 
}
 
//the test class object
$LoginTesting =  new LoginTest($conn);
 
//login tests
$LoginTesting->loginTest();
 
?>
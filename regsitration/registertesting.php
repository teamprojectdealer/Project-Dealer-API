<?php 
 
require '../TestCase/TestCase.php';
require '../TestCase/Conn.php';
require 'RegisterClass.php';
require 'User.php';
 
class RegistrationTest extends TestCase
{
    private $conn;
    private $registerObj;
    private $user;
    private $preciseResult;
 
    public function __construct($conn){
        $this->conn = $conn;
    }
 
    public function registerTest(){
        //Test 1
        $this->invalidTest();
 
        //Test 2
        $this->validTest();
 
    }
 
    private function runTest(){
        $this->registerObj = new Register($this->user,$this->conn);
        $this->preciseResult = $this->registerObj->register();
        $this->addExtraComments();
        $this->assertEquals(true,$this->preciseResult);
    }
 
    private function addExtraComments(){
        // $this->extraComments = "Username : '".$this->username."' , ";
        // $this->extraComments .= "Password : '".$this->password."' <br/> <br/>";
        $this->extraComments .= "<b>Precise result: ".$this->preciseResult."</b>";
    }
 
    private function invalidTest(){
        $this->testCaseName = "Register Test (Invalid Register Test)";
        $this->testCaseExpectedResult = "fail";

        $newUser = new User;
		$newUser->setUsername('testusername');
        $newUser->setPassword('dgsdgsdg');
        //lets not provide email
		// $newUser->setEmail('asdfasf@k.com');
		$newUser->setFullName('test');
		$newUser->setGender('m');
		$newUser->setProfilePic('test.png');
        $newUser->setType("u");
        
        $this->user = $newUser;
        $this->runTest();
    }
 
    private function validTest(){
        $this->testCaseName = "Register Test (Valid Register Test)";
        $this->testCaseExpectedResult = "success";
        //lets provide all values
        $newUser = new User;
		$newUser->setUsername('testusername');
        $newUser->setPassword('dgsdgsdg');
		$newUser->setEmail('asdfasf@k.com');
		$newUser->setFullName('test');
		$newUser->setGender('m');
		$newUser->setProfilePic('test.png');
        $newUser->setType("u");

        $this->user = $newUser;
        $this->runTest();
    }
 
}
 
//the test class object
$registerTestObj =  new RegistrationTest($conn);
 
//register tests
$registerTestObj->registerTest();
 
?>
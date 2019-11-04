<?php

class Buy{

    private $conn;

	public function __construct($conn){
		$this->conn = $conn;
    }
    
    public function buy($projectIdToBeBought,$buyerId){
        $r = false;
        $q = "INSERT INTO `buy`(`projectId`, `userId`) VALUES (?,?)";
		$qs = $this->conn->prepare($q);
		$qs->bind_param("ii",$projectIdToBeBought,$buyerId);
		$c = $qs->execute();
		$qs->close();
		if ( $c ) {
			$r = true;
		}
		return $r;
    }
}
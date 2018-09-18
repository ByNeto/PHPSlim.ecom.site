<?php
Class FunctionCurl{
	private static $IdentifierToken;
	private static $HrefUrl;

/*SET AND GET @Param IdentifierToken function.Curl.php*/
	public function setCurl($IdentifierToken,$HrefUrl){
		$header = ["Content-Type: application/json", 'IdentifierToken:'.$IdentifierToken];
		$url = $HrefUrl;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
		curl_setopt($ch, CURLOPT_HEADER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
		curl_setopt($ch, CURLOPT_POSTFIELDS,true);
		$return = curl_exec($ch);
		curl_close($ch);
		if (!$return){ 
			$this->Curl = die("Error Curl: 'Error Return Empty'");
		}
		else{
		$this->Curl = $return;
		}
	}
	public function getCurl(){return $this->Curl;}
}
?>
<?php
Class ModelContact{
	private static $objConn;
	private static $InsertContact;

/* @Param InsertContact @Functions InsertContact model.WorkWithUs.php*/
public function InsertContact($objConn,$name,$email,$segmento,$tel,$dept,$msg){
	$InsertContact = $objConn->query("INSERT INTO EC_CONTACT (NameContact, EmailContact, SegmentContact, PhoneContact, DeptContact, MsgContact) VALUES ('$name', '$email', '$segmento', '$tel', '$dept', '$msg')");
return $InsertContact;}

}
?>
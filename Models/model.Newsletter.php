<?php
Class ModelNewsletter{
	private static $objConn;
	private static $SelectNewsletterCheck;
	private static $SelectNewsletterCheckToken;
	private static $SelectNewsletter;
	private static $InsertNewsletter;
	private static $UpdateNewsletter;

/* @Param SelectNewsletterCheck @Functions SelectNewsletterCheck model.Newsletter.php*/
public function SelectNewsletterCheck($objConn,$EmailNewsletter){
	$SelectNewsletterCheck = $objConn->query("SELECT EmailNewsletter FROM EC_NEWSLETTER WHERE EmailNewsletter = '$EmailNewsletter'");
return $SelectNewsletterCheck;}

/* @Param SelectNewsletterCheckToken @Functions SelectNewsletterCheckToken model.Newsletter.php*/
public function SelectNewsletterCheckToken($objConn,$TokenNewsletter){
	$SelectNewsletterCheckToken = $objConn->query("SELECT UrlNewsletter FROM EC_NEWSLETTER WHERE UrlNewsletter = '$TokenNewsletter'");
return $SelectNewsletterCheckToken;}

/* @Param SelectNewsletter @Functions SelectNewsletter model.Newsletter.php*/
public function SelectNewsletter($objConn,$TokenNewsletter){
	$SelectNewsletter = $objConn->query("SELECT * FROM EC_NEWSLETTER WHERE UrlNewsletter = '$TokenNewsletter'");
return $SelectNewsletter;}

/* @Param InsertNewsletter @Functions InsertNewsletter model.Newsletter.php*/
public function InsertNewsletter($objConn,$NameNewsletter,$EmailNewsletter,$UrlNewsletter,$DateRegisterNewsletter,$TimeRegisterNewsletter,$DateValidateNewsletter,$TimeValidateNewsletter,$StatusActiveNewsletter){
	$InsertNewsletter = $objConn->query("INSERT INTO EC_NEWSLETTER (NameNewsletter, EmailNewsletter, UrlNewsletter, DateRegisterNewsletter, TimeRegisterNewsletter, DateValidateNewsletter, TimeValidateNewsletter, StatusActiveNewsletter) VALUES ('$NameNewsletter','$EmailNewsletter','$UrlNewsletter','$DateRegisterNewsletter','$TimeRegisterNewsletter','$DateValidateNewsletter','$TimeValidateNewsletter','$StatusActiveNewsletter')");
return $InsertNewsletter;}

/* @Param UpdateNewsletter @Functions UpdateNewsletter model.Newsletter.php*/
public function UpdateNewsletter($objConn,$NameNewsletter,$EmailNewsletter,$DateRegisterNewsletter,$TimeRegisterNewsletter){
	$UpdateNewsletter = $objConn->query("UPDATE EC_NEWSLETTER SET NameNewsletter = '$NameNewsletter', DateValidateNewsletter = '$DateRegisterNewsletter', TimeValidateNewsletter = '$TimeRegisterNewsletter', StatusActiveNewsletter = '1' WHERE EmailNewsletter = '$EmailNewsletter'");
return $UpdateNewsletter;}

}
?>
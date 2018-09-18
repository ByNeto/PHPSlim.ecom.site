<?php
Class ModelWorkWithUs{
	private static $objConn;
	private static $InsertWorkWithUs;

/* @Param InsertWorkWithUs @Functions InsertWorkWithUs model.WorkWithUs.php*/
public function InsertWorkWithUs($objConn,$nameContact,$cpfContact,$datepicker,$sexContact,$maritalContact,$languagesContact,$cepContact,$logradouroContact,$numberContact,$completeContact,$neighborhoodContact,$cityContact,$ufContact,$telContact,$celContact,$emailContact,$siteContact,$linkedinContact,$facebookContact,$otherContact,$jobContact,$vacancyContact,$otherVacancyContact,$salaryContact,$experienceContact,$formationContact,$informationContact){
	$InsertWorkWithUs = $objConn->query("INSERT INTO EC_WORKWITHUS (nameContact,cpfContact,datepicker,sexContact,maritalContact,languagesContact,cepContact,logradouroContact,numberContact,completeContact,neighborhoodContact,cityContact,ufContact,telContact,celContact,emailContact,siteContact,linkedinContact,facebookContact,otherContact,jobContact,vacancyContact,otherVacancyContact,salaryContact,experienceContact,formationContact,informationContact) VALUES ('$nameContact','$cpfContact','$datepicker','$sexContact','$maritalContact','$languagesContact','$cepContact','$logradouroContact','$numberContact','$completeContact','$neighborhoodContact','$cityContact','$ufContact','$telContact','$celContact','$emailContact','$siteContact','$linkedinContact','$facebookContact','$otherContact','$jobContact','$vacancyContact','$otherVacancyContact','$salaryContact','$experienceContact','$formationContact','$informationContact')");
return $InsertWorkWithUs;}

}
?>
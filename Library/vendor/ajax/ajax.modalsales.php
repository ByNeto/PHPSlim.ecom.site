<?php
$StorageQtd=strip_tags($_GET['StorageQtd']);$DataTargetModal=strip_tags($_GET['DataTargetModal']);$ProductUrlImage=strip_tags($_GET['ProductUrlImage']);$ProductDescription=strip_tags($_GET['ProductDescription']);$ProductAplication=strip_tags($_GET['ProductAplication']);$ProductCod=strip_tags($_GET['ProductCod']);$ProductManufacturing=strip_tags($_GET['ProductManufacturing']);$ProductDescriptionAbbreviation = strip_tags($_GET['ProductDescriptionAbbreviation']);$ProductValue=strip_tags($_GET['ProductValue']);$ProductValuePlot=strip_tags($_GET['ProductValuePlot']);
print_r($StorageQtd.'=>'.$DataTargetModal.'=>'.$ProductUrlImage.'=>'.$ProductDescription.'=>'.$ProductDescription.'=>'.$ProductAplication.'=>'.$ProductCod.'=>'.$ProductManufacturing.'=>'.$ProductDescriptionAbbreviation.'=>'.$ProductValue.'=>'.$ProductValuePlot);
?>


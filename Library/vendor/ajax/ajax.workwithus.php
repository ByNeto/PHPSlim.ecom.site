<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.WorkWithUs.php');// inclui a classe da model WorkWithUs.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Functions/function.SendMailerClass.php');// inclui a classe da function FunctionSendMailer.
$objModelWorkWithUs = new ModelWorkWithUs();
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objFunctionSendMailer = new FunctionSendMailer();//inicia a classe FunctionSendMailer.

$nameContact =$_POST['nameContact'] != '' ? $_POST['nameContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Nome Completo</strong> não pode ser vazio!</div>';
$cpfContact =$_POST['cpfContact'] != '' ? $_POST['cpfContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CPF</strong> não pode ser vazio!</div>';
$datepicker =$_POST['datepicker'] != '' ? $_POST['datepicker'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Data de Nascimento</strong> não pode ser vazio!</div>';
$sexContact =$_POST['sexContact'] != '' ? $_POST['sexContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Sexo</strong> não pode ser vazio!</div>';
$maritalContact =$_POST['maritalContact'] != '' ? $_POST['maritalContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado Civil</strong> não pode ser vazio!</div>';
$cepContact =$_POST['cepContact'] != '' ? $_POST['cepContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>CEP</strong> não pode ser vazio!</div>';
$logradouroContact =$_POST['logradouroContact'] != '' ? $_POST['logradouroContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Endereço</strong> não pode ser vazio!</div>';
$numberContact =$_POST['numberContact'] != '' ? $_POST['numberContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>';
$numberContact =$_POST['numberContact'] != '' ? $_POST['numberContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Numero</strong> não pode ser vazio!</div>';
$neighborhoodContact =$_POST['neighborhoodContact'] != '' ? $_POST['neighborhoodContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Bairro</strong> não pode ser vazio!</div>';
$cityContact =$_POST['cityContact'] != '' ? $_POST['cityContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Cidade</strong> não pode ser vazio!</div>';
$ufContact =$_POST['ufContact'] != '' ? $_POST['ufContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Estado</strong> não pode ser vazio!</div>';
$telContact =$_POST['telContact'] != '' ? $_POST['telContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Telefone</strong> não pode ser vazio!</div>';
$celContact =$_POST['celContact'] != '' ? $_POST['celContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Celular</strong> não pode ser vazio!</div>';
$emailContact =$_POST['emailContact'] != '' ? $_POST['emailContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Email</strong> não pode ser vazio!</div>';
$jobContact =$_POST['jobContact'] != '' ? $_POST['jobContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Selecione a <strong>Opção</strong></div>';
$salaryContact =$_POST['salaryContact'] != '' ? $_POST['salaryContact'] : '<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button>Campo <strong>Pretensão Salarial</strong></div>';
$completeContact =$_POST['completeContact'];
if(empty($completeContact)){$completeContact = 'NULL';}
$siteContact =$_POST['siteContact'];
if(empty($siteContact)){$siteContact = 'NULL';}
$linkedinContact =$_POST['linkedinContact'];
if(empty($linkedinContact)){$linkedinContact = 'NULL';}
$facebookContact =$_POST['facebookContact'];
if(empty($facebookContact)){$facebookContact = 'NULL';}
$otherContact =$_POST['otherContact'];
if(empty($otherContact)){$otherContact = 'NULL';}
$vacancyContact =$_POST['vacancyContact'];
if(empty($vacancyContact)){$vacancyContact = 'NULL';}
$otherVacancyContact =$_POST['otherVacancyContact'];
if(empty($otherVacancyContact)){$otherVacancyContact = 'NULL';}
$languagesContact =$_POST['languagesContact'];
if(empty($languagesContact)){$languagesContact = 'NULL';}
$experienceContact =$_POST['experienceContact'];
if(empty($experienceContact)){$experienceContact = 'NULL';}
$formationContact =$_POST['formationContact'];
if(empty($formationContact)){$formationContact = 'NULL';}
$informationContact =$_POST['informationContact'];
if(empty($informationContact)){$informationContact = 'NULL';}

$query_WorkWithUs = $objModelWorkWithUs->InsertWorkWithUs($objConn,$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($nameContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearCpfCnpj($cpfContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearFormatDate($datepicker)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($sexContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($maritalContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($languagesContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearCep($cepContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($logradouroContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($numberContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($completeContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($neighborhoodContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($cityContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($ufContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearPhone($telContact)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearPhone($celContact)),$objFunctionClass->InjectionSQL($objFunctionClass->EmailInjectionSQL($emailContact)),$objFunctionClass->InjectionSQL($siteContact),$objFunctionClass->InjectionSQL($linkedinContact),$objFunctionClass->InjectionSQL($facebookContact),$objFunctionClass->InjectionSQL($otherContact),$objFunctionClass->InjectionSQL($jobContact),$objFunctionClass->InjectionSQL($vacancyContact),$objFunctionClass->InjectionSQL($otherVacancyContact),$objFunctionClass->InjectionSQL($objFunctionClass->ClearSalary($salaryContact)),$objFunctionClass->InjectionSQL($experienceContact),$objFunctionClass->InjectionSQL($formationContact),$objFunctionClass->InjectionSQL($informationContact));

if($query_WorkWithUs){
$MsgBody ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js lt-ie9 lt-ie8" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js lt-ie9" lang="en"><![endif]-->
<!--[if (IE 9)]><html class="no-js ie9" lang="en"><![endif]-->
<!--[if gt IE 8]><!--> <html xmlns="http://www.w3.org/1999/xhtml" lang="pt-br"> <!--<![endif]-->
<head>
	<title>Autopec</title>
	<meta name="author" content="ByNeto"/>
	<meta name="description" content="Autopec"/>
	<meta name="keywords" content="Autopec"/>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1,chrome=IE9">
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1, maximum-scale=1, user-scalable=no"/>
	<meta name="format-detection" content="telephone=no">
	<meta name="msapplication-tap-highlight" content="no">
	<meta name="HandheldFriendly" content="true"/>
	<meta name="MobileOptimized" content="320"/>
	<!-- Mobile Internet Explorer ClearType Technology -->
	<!--[if IEMobile]>  <meta http-equiv="cleartype" content="on">  <![endif]-->
	<meta name="apple-mobile-web-app-capable" content="yes"/>
	<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
	<!-- Fav Icon -->
	<link rel="shortcut icon" href="#">
	<link rel="apple-touch-icon" href="#">
	<link rel="apple-touch-icon" sizes="114x114" href="#">
	<link rel="apple-touch-icon" sizes="72x72" href="#">
	<link rel="apple-touch-icon" sizes="144x144" href="#">
	<link rel="apple-touch-startup-image" href="#"/><!----320x460.png-BBC4CB-->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
	<!-- Latest compiled and minified CSS -->
</head>
<body>
	<table align="center">
		<tr valign="top">
			<th valign="top" width="700px" height="105px"><img src="https://autopec.com.br/images/img_emails.jpg" width="700px" height="105px" align="top" border="0"></th>
		</tr>
		<tr>
			<th valign="top" width="700px">
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:16px;color:#000000;padding:0 30px;margin-top:10px;"><strong>Prezado(a) '.$nameContact.'.</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Agradecemos seu interesse em trabalhar na Autopec!</p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:16px;color:#000000;padding:0 30px;"><strong>Seus dados foram registrados em nossa base de dados com sucesso.</strong></p>
			</th>
		</tr>
	</table>
	<table align="center" width="700px" style="background:#1C1714;">
		<tr>
			<th valign="top" width="400px">
				<img style="margin-top:34px;" src="https://autopec.com.br/images/logo-negativo.jpg">
				<td>
					<a href="https://plus.google.com/+AutopecBr/">
						<img src="https://www.autopec.com.br/images/upload/source/icon_googlemais.jpg" alt="Google+" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
				<td>
					<a href="https://twitter.com/autopec">
						<img src="https://www.autopec.com.br/images/upload/source/icon_twitter.jpg" alt="Twitter" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
				<td>
					<a href="https://www.facebook.com/autopec.1">
						<img src="https://www.autopec.com.br/images/upload/source/icon_facebook.jpg" alt="Facebook" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
				<td>
					<a href="https://www.youtube.com/user/autopec1">
						<img src="https://www.autopec.com.br/images/upload/source/icon_youtube.jpg" alt="YouTube" width="26" height="26" style="display: block;" border="0"/>
					</a>
				</td>
			</th>
			<th valign="top" width="300px">
				<p style="text-align:left;font-family: Open Sans, sans-serif;font-weight:400;font-size:12px;color:#ffffff;padding:10px 30px;margin-top:10px;">
					<a href="https://www.autopec.com.br" border="0" style="color:#ffffff;text-decoration:none;">www.autopec.com.br</a><br />
					<a href="mailto:curriculos@autopec.com.br" border="0" style="color:#ffffff;text-decoration:none;">curriculos@autopec.com.br</a><br />
					<br /><a border="0" style="color:#ffffff;text-decoration:none;">(19) 3241-5341</a><br />
					<a border="0" style="color:#ffffff;text-decoration:none;">08hrs &aacute;s 18hrs seg &aacute; sex.</a><br />
					<a border="0" style="color:#ffffff;text-decoration:none;">08hrs &aacute;s 12hrs aos s&aacute;b.</a><br />
			</th>
		</tr>
	</table>
</body>
</html>';
	$MsgSuccess = '<div class="alert alert-success text-center text-shadow alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Dados</strong> registrados com sucesso!</div>';//$AddAddressEmail = "Ja preenchido";
	$AddAddressName = $nameContact;
	$UserName = 'envionfe@autopec.com.br';
	$Password = 'AutopecGeral@';
	$SetFromMail = 'curriculos@autopec.com.br';
	$SetFromName = 'Trabalhe Conosco AutoPec';
	$AddReplyToMail = 'curriculos@autopec.com.br';
	$AddReplyToSubject = 'Trabalhe Conosco AutoPec';
	$AltBody = 'Trabalhe Conosco AutoPec';
	$objFunctionSendMailer->SendMailer($MsgBody,$MsgSuccess,$emailContact,$AddAddressName,$UserName,$Password,$SetFromMail,$SetFromName,$AddReplyToMail,$AddReplyToSubject,$AltBody);

}
else{print_r('<div class="alert alert-danger alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Erro</strong> ao enviar a mensagem, tente novamente!</div>');}
?>
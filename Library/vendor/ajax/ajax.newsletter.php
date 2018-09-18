<?php
error_reporting(0);
ini_set('display_errors', 0);
ini_set('log_errors', 1);
//ini_set('error_reporting', E_ALL & ~E_NOTICE & ~E_DEPRECATED);
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Newsletter.php');// inclui a classe da model Newsletter.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Functions/function.SendMailerClass.php');// inclui a classe da function FunctionSendMailer.
$objModelNewsletter = new ModelNewsletter();
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objFunctionSendMailer = new FunctionSendMailer();//inicia a classe FunctionSendMailer.

$AddAddressEmail = $objFunctionClass->EmailInjectionSQL($objFunctionClass->CheckParameter(@$_POST['email']));
@$query_Newsletter_Check = $objModelNewsletter->SelectNewsletterCheck($objConn,$AddAddressEmail);
$fechtAll_Newsletter_Check = $query_Newsletter_Check->fetchAll(PDO::FETCH_ASSOC);
if(count($fechtAll_Newsletter_Check) == 0){
$EmailMD5=md5($AddAddressEmail);$DateRegisterNewsletter=date('d-m-Y');$TimeRegisterNewsletter=date('H:i:s');
@$query_Newsletter = $objModelNewsletter->InsertNewsletter($objConn,
@$objFunctionClass->InjectionSQL('Name Newsletter'),
@$objFunctionClass->EmailInjectionSQL($AddAddressEmail),
@$objFunctionClass->InjectionSQL($EmailMD5),
@$objFunctionClass->InjectionSQL($DateRegisterNewsletter),
@$objFunctionClass->InjectionSQL($TimeRegisterNewsletter),
@$objFunctionClass->InjectionSQL('dd-mm-yyyy'),
@$objFunctionClass->InjectionSQL('00:00:00'),
@$objFunctionClass->InjectionSQL('0'));
	if($query_Newsletter){
	$MsgBody ='
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:16px;color:#000000;padding:0 30px;margin-top:10px;"><strong>Obrigado!</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Pelo seu cadastro em nossa Newsletter</p>
				<p><a style="text-align:center;font-family: Open Sans, sans-serif;font-weight:700;font-size: 14px;text-transform: uppercase;border: none;padding: 15px;cursor: pointer;display: inline-block;text-decoration: none;background: #e2001a;color: #ffffff;box-shadow: 2px 3px 0 #000000;" href="'.$objFunctionClass->UrlFixed().'/newsletter/'.$EmailMD5.'/" title="Confime seu Email">Confirme seu Email</a></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:16px;color:#000000;padding:0 30px;"><strong>'.$AddAddressEmail.'</strong></p>
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
					<a href="mailto:sac@autopec.com.br" border="0" style="color:#ffffff;text-decoration:none;">sac@autopec.com.br</a><br />
					<br /><a border="0" style="color:#ffffff;text-decoration:none;">(19) 3241-5341</a><br />
					<a border="0" style="color:#ffffff;text-decoration:none;">08hrs &aacute;s 18hrs seg &aacute; sex.</a><br />
					<a border="0" style="color:#ffffff;text-decoration:none;">08hrs &aacute;s 12hrs aos s&aacute;b.</a><br />
			</th>
		</tr>
	</table>
</body>
</html>';
	$MsgSuccess = '<div class="alert alert-default alert-dismissible fade show text-center text-gray" role="alert"><h3>Atenção!</h3>Para confirmar seu cadastro em nossa <b>Newsletter</b> e ficar por dentro de todas <b>nossas promoções</b>. Acesse seu <b>email</b> e localize nosso email de retorno, em seguida confirme seu email clicando no <b>bot&atilde;o de confirma&ccedil;&atilde;o</b>.</div>';
	//$AddAddressEmail = "Ja preenchido";
	$AddAddressName = 'Newsletter AutoPec';
	$UserName = 'envionfe@autopec.com.br';
	$Password = 'AutopecGeral@';
	$SetFromMail = 'sac@autopec.com.br';
	$SetFromName = 'Newsletter AutoPec';
	$AddReplyToMail = 'sac@autopec.com.br';
	$AddReplyToSubject = 'Cadastro Newsletter AutoPec';
	$AltBody = 'Newsletter AutoPec';
	$objFunctionSendMailer->SendMailer($MsgBody,$MsgSuccess,$AddAddressEmail,$AddAddressName,$UserName,$Password,$SetFromMail,$SetFromName,$AddReplyToMail,$AddReplyToSubject,$AltBody);
	}
	else{print_r('<div class="alert alert-default alert-dismissible fade show text-center text-gray" role="alert"><center><b>Erro</b> ao cadastrar, tente novamente!</center></div>');}
}
else{print_r('<div class="alert alert-default alert-dismissible fade show text-center text-gray" role="alert"><center><h3>Atenção!</h3>O Email <b>'.$AddAddressEmail.'</b> já se encontra cadastrado em nossa base de dados.<br>Insira outro endereço de email e tente novamente!</center></div>');}

?>
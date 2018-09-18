<?php
require_once('../../../Security/security.InfoDB.php');// inclui a classe de segurança infoDB.
require_once('../../../Models/model.Contact.php');// inclui a classe da model Contact.
require_once('../../../Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.
require_once('../../../Functions/function.SendMailerClass.php');// inclui a classe da function FunctionSendMailer.
$objModelContact = new ModelContact();
$objFunctionClass = new FunctionClass();//inicia a classe FunctionClass.
$objFunctionSendMailer = new FunctionSendMailer();//inicia a classe FunctionSendMailer.

$Name =$objFunctionClass->CheckParameter($_POST['name']);
$Email =$objFunctionClass->CheckParameter($_POST['emailContact']);
$Segmento =$objFunctionClass->CheckParameter($_POST['segmento']);
$Phone =$objFunctionClass->CheckParameter($_POST['tel']);
$Dept =$objFunctionClass->CheckParameter($_POST['dept']);
$Msg =$objFunctionClass->CheckParameter($_POST['msg']);
switch ($Dept){
	case 'Financeiro':$Departamento = 'Financeiro';break;
	case 'Recursos Humanos':$Departamento = 'de Recursos Humanos';break;
	case 'Suporte':$Departamento = 'de Suporte';break;
}
$query_Contact = $objModelContact->InsertContact($objConn,$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($Name)),$objFunctionClass->InjectionSQL($Email),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($Segmento)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearPhone($Phone)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($Dept)),$objFunctionClass->InjectionSQL($objFunctionClass->ClearString($Msg)));
date_default_timezone_set('America/Sao_Paulo');
$date_Hour = $date = date('Y-m-d H:i');
if($query_Contact){
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
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:16px;color:#000000;padding:0 30px;margin-top:10px;">Prezado(a) <strong>'.$Name.'.</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Obrigado por realizar contato em nosso site.</p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Nosso sistema j&aacute; direcionou seus dados e sua mensagem para o departamento <strong>'.$Departamento.'.</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:16px;color:#000000;padding:0 30px;"><strong>Em breve retornaremos seu contato.</strong></p>
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



$MsgBodyAutopec ='<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:16px;color:#000000;padding:0 30px;margin-top:10px;"><strong>'.$Name.'</strong> realizou contato em <strong> '.$date_Hour.'.</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Email: <strong>'.$Email.'</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Fone: <strong>'.$Phone.'</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Departamento: <strong>'.$Dept.'</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Segmento: <strong>'.$Segmento.'</strong></p>
				<p style="text-align:center;font-family: Open Sans, sans-serif;font-weight:400;font-size:15px;color:#000000;padding:0 30px;">Mensagem: <strong>'.$Msg.'</strong></p>
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

	$MsgSuccess = '<div class="alert alert-warning text-center text-shadow alert-dismissible fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Contato</strong> realizado com sucesso!</div>';//$AddAddressEmail = "Ja preenchido";
	$AddAddressName = $Name;
	$UserName = 'envionfe@autopec.com.br';
	$Password = 'AutopecGeral@';
	$SetFromMail = 'sac@autopec.com.br';
	$SetFromName = 'Contato Site AutoPec';
	$AddReplyToMail = 'sac@autopec.com.br';
	$AddReplyToSubject = 'Contato Site AutoPec';
	$AltBody = 'Contato Site AutoPec';
	$objFunctionSendMailer->SendMailerClient($MsgBody,$MsgSuccess,$Email,$AddAddressName,$UserName,$Password,$SetFromMail,$SetFromName,$AddReplyToSubject,$AltBody);
	$objFunctionSendMailer->SendMailer($MsgBodyAutopec,"",$SetFromMail,$AddAddressName,$UserName,$Password,$SetFromMail,$SetFromName,$AddReplyToMail,$AddReplyToSubject,$AltBody);
}
else{print_r('<div class="alert alert-danger alert-dismissible text-center text-shadow fade show" role="alert"><button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true" style="font-size:1rem;">&times;</span></button><strong>Erro</strong> ao enviar a mensagem, tente novamente!</div>');}
?>
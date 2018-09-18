<?php
Class ControllerView{

	private static $Home;
	private static $Products;
	private static $AboutUs;
	private static $Contact;
	private static $Location;
	private static $Blog;
	private static $Automakers;
	private static $AutomakersSimple;
	private static $AutomakersGrupo;
	private static $AutomakersSubGrupo;
	private static $Newsletter;
	private static $Search;
	private static $Login;
	private static $CentralCustomer;
	private static $SecurityPolicy;
	private static $HowBuy;
	private static $ExchangeReturn;
	private static $SalesTerms;
	private static $PaymentForms;
	private static $WorkWithUs;
	private static $Register;
	private static $Cart;
	private static $Confirm;
	private static $Conclusion;

/*SET AND GET @Param Home view.Home.php*/
public function setHome($objComponentsClass,$objFunctionClass){$Home = require_once('Views/view.Home.php');self::$Home = $Home;}
public function getHome(){return self::$Home;}

/*SET AND GET @Param Products view.Products.php*/
public function setProducts($objComponentsClass,$objFunctionClass,$productName,$productId){$Products = require_once('Views/view.Products.php');self::$Products = $Products;}
public function getProducts(){return self::$Products;}

/*SET AND GET @Param Products view.Products.php*/
public function setPRedirect($objComponentsClass,$objFunctionClass,$productName,$productId){$Products = require_once('Views/view.Products.php');self::$Products = $Products;}
public function getPRedirect(){return self::$Products;}

/*SET AND GET @Param AboutUs view.AboutUs.php*/
public function setAboutUs($objComponentsClass,$objFunctionClass){$AboutUs = require_once('Views/view.AboutUs.php');self::$AboutUs = $AboutUs;}
public function getAboutUs(){return self::$AboutUs;}

/*SET AND GET @Param Contact view.Contact.php*/
public function setContact($objComponentsClass,$objFunctionClass){$Contact = require_once('Views/view.Contact.php');self::$Contact = $Contact;}
public function getContact(){return self::$Contact;}

/*SET AND GET @Param Location view.Location.php*/
public function setLocation($objComponentsClass,$objFunctionClass){$Location = require_once('Views/view.Location.php');self::$Location = $Location;}
public function getLocation(){return self::$Location;}

/*SET AND GET @Param Blog view.Blog.php*/
public function setBlog($objComponentsClass,$objFunctionClass){$Products = require_once('Views/view.Blog.php');self::$Blog = $Products;}
public function getBlog(){return self::$Blog;}

/*SET AND GET @Param Automakers view.Automakers.php*/
public function setAutomakers($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId,$carroName,$carroId){$Automakers = require_once('Views/view.Automakers.php');self::$Automakers = $Automakers;}
public function getAutomakers(){return self::$Automakers;}

/*SET AND GET @Param AutomakersSimple view.Automakers.php*/
public function setAutomakersSimple($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId){$AutomakersSimple = require_once('Views/view.Automakers.php');self::$AutomakersSimple = $AutomakersSimple;}
public function getAutomakersSimple(){return self::$AutomakersSimple;}

/*SET AND GET @Param AutomakersGrupo view.AutomakersGrupo.php*/
public function setAutomakersGrupo($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId,$carroName,$carroId,$nameGrupo,$codGrupo){$AutomakersGrupo = require_once('Views/view.Automakers.php');self::$AutomakersGrupo = $AutomakersGrupo;}
public function getAutomakersGrupo(){return self::$AutomakersGrupo;}

/*SET AND GET @Param AutomakersSubGrupo view.AutomakersSubGrupo.php*/
public function setAutomakersSubGrupo($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId,$carroName,$carroId,$nameGrupo,$codGrupo,$nameSubGrupo,$codSubGrupo){$AutomakersSubGrupo = require_once('Views/view.Automakers.php');self::$AutomakersSubGrupo = $AutomakersSubGrupo;}
public function getAutomakersSubGrupo(){return self::$AutomakersSubGrupo;}

/*SET AND GET @Param Newsletter view.Newsletter.php*/
public function setNewsletter($objComponentsClass,$objFunctionClass,$tokenId){$Newsletter = require_once('Views/view.Newsletter.php');self::$Newsletter = $Newsletter;}
public function getNewsletter(){return self::$Newsletter;}

/*SET AND GET @Param Search view.Search.php*/
public function setSearch($objComponentsClass,$objFunctionClass,$keywordId){$Search = require_once('Views/view.Search.php');self::$Search = $Search;}
public function getSearch(){return self::$Search;}

/*SET AND GET @Param Login view.Login.php*/
public function setLogin($objComponentsClass,$objFunctionClass,$urlId){$Login = require_once('Views/view.Login.php');self::$Login = $Login;}
public function getLogin(){return self::$Login;}

/*SET AND GET @Param CentralCustomer view.CentralCustomer.php*/
public function setCentralCustomer($objComponentsClass,$objFunctionClass,$clienteId,$pedidoId){$CentralCustomer = require_once('Views/view.CentralCustomer.php');self::$CentralCustomer = $CentralCustomer;}
public function getCentralCustomer(){return self::$CentralCustomer;}

/*SET AND GET @Param SecurityPolicy view.SecurityPolicy.php*/
public function setSecurityPolicy($objComponentsClass,$objFunctionClass){$SecurityPolicy = require_once('Views/view.SecurityPolicy.php');self::$SecurityPolicy = $SecurityPolicy;}
public function getSecurityPolicy(){return self::$SecurityPolicy;}

/*SET AND GET @Param HowBuy view.HowBuy.php*/
public function setHowBuy($objComponentsClass,$objFunctionClass){$HowBuy = require_once('Views/view.HowBuy.php');self::$HowBuy = $HowBuy;}
public function getHowBuy(){return self::$HowBuy;}

/*SET AND GET @Param ExchangeReturn view.ExchangeReturn.php*/
public function setExchangeReturn($objComponentsClass,$objFunctionClass){$ExchangeReturn = require_once('Views/view.ExchangeReturn.php');self::$ExchangeReturn = $ExchangeReturn;}
public function getExchangeReturn(){return self::$ExchangeReturn;}

/*SET AND GET @Param SalesTerms view.SalesTerms.php*/
public function setSalesTerms($objComponentsClass,$objFunctionClass){$SalesTerms = require_once('Views/view.SalesTerms.php');self::$SalesTerms = $SalesTerms;}
public function getSalesTerms(){return self::$SalesTerms;}

/*SET AND GET @Param PaymentForms view.PaymentForms.php*/
public function setPaymentForms($objComponentsClass,$objFunctionClass){$PaymentForms = require_once('Views/view.PaymentForms.php');self::$PaymentForms = $PaymentForms;}
public function getPaymentForms(){return self::$PaymentForms;}

/*SET AND GET @Param WorkWithUs view.WorkWithUs.php*/
public function setWorkWithUs($objComponentsClass,$objFunctionClass){$WorkWithUs = require_once('Views/view.WorkWithUs.php');self::$WorkWithUs = $WorkWithUs;}
public function getWorkWithUs(){return self::$WorkWithUs;}

/*SET AND GET @Param Register view.Register.php*/
public function setRegister($objComponentsClass,$objFunctionClass){$Register = require_once('Views/view.Register.php');self::$Register = $Register;}
public function getRegister(){return self::$Register;}

/*SET AND GET @Param Cart view.Cart.php*/
public function setCart($objComponentsClass,$objFunctionClass,$carId){$Cart = require_once('Views/view.Cart.php');self::$Cart = $Cart;}
public function getCart(){return self::$Cart;}

/*SET AND GET @Param Confirm view.Confirm.php*/
public function setConfirm($objComponentsClass,$objFunctionClass,$stateId,$ieId,$pedidoId){$Confirm = require_once('Views/view.Confirm.php');self::$Confirm = $Confirm;}
public function getConfirm(){return self::$Confirm;}

/*SET AND GET @Param Conclusion view.Conclusion.php*/
public function setConclusion($objComponentsClass,$objFunctionClass,$pedidoId){$Conclusion = require_once('Views/view.Conclusion.php');self::$Conclusion = $Conclusion;}
public function getConclusion(){return self::$Conclusion;}

}
?>
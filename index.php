<?php
require_once('Controllers/controller.Views.php');// inclui a classe da controller Views.
require_once('Slim/Slim.php');// inclui a classe do Framework Slim PHP.
require_once('Functions/function.ComponentsClass.php');// inclui a classe da function ComponentsClass.
require_once('Functions/function.FunctionsClass.php');// inclui a classe da function FunctionsClass.

\Slim\Slim::registerAutoloader();// instancia da classe registerAutoloader.
//\Slim\Slim::getInstance();// instancia da classe getInstance.
$objSlim			=new \Slim\Slim();// inicia a classe Slim.
$objControllerViews	=new ControllerView();//inicia a classe ControllerView.
$objComponentsClass	=new ComponentsClass();//inicia a classe ComponentsClass.
$objFunctionClass	=new FunctionClass();//inicia a classe FunctionClass.

//Create a route for the home page
$objSlim->get('/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setHome($objComponentsClass,$objFunctionClass);$objControllerViews->getHome();});

//Create a route for the Products redirect 
$objSlim->get('/:pName/:pCod',function($productName,$productId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setPRedirect($objComponentsClass,$objFunctionClass,$productName,$productId);$objControllerViews->getPRedirect();}); 

//Create a route for the Products page
$objSlim->get('/produtos/:productName/:productId',function($productName, $productId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setProducts($objComponentsClass,$objFunctionClass,$productName,$productId);$objControllerViews->getProducts();});

//Create a route for the AboutUs page
$objSlim->get('/sobrenos/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setAboutUs($objComponentsClass,$objFunctionClass);$objControllerViews->getAboutUs();});

//Create a route for the Contact page
$objSlim->get('/contato/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setContact($objComponentsClass,$objFunctionClass);$objControllerViews->getContact();});

//Create a route for the Location page
$objSlim->get('/localizacao/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setLocation($objComponentsClass,$objFunctionClass);$objControllerViews->getLocation();});

//Create a route for the Blog page
$objSlim->get('/blog/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setBlog($objComponentsClass,$objFunctionClass);$objControllerViews->getBlog();});

//Create a route for the Automakers page
$objSlim->get('/montadora/:montadoraName/:montadoraId/carro/:carroName/:carroId',function($montadoraName,$montadoraId,$carroName,$carroId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setAutomakers($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId,$carroName,$carroId);$objControllerViews->getAutomakers();});

//Create a route for the AutomakersSimple page
$objSlim->get('/montadora/:montadoraName/:montadoraId',function($montadoraName,$montadoraId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setAutomakersSimple($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId);$objControllerViews->getAutomakersSimple();});

//Create a route for the AutomakersGrupo page
$objSlim->get('/montadora/:montadoraName/:montadoraId/carro/:carroName/:carroId/:nameGrupo/:codGrupo',function($montadoraName,$montadoraId,$carroName,$carroId,$nameGrupo,$codGrupo) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setAutomakersGrupo($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId,$carroName,$carroId,$nameGrupo,$codGrupo);$objControllerViews->getAutomakersGrupo();});

//Create a route for the AutomakersGrupo page
$objSlim->get('/montadora/:montadoraName/:montadoraId/carro/:carroName/:carroId/:nameGrupo/:codGrupo/:nameSubGrupo/:codSubGrupo',function($montadoraName,$montadoraId,$carroName,$carroId,$nameGrupo,$codGrupo,$nameSubGrupo,$codSubGrupo) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setAutomakersSubGrupo($objComponentsClass,$objFunctionClass,$montadoraName,$montadoraId,$carroName,$carroId,$nameGrupo,$codGrupo,$nameSubGrupo,$codSubGrupo);$objControllerViews->getAutomakersSubGrupo();});

//Create a route for the Search page
$objSlim->get('/pesquisa/:keywordId/',function($keywordId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setSearch($objComponentsClass,$objFunctionClass,$keywordId);$objControllerViews->getSearch();});

//Create a route for the Newsletter page
$objSlim->get('/newsletter/:tokenId/',function($tokenId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setNewsletter($objComponentsClass,$objFunctionClass,$tokenId);$objControllerViews->getNewsletter();});

//Create a route for the Login page
$objSlim->get('/login/:urlId/',function($urlId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setLogin($objComponentsClass,$objFunctionClass,$urlId);$objControllerViews->getLogin();});

//Create a route for the CentralCustomer page
$objSlim->get('/centraldocliente/:clienteId/:pedidoId/',function($clienteId,$pedidoId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setCentralCustomer($objComponentsClass,$objFunctionClass,$clienteId,$pedidoId);$objControllerViews->getCentralCustomer();});

//Create a route for the SecurityPolicy page
$objSlim->get('/politicadeseguranca/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setSecurityPolicy($objComponentsClass,$objFunctionClass);$objControllerViews->getSecurityPolicy();});

//Create a route for the HowBuy page
$objSlim->get('/comocomprar/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setHowBuy($objComponentsClass,$objFunctionClass);$objControllerViews->getHowBuy();});

//Create a route for the ExchangeReturn page
$objSlim->get('/trocasedevolucoes/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setExchangeReturn($objComponentsClass,$objFunctionClass);$objControllerViews->getExchangeReturn();});

//Create a route for the SalesTerms page
$objSlim->get('/termosdevendas/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setSalesTerms($objComponentsClass,$objFunctionClass);$objControllerViews->getSalesTerms();});

//Create a route for the PaymentForms page
$objSlim->get('/formasdepagamentos/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setPaymentForms($objComponentsClass,$objFunctionClass);$objControllerViews->getPaymentForms();});

//Create a route for the WorkWithUs page
$objSlim->get('/trabalheconosco/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setWorkWithUs($objComponentsClass,$objFunctionClass);$objControllerViews->getWorkWithUs();});

//Create a route for the Register page
$objSlim->get('/cadastrese/',function() use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setRegister($objComponentsClass,$objFunctionClass);$objControllerViews->getRegister();});

//Create a route for the Cart page
$objSlim->get('/carrinho/:carId/',function($carId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setCart($objComponentsClass,$objFunctionClass,$carId);$objControllerViews->getCart();});

//Create a route for the Confirm page
$objSlim->get('/confirmacao/:stateId/:ieId/:pedidoId/',function($stateId,$ieId,$pedidoId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setConfirm($objComponentsClass,$objFunctionClass,$stateId,$ieId,$pedidoId);$objControllerViews->getConfirm();});

//Create a route for the Conclusion page
$objSlim->get('/concluido/:pedidoId/',function($pedidoId) use($objSlim,$objControllerViews,$objComponentsClass,$objFunctionClass){$objControllerViews->setConclusion($objComponentsClass,$objFunctionClass,$pedidoId);$objControllerViews->getConclusion();});

$objSlim->run();
?>
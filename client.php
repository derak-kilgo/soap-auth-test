<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
//set_include_path('/var/www/ZendFramework/trunk/library'); //home
set_include_path('.' . PATH_SEPARATOR . getenv('DOCUMENT_ROOT') . '/ZendFramework-1.11.8/library/'); //work
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();
//$uri = 'http://127.0.0.1/soap-test/server.php?wsdl'; //home
$uri = 'http://127.0.0.1/tests/sharepoint/soap-auth-test/server.php?wsdl'; //work

$options['login'] = 'test';
$options['password'] = 'test';
$options['soap_version'] = SOAP_1_2;
$options['cache_wsdl'] = false;
$options['features'] = SOAP_SINGLE_ELEMENT_ARRAYS;
$client = new Zend_Soap_Client($uri,$options);

echo '<pre>';
Zend_Debug::dump($client->getFunctions());
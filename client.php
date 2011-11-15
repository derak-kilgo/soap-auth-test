<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
set_include_path('/var/www/ZendFramework/trunk/library');
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();

$client = new Zend_Soap_Client('http://127.0.0.1/soap-test/server.php?wsdl');

echo '<pre>';
Zend_Debug::dump($client->getFunctions());
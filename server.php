<?php
error_reporting(E_ALL);
ini_set('display_errors',true);
//set_include_path('/var/www/ZendFramework/trunk/library'); //home
set_include_path('.' . PATH_SEPARATOR . getenv('DOCUMENT_ROOT') . '/ZendFramework-1.11.8/library/'); //work
require_once 'Zend/Loader/Autoloader.php';
$autoloader = Zend_Loader_Autoloader::getInstance();

/**
 * Sample class
 */
class MyClass {
    /**
     * sample method 1
     * @param string $inputParam
     * @return string 
     */
    public function method1($inputParam) {
       return $inputParam;
    }
    /**
     * sample method 2
     * @param string $inputParam1
     * @param string $inputParam2
     * @return string
     */
    public function method2($inputParam1, $inputParam2) {
        return $inputParam1 . ':' . $inputParam2;
    }
}

$autodiscover = new Zend_Soap_AutoDiscover();
$autodiscover->setClass('MyClass');
if(isset($_GET['wsdl'])) {
    $autodiscover->handle();
}else{
    $server = new Zend_Soap_Server();
    $wsdlCache = '/tmp/wsdl.' . basename(__FILE__);
    $autodiscover->dump($wsdlCache);
    $server->setWsdl($wsdlCache);
    $server->setClass('MyClass');
    //$server->setObject(new MyClass());
    $server->handle();
}
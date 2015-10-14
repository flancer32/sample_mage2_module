<?php
/* Composer autoloader. */
//include_once(__DIR__ . '/../../vendor/autoload.php');
/* BP is defined in */
if(!defined('BP')) {
    include_once(__DIR__ . '/../../htdocs/app/bootstrap.php');
    /**
     * Create test application that initializes DB connection and ends w/o exit
     *  ($response->terminateOnSend = false).
     */
    $params = $_SERVER;
    //        $params[ \Magento\Store\Model\StoreManager::PARAM_RUN_CODE ] = 'admin';
    //        $params[ \Magento\Store\Model\StoreManager::PARAM_RUN_TYPE ] = 'store';
    //        $params[ \Magento\Store\Model\Store::CUSTOM_ENTRY_POINT_PARAM ] = true;
    /** @var  $bootstrap \Magento\Framework\App\Bootstrap */
    $bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $params);
    $objectManager = $bootstrap->getObjectManager();
    //    $pool = $objectManager->create('Magento\Store\Model\Config\Reader\Store');
    //    $pool = $objectManager->create('Magento\Store\Model\Config\Reader\ReaderPool');
    /** @var  $app \Flancer32\Sample\Test\App */
    $app = $bootstrap->createApplication('\Flancer32\Sample\Test\App');
//    $app = $bootstrap->createApplication('\Magento\Framework\App\Http');
    $bootstrap->run($app);
}
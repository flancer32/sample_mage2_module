<?php
/**
 * Traverse up and lookup for the './app/bootstrap.php' script to lunch it.
 * BP is defined in 'app/autoload.php'
 */
if(!defined('BP')) {
    // Set custom memory limit
    ini_set('memory_limit', '512M');
    // Magento root folder name (see "magento-root-dir" extra var in work/composer.json)
    $mageRoot = 'htdocs';
    // Magento main file relative to the Magento root.
    $bootstrap = 'app' . DIRECTORY_SEPARATOR . 'bootstrap.php';
    // Directory of the current file (phpunit_bootstrap.php)
    $path = __DIR__;
    // Clear cache for file_exists()
    clearstatcache();
    $isMageFound = false;
    for($i = 0; $i < 32; $i++) {
        $pathToBootstrap = $path . DIRECTORY_SEPARATOR . $mageRoot . DIRECTORY_SEPARATOR . $bootstrap;
        if(file_exists($pathToBootstrap)) {
            $isMageFound = true;
            break;
        } else {
            $path = dirname($path);
        }
    }
    if(!$isMageFound) {
        throw new Exception('Cannot find Magento installation. Tests are stopped.');
    } else {
        /* Load Magneto bootstrap script (./app/bootstrap.php). */
        require_once $pathToBootstrap;

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
        /** @var  $app \Flancer32\Sample\Test\App */
        $app = $bootstrap->createApplication('\Flancer32\Sample\Test\App');
        $bootstrap->run($app);
    }
}
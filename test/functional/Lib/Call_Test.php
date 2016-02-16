<?php
/**
 * Functional test for module's class. All external dependencies are loaded using Object Manager (DI).
 * Database connection should be established for success testing.
 *
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;

include_once(__DIR__ . '/../phpunit_bootstrap.php');

class Call_Test extends \PHPUnit_Framework_TestCase {

    public function test_doInsert() {
        /** @var  $obm \Magento\Framework\App\ObjectManager */
        $obm = \Magento\Framework\App\ObjectManager::getInstance();
        /* start test transaction */
        /** @var  $resource \Magento\Framework\App\ResourceConnection */
        $resource = $obm->get('\Magento\Framework\App\ResourceConnection');
        /** @var  $conn \Magento\Framework\DB\Adapter\AdapterInterface */
        $conn = $resource->getConnection();
        $conn->beginTransaction();
        /** @var  $call \Flancer32\Sample\Lib\Call */
        $call = $obm->get('Flancer32\Sample\Lib\Call');
        $id = $call->doInsert();
        $this->assertTrue($id > 0);
        /* rollback test transaction */
        $conn->rollBack();
    }
}
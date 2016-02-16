<?php
/**
 * Unit test for module's class. All external dependencies are mocked.
 *
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;
/* include bootstrap to launch test class and it's methods individually */
include_once(__DIR__ . '/../phpunit_bootstrap.php');

class Call_Test extends \PHPUnit_Framework_TestCase {

    public function test_doInsert() {
        // Test Data
        $TABLE = 'table name';
        $ID_INSERTED = 21;
        // Mocks
        $mResource = $this
            ->getMockBuilder('Magento\Framework\App\ResourceConnection')
            ->disableOriginalConstructor()
            ->getMock();
        $mConn = $this
            ->getMockBuilder('Magento\Framework\DB\Adapter\Pdo\Mysql')
            ->disableOriginalConstructor()
            ->getMock();

        // $this->_conn = $resource->getConnection();
        $mResource
            ->expects($this->once())
            ->method('getConnection')
            ->will($this->returnValue($mConn));
        // $tbl = $this->_resource->getTableName(Account::ENTITY_NAME);
        $mResource
            ->expects($this->once())
            ->method('getTableName')
            ->willReturn($TABLE);
        // $this->_conn->insert($tbl, $bind);
        $mConn
            ->expects($this->once())
            ->method('insert');
        // $result = $this->_conn->lastInsertId($tbl);
        $mConn
            ->expects($this->once())
            ->method('lastInsertId')
            ->willReturn($ID_INSERTED);
        /** @var  $call \Flancer32\Sample\Lib\Call */
        $call = new \Flancer32\Sample\Lib\Call($mResource);
        $resp = $call->doInsert();
        $this->assertEquals($ID_INSERTED, $resp);
    }
}
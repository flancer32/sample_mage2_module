<?php
/**
 * Call to common M1 & M2 library. Simple operation (just process request then return).
 *
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;

use Flancer32\Sample\Entity\Account;

class Call {
    /** @var \Magento\Framework\DB\Adapter\Pdo\Mysql */
    private $_conn;
    /** @var \Magento\Framework\App\ResourceConnection */
    private $_resource;

    /**
     * Crud constructor.
     */
    public function __construct(
        \Magento\Framework\App\ResourceConnection $resource
    ) {
        $this->_resource = $resource;
        $this->_conn = $resource->getConnection();
    }

    public function doInsert() {
        $tbl = $this->_resource->getTableName(Account::ENTITY_NAME);
        $bind = [
            Account::ATTR_CUST_ID       => 1,
            Account::ATTR_ASSET_TYPE_ID => 2,
            Account::ATTR_BALANCE       => 123.45
        ];
        $this->_conn->insert($tbl, $bind);
        $result = $this->_conn->lastInsertId($tbl);
        return $result;
    }
}
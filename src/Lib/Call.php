<?php
/**
 * Call to common M1 & M2 library. Simple operation (just process request then return).
 *
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;

class Call {
    /** @var \Magento\Framework\DB\Adapter\AdapterInterface */
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

    public function doCall() {
        $result = $this->_call->operation(32);
        return $result;
    }
}
<?php
/**
 * Call to common M1 & M2 library. Simple operation (just process request then return).
 *
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;

class Call {
    /** @var \Flancer32\Lib\Service\Customer\Call() */
    private $_call;

    /**
     * Crud constructor.
     */
    public function __construct(\Flancer32\Lib\Service\Customer\Call $call) {
        $this->_call = $call;
    }

    public function doCall() {
        $result = $this->_call->operation(32);
        return $result;
    }
}
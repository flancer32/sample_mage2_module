<?php
/**
 * Call to common M1 & M2 library. Simple operation (just process request then return).
 *
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;

class Call {

    public function doCall() {
        /** @var  $lib \Flancer32\Lib\Service\Customer\Call */
        $lib = new \Flancer32\Lib\Service\Customer\Call();
        $result = $lib->operation(32);
        return $result;
    }
}
<?php
namespace Flancer32\Sample;
/**
 * User: Alex Gusev <alex@flancer64.com>
 */
class LibCall {

    public function doCall() {
        /** @var  $lib Flancer32\Lib\Service\Customer\Call */
        $lib = new \Flancer32\Lib\Service\Customer\Call();
        $result = $lib->operation(32);
        return $result;
    }
}
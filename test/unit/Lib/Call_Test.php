<?php
/**
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;

class Call_Test extends \PHPUnit_Framework_TestCase {

    /**
     * Call to M2 class that calls to common library method.
     */
    public function test_doCall() {
        /** @var  $m2 \Flancer32\Sample\Lib\Call */
        $m2 = new \Flancer32\Sample\Lib\Call();
        $resp = $m2->doCall();
        $this->assertEquals(34, $resp);
    }
}
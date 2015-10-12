<?php
/**
 * Create M2 object that calls common library method.
 *
 * User: Alex Gusev <alex@flancer64.com>
 */

/**
 * Include phpunit_bootstrap to launch one test unit or one method from IDE.
 */
if(!defined('BP')) {
    include_once('../../phpunit_bootstrap.php');
}

class Call_UnitTest extends \PHPUnit_Framework_TestCase {

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
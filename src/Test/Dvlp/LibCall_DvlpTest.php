<?php
if(!defined('BP')) {
    include_once('../phpunit_bootstrap.php');
}

/**
 * User: Alex Gusev <alex@flancer64.com>
 */
class LibCall_DvlpTest extends \PHPUnit_Framework_TestCase {

    public function test_doDbOperations() {
        /** @var  $m2 \Flancer32\Sample\LibCall */
        $m2 = new Flancer32\Sample\LibCall();
        $resp = $m2->doDbOperations();
        $this->assertTrue($resp);
    }
}
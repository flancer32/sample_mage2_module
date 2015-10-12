<?php
/**
 * Perform low-level CRUD operations using common library in development mode (with DB connection).
 *
 * User: Alex Gusev <alex@flancer64.com>
 */

/**
 * Include phpunit_bootstrap to launch one test unit or one method from IDE.
 */
if(!defined('BP')) {
    include_once('../../phpunit_bootstrap.php');
}

class Crud_DvlpTest extends \PHPUnit_Framework_TestCase {

    public function test_doDbOperations() {
        /** @var  $m2 \Flancer32\Sample\Lib\Crud */
        $m2 = new \Flancer32\Sample\Lib\Crud();
        $resp = $m2->doDbOperations();
        $this->assertTrue($resp);
    }
}
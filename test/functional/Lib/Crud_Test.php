<?php
/**
 * Functional tests for "\Flancer32\Sample\Lib\Crud" class.
 *
 * User: Alex Gusev <alex@flancer64.com>
 */
namespace Flancer32\Sample\Lib;

/* include bootstrap to launch test class and it's methods individually */
use Flancer32\Lib\Context;

include_once(__DIR__ . '/../phpunit_bootstrap.php');

class Crud_Test extends \PHPUnit_Framework_TestCase {
    /**
     * Perform low-level CRUD operations using common library in development mode (with DB connection).
     */
    public function test_doDbOperations() {
        /** @var  $m2 \Flancer32\Sample\Lib\Crud */
        $m2 = Context::instance()->getObjectManager()->create('Flancer32\Sample\Lib\Crud');
        $resp = $m2->doDbOperations();
        $this->assertTrue($resp);
    }
}